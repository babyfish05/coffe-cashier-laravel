<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoremasukRequest extends FormRequest
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
            'nama_karyawan' => ['required', 'max:50', 'string'],
            'tanggal_masuk' => ['required', 'date'],
            'waktu_masuk' => ['required',],
            'status' => ['required', 'max:50', 'string'] ,
            'waktu_selesai_kerja' =>['required'],

        ];
    }
    public function messages()
    { {
            return [
                'nama_karyawan.required' => 'nama karyawan belum diisi!',
                'tanggal_masuk.required' => ' tanggal masuk belum diisi!',
                'waktu_masuk.required' => 'waktu masuk belum diisi!',
                'status.required' => 'status beli belum diisi!',
                'waktu_selesai_kerja.required' => ' waktu selesai kerja belum diisi~!',
                
            ];
        }
    }
}
