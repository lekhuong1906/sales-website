<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        if ($this->method() === "POST") {
            return [
                'name.vi' => 'required',
                'name.en' => 'required',
                'description.en' => 'required',
                'description.vi' => 'required',
                'images' => 'required',
                'price' => 'required|numeric',
                'stock' => 'required|numeric',
            ];
        } elseif ($this->method() === "PUT") {
            return [
                "name" => "required"
            ];
        }
    }
}
