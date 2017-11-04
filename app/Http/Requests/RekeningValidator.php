<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class RekeningValidator
 *
 * @package App\Http\Requests
 */
class RekeningValidator extends FormRequest
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
        return [
            'rekening_naam'  => 'required|max:255|unique:rekeningens',
            'beschrijving'   => 'required',
        ];
    }
}
