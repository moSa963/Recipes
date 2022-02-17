<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreRecipeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "title"             => ['required' ],
            "category"          => ['required' ],
            "cook_time"         => ['required' ],
            "preparation_time"  => ['required' ],
            "servings"          => ['required' ],
            "description"       => ['required' ],
            "ingredients"       => ['required', 'array' ],
            "directions"        => ['required', 'array' ],
            "note"              => ['required' ],
            "images"            => ['array', 'min:1'],
            "images.*"          => ['image']
        ];
    }
}
