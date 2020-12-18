<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreProduct extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'slug'  => 'required|string|unique:products,slug|regex:/(^([a-zA-Z0-9-]+)(\d+)?$)/u|min:2|max:50',
            'categories' => 'array|min:1|required',
            'categories.*' => 'numeric|exists:categories,id',
            'tags' => 'nullable|exists:tags,id',
            'brand_id' => 'nullable|exists:brands,id',
        ];

        foreach(config('translatable.locales') as $locale){
            $rules[$locale.'.name'] = 'required|string|max:100';
            $rules[$locale.'.short_description'] = 'nullable|string|max:500';
            $rules[$locale.'.description'] = 'required|string|max:1000';
        }

        return $rules;
    }

    public function attributes()
    {
        return[
            'brand_id'      => __('site.brand'),
            'slug'      => __('site.slug'),
            'categories' => __('site.category'),
            'tags'      => __('site.tags'),
        ];
    }
}
