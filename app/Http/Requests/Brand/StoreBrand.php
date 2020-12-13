<?php

namespace App\Http\Requests\Brand;

use Illuminate\Foundation\Http\FormRequest;

class StoreBrand extends FormRequest
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
            'img'  => 'nullable|image|mimes:jpeg,jpg,png,gif',
        ];

        foreach(config('translatable.locales') as $locale){
            $rules[$locale.'.name'] = 'required|string|max:50';
        }

        return $rules;
    }

    public function attributes()
    {
        $attributes = [
            'img'      => __('site.img')
        ];

        foreach(config('translatable.locales') as $locale){
            $rules[$locale.'.name'] = 'required|string|max:50';
        }

        return $attributes;
    }
}
