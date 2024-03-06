<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatekaryawanRequest extends FormRequest
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
            'nip' => 'required|string',
            'nik' => 'required |string',
            'nama' => 'required| string',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required | string',
            'tanggal_lahir' => 'required | date',
            'telepon' => 'required',
            'agama' => 'required |string',
            'status_nikah'=> 'required',
            'alamat'=>'required | string',
            'foto'=>'required | string',
        ];
    }
}
