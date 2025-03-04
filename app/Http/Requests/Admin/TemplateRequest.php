<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class TemplateRequest extends FormRequest
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

        $data = [
            "category_id" => "required",
            "translations.*.name" => "required",
            "route" => "required"
        ];

        if($this->id == null){
            $data["image_path"] = "required | mimes:jpeg,jpg,png,PNG,JPG,JPEG | max:2048";
        }

        return $data;
    }
}
