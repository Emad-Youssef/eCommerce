<?php

namespace App\Http\Requests\Shipping;

use Illuminate\Foundation\Http\FormRequest;

class StoreShipping extends FormRequest
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
            'plain_value'  => 'nullable|numeric|digits_between:1,10',
        ];

        foreach(config('translatable.locales') as $locale){
            $rules[$locale.'.value'] = 'required|string|max:50';
        }

        return $rules;
    }

    public function attributes()
    {
        $attributes = [
            'plain_value' => __('site.value')
        ];

        foreach(config('translatable.locales') as $locale){
            $attributes[$locale.'.value'] = __('site.name_'.$locale);
        }

        return $attributes;
    }
}
