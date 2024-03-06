<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMenuRequest extends FormRequest
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
            'nama_menu' => 'required',
            'harga' => 'required',
            'image' => 'required',
            'deskripsi' => 'required',
            'jenis_id' => 'required'
        ];
    }

    public function messages()
    { {
            return [
                'nama_menu.required' => 'Nama Jenis belum diisi!',
                'harga.required' => 'harga belum diisi!',
                'image.required' => 'image belum diisi!',
                'deskripsi.required' => 'deskripsi belum diisi~!',
                'jenis_id.required' => 'jenis belum diisi~!',

            ];
        }
    }
}
