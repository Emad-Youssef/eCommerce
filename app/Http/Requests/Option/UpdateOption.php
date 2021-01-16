<?php

namespace App\Http\Requests\Option;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOption extends FormRequest
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
            'product_id' => 'required|numeric|exists:products,id',
            'property_id' => 'required|numeric|exists:properties,id',
            'price' => 'nullable|numeric|digits_between:1,10',
        ];

        foreach(config('translatable.locales') as $locale){
            $rules[$locale.'.name'] = 'required|string|max:50';
        }

        return $rules;
    }

    public function attributes()
    {
        $attributes = [
            'product_id' => __('site.product'),
            'property_id' => __('site.property'),
            'price' => __('site.price'),
        ];
        foreach(config('translatable.locales') as $locale){
            $attributes[$locale.'.name'] = __('site.name_'.$locale);
        }

        return $attributes;
    }
}
