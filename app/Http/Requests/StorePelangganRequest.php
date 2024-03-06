<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePelangganRequest extends FormRequest
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
            'nama' => 'required',
            'email' => 'required',
            'nomor_telepon' => 'required',
            'alamat' => 'required',
            
        ];
    }

    public function messages()
    { {
            return [
                'nama.required' => 'Nama Jenis belum diisi!',
                'email.required' => 'email Jenis belum diisi!',
                'nomor_telepon.required' => 'Nama Jenis belum diisi!',
                'alamat.required' => 'Nama Jenis belum diisi!',

            ];
        }
    }
}
