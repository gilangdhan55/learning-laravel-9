<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeacherValidation extends FormRequest
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
        $teacherID         = $this->route('id');
 
        $uniqueRule     = $teacherID ? 'unique:teachers,name,' . $teacherID : 'unique:teachers,name';

        return [
            'name'          => ['required',$uniqueRule,'max:50'],  
        ];
    }
 
    public function messages()
    {
        return [
            'name.required'     => 'Name Wajib Di isi', 
            'name.unique'       => 'Name sudah di gunakan', 
        ];
    }
}
