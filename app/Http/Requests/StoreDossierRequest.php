<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDossierRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'conservateur_id'=>'required|int',
            'assujettie_id'=>'required|int',
            'libele'=>'required|string',
            'description'=>'required|string',
            'date_dossier'=>'required|date'
        ];
    }
}
