<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatemasukRequest extends FormRequest
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
            'nama_karyawan' => 'required|string',
            'tanggal_masuk' => 'required|date',
            'waktu_masuk' => 'required|time',
            'status' => 'required|in:masuk,izin,cuti', // Ganti nilai1, nilai2, nilai3 dengan nilai enum yang diizinkan
            'waktu_selesai_kerja' => 'required|time'
        ];
        //array
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'nama_karyawan.required' => 'nama karyawan belum diisi!',
            'tanggal_masuk.required' => ' tanggal masuk belum diisi!',
            'waktu_masuk.required' => 'waktu masuk belum diisi!',
            'status.required' => 'status beli belum diisi!',
            'waktu_selesai_kerja.required' => ' waktu selesai kerja belum diisi~!',
        ];
    }
}
