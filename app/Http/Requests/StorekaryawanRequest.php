<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorekaryawanRequest extends FormRequest
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
            'nip' => ['required', 'max:50', 'string'],
            'nik' => ['required', 'max:50', 'string'],
            'nama' => ['required', 'max:50', 'string'],
            'jenis_kelamin' => ['required', 'string'],
            'tempat_lahir' => ['required', 'max:50', 'string'],
            'tanggal_lahir' => ['required', 'date'],
            'telepon' => ['required'],
            'agama' => ['required', 'max:50', 'string'],
            'status_nikah' => ['required', 'string'],
            'alamat' => ['required', 'max:50', 'string'],
            // 'foto' => ['required', 'max:50', 'image'],
        ];
    }

    public function messages()
    { {
            return [
                'nip.required' => 'Nip karyawan belum diisi!',
                'nik.required' => 'Nik barang belum diisi!',
                'nama.required' => 'Nama pengajuan belum diisi!',
                'jenis_kelamin.required' => 'jenis kelamin belum diisi!',
                'tempat_lahir.required' => 'Tempat lahir belum diisi!',
                'tanggal_lahir.required' => 'tanggal lahir belum diisi!',
                'telepon.required' => 'telepon belum diisi!',
                'agama.required' => 'agama belum diisi!',
                'status_nikah.required' => 'status nikah belum diisi!',
                'alamat.required' => 'alamat belum diisi!',
                // 'foto.required' => 'foto belum diisi!',

            ];
        }
    }
}
