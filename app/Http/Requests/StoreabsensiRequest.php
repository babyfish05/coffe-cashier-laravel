<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreabsensiRequest extends FormRequest
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
            'namaKaryawan' => ['required', 'max:50', 'string'],
            'tanggalMasuk' => ['required', 'date'],
            'waktuMasuk' => ['required', 'time'],
            'status' => ['required', 'max:50', 'string'] ,
            'waktuKeluar' => 'required',

        ];
    }

    public function messages()
    { {
            return [
                'namaKaryawan.required' => 'Nama karyawan belum diisi!',
                'tanggalMasuk.required' => 'tanggal masuk belum diisi!',
                'waktuMasuk.required' => ' waktu masuk belum diisi!',
                'status.required' => 'status belum diisi!',
                'waktuKeluar.required' => ' waktu keluar belum diisi!',

            ];
        }
    }
}
