<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class PertandinganRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    // public function authorize()
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'team_a' => ['required', 'min:3'],
            'team_b' => ['required', 'min:3'],
            'skor' => ['required', 'min:3']
        ];
    }

    public function failedValidation(Validator $validator)

    {

        throw new HttpResponseException(response()->json(
         $validator->errors()

        ));

    }

    public function messages()
    {
        return [
            "team_a.required" => "Team Pertama harus di Isi",
            "team_b.required" => "Team Kedua harus di Isi",
            "team_a.min" => "Team Pertama minimal harus berisi 3 karakter",
            "team_b.min" => "Team Pertama minimal harus di Isi",
            "skor.min" => "Skor minimal harus berisi 3 karakter",
            "skor.required" => "Skor harus di isi"
        ];
    }
}
