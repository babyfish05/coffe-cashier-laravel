<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProdukRequest extends FormRequest
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
            'nama_produk' => 'required',
            'nama_supplier' => 'required',
            'harga_beli' => 'required',
            'harga_jual' => 'required',
            'stok' => 'required'

        ];
    }
    public function messages()
    { {
            return [
                'nama_produk.required' => 'nama produk belum diisi!',
                'nama_supplier.required' => ' nama supplier belum diisi!',
                'harga_beli.required' => 'harga beli belum diisi!',
                'harga_jual.required' => 'harga jual belum diisi~!',
                'stok.required' => 'stok belum diisi~!',

            ];
        }
    }
}
