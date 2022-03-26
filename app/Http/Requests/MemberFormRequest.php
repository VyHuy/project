<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MemberFormRequest extends FormRequest
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
                Rule::unique('members')->ignore($this->id)
            ],
            'file_upload' => [
                "mimes:jpg,bmp,png"
            ],
            "department" => [
                "required",
                
            ],
            "salary" => [
                "numeric",
                "min:1"
            ],
            "phone"=>[
                "required",
                "max:11"
            ]
            

        ];
        if($this->id == null){
            $formRules['file_upload'][] = "required";
        }
        return $formRules;

        
    }
    public function messages()
        {
            return [
                "name.required" => "Nhập tên hãng",
                "file_upload.required" => "Thêm ảnh định dạng jpg, bmp, png",
                "department.required" => "Điền bộ phận",
                "phone.required"=>"điền 10 số"
            ];
        }
}
