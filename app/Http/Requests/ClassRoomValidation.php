<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClassRoomValidation extends FormRequest
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
        $classID         = $this->route('id');
 
        $uniqueRule     = $classID ? 'unique:class,name,' . $classID : 'unique:class,name';

        return [
            'name'          => ['required',$uniqueRule,'max:50'], 
            'teacher_id'    => 'required' 
        ];
    }

    public function attributes()
    {
        return [
            'teacher_id' => 'Home Teacher',
        ];
    }

    public function messages()
    {
        return [
            'name.required'     => 'Name Wajib Di isi', 
            'name.unique'       => 'Name sudah di gunakan',
            'teacher_id'        => 'Home Teacher Wajib Di pilih'
        ];
    }
}
