<?php

namespace App\Http\Requests\SubCategory;

use Illuminate\Foundation\Http\FormRequest;

class StoreSubcategory extends FormRequest
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
            'parent_id' => 'required',
            'slug'  => 'required|string|unique:categories,slug|regex:/(^([a-zA-Z0-9-]+)(\d+)?$)/u|min:2|max:50',
        ];

        foreach(config('translatable.locales') as $locale){
            $rules[$locale.'.name'] = 'required|string|max:50';
        }

        return $rules;
    }

    public function attributes()
    {
        return[
            'parent_id'      => __('site.mainCategory'),
            'slug'      => __('site.slug')
        ];       
    }
}
