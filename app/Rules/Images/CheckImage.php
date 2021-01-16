<?php

namespace App\Rules\Images;

use File;
use Illuminate\Contracts\Validation\Rule;

class CheckImage implements Rule
{
    private $path;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($path)
    {
        $this->path = $path;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // dd(public_path($this->path.$value));
        if(\File::exists(public_path($this->path.$value))){
            return true;
        }else {

            return false;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __('site.img_problem_found');
    }
}
