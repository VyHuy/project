<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProjectFormRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        $formRules=[
            "name" => [
                "required",
                Rule::unique('projects')->ignore($this->id)
            ],
            "code"=>[
                "required",
                "max:5"
            ],
            "budget" => [
                "numeric",
                "min:1",
                
            ],
            
            

        ];
        if($this->id == null){
            // $formRules['file_upload'][] = "required";
        }
        return $formRules;

        
    }
    public function messages()
        {
            return [
                "name.required" => "Nhập tên project",
                "code.required" => "điền code",
                
            ];
        }
}
