<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStokRequest extends FormRequest
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
            'jumlah_stok' => 'required',
            'menu_id'=>'required'
        ];
    }

    public function messages()
    { {
            return [
                'jumlah_stok.required' => 'Nama Jenis belum diisi!',
                'menu_id'=> 'menu belum diisi!'

            ];
        }
    }
}
