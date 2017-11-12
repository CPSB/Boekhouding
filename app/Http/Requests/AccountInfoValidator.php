<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class AccountInfoValidator
 *
 * @package App\Http\Requests
 */
class AccountInfoValidator extends FormRequest
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
        $user = auth()->user();

        return [
            'name'  => 'required|string|max:255',
            'email' => "required|string|email|max:255|unique:users,email,{$user->id}",
        ];
    }
}
