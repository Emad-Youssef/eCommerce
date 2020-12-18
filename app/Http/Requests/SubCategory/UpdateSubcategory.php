<?php

namespace App\Http\Requests\SubCategory;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSubcategory extends FormRequest
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
            'slug'  => ['required', 'string', 'max:80', 'regex:/(^([a-zA-Z0-9-]+)(\d+)?$)/u','unique:categories,slug,'.$this->id]
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
