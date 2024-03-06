<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePemesananRequest extends FormRequest
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
            'meja_id' => 'required',
            'tanggal_pemesanan' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'nama_pemesan' => 'required',
            'jumlah_pelanggan' => 'required'
            
        ];
    }

    public function messages()
    { {
            return [
                'meja_id.required' => 'Nama Jenis belum diisi!',
                'tanggal_pemesanan.required' => 'tanggal belum diisi!',
                'jam_mulai.required' => 'jam mulai belum diisi!',
                'jam_selesai.required' => 'tanggal belum diisi!',
                'nama_pemesanan.required' => 'nama pemesan belum diisi!',
                'jumlah_pelanggan.required' => 'jumlah pelanggan belum diisi!',

            ];
        }
    }
}