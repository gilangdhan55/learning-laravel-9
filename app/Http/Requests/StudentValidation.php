<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentValidation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $studentID         = $this->route('id');

          // Gunakan request yang telah Anda buat dengan aturan validasi
        //   'npm' => 'required|numeric|unique:students,nis,' . $studentID,

        //ini jika pembaruan data maka gunakan ini, karna jika update data namun nis tidak ingin di update, maka dari laravel akan selalu kena unique, jadi harus di kasih kondisi pengecualian id nya

        $uniqueRule     = $studentID ? 'unique:students,nis,' . $studentID : 'unique:students,nis';
        return [ 
                'name'          => 'required|max:50',
                'gender'        => 'required',
                'nis'           => ['required', $uniqueRule, 'max:8'],
                'class_id'      => 'required' 
        ];
    }

    public function attributes()
    {
        return [
            'class_id' => 'Class',
        ];
    }

    public function messages()
    {
        return [
            'name.required'     => 'Name Wajib Di isi',
            'gender.required'   => 'Gender wajib di pilih',
            'nis.required'      => 'NIS WAJIB DI ISI',
            'nis.max'           => 'NIS Maksimal :max Character',
            'class_id'          => 'Class Wajib di pilih'
        ];
    }
}
