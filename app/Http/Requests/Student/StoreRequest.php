<?php

namespace App\Http\Requests\Student;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Override;

class StoreRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nis'=>['required', 'string', 'size:4', 'unique:students,nis'],
            'name'=>['required', 'string'],
            'gender'=>['required', 'string', 'in:Laki-laki,Perempuan'],
            'major'=>['required', 'string', 'in:AKL,TKJ,BID'],
            'class'=>['required', 'string']
        ];
    }


    // Yang berubah hanya nama saja
    // public function attributes() 
    // {
    //     return [
    //         'nis' => 'Nomor Induk Siswa',
    //         'name' => 'Nama Lengkap',
    //         'gender' => 'Jenis Kelamin',
    //         'class' => 'Kelas',
    //         'major' => 'Jurusan'
    //     ];
    // }

    
    //mengatur pesan secara keseluruhan
    // public function messages()
    // {
    //     return [
    //         'nis.required' => 'Nomor Induk Siswa wajib diisi',
    //         'nis.size' => 'Nomor Induk Siswa harus terdiri dari 4 angka'
    //     ];
        
    // }
}
