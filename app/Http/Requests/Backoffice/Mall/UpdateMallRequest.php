<?php

namespace App\Http\Requests\Backoffice\Mall;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMallRequest extends FormRequest
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
            'name' => 'required|max:255',
            'address' => 'required|max:255',
            'city' => 'nullable|max:150',
            'state' => 'nullable|max:150',
            'country' => 'nullable|max:150',
            'zipcode' => 'nullable|max:50',
            'contact_info' => 'nullable|max:255',
            'operational_info' => 'nullable',
            'image' => 'nullable',
            'latitude' => 'nullable|max:50',
            'longitude' => 'nullable|max:50',
        ];
    }
}
