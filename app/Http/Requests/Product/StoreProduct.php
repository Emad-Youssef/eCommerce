<?php

namespace App\Http\Requests\Product;

use App\Rules\Images\CheckImage;
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
            'slug'  => 'required|string|unique:products,slug|regex:/(^([a-zA-Z0-9-]+)(\d+)?$)/u|min:2|max:150',
            'brand_id' => 'nullable|exists:brands,id',
            'categories' => 'array|min:1|required',
            'categories.*' => 'numeric|exists:categories,id',
            'tags' => 'nullable|exists:tags,id',
            'is_active' => 'nullable|in:0,1',
            'price' => 'required|numeric|digits_between:1,10',
            'selling_price' => 'required|numeric|digits_between:1,10',
            'special_price' => 'nullable||required_with:special_price_type|numeric|digits_between:1,10',
            'special_price_type' => 'nullable|required_with:special_price|in:precent,fixed',
            'special_price_start' => 'nullable|required_with:special_price|date|date_format:Y-m-d',
            'special_price_end' => 'nullable|required_with:special_price|date|date_format:Y-m-d',
            'sku'  => 'nullable|min:3|max:10',
            'manage_stock'  => 'required|in:0,1',
            'in_stock'  => 'required|in:0,1',
            'qty'  => 'nullable|required_if:manage_stock,==,1',
            'images'  => 'required|array|min:1',
            'images.*'  => [new CheckImage('uploads/products/')],
        ];

        foreach(config('translatable.locales') as $locale){
            $rules[$locale.'.name'] = 'required|string|max:100';
            $rules[$locale.'.short_description'] = 'nullable|string|max:500';
            $rules[$locale.'.description'] = 'required|string|max:3000';
        }

        return $rules;
    }

    public function attributes()
    {
        $attributes = [
            'slug'      => __('site.slug'),
            'brand_id'      => __('site.brand'),
            'categories' => __('site.category'),
            'tags'      => __('site.tags'),
            'is_active'   => __('site.is_active'),
            'price'   => __('site.price'),
            'selling_price'   => __('site.selling_price'),
            'special_price'   => __('site.special_price'),
            'special_price_type'   => __('site.special_price_type'),
            'special_price_start'   => __('site.special_price_start'),
            'special_price_end'   => __('site.special_price_end'),
            'sku'      => __('site.sku'),
            'manage_stock'      => __('site.manage_stock'),
            'in_stock'      => __('site.in_stock'),
            'qty'      => __('site.qty'),
            'images'      => __('site.images'),
        ];

        foreach(config('translatable.locales') as $locale){
            $attributes[$locale.'.name'] = __('site.name_'.$locale);
            $attributes[$locale.'.short_description'] = __('site.short_description_'.$locale);
            $attributes[$locale.'.description'] = __('site.description_'.$locale);
        }

        return $attributes;
    }
}
