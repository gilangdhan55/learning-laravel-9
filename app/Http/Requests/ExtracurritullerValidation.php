<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExtracurritullerValidation extends FormRequest
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
        $eskulID         = $this->route('id');
 
        $uniqueRule     = $eskulID ? 'unique:extracurritulers,name,' . $eskulID : 'unique:extracurritulers,name';

        return [
            'name'          => ['required',$uniqueRule,'max:50'],  
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
        ];
    }
}
