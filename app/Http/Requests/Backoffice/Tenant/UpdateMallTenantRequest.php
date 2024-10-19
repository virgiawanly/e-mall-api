<?php

namespace App\Http\Requests\Backoffice\Tenant;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMallTenantRequest extends FormRequest
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
            'mall_id' => 'required|exists:malls,id',
            'tenant_id' => 'required|exists:tenants,id',
            'description' => 'nullable',
            'image' => 'nullable|file|mimes:png,jpg,jpeg|max:2048',
            'images' => 'nullable|array',
            'images.*.file' => 'required|file|mimes:png,jpg,jpeg|max:2048',
            'images.*.is_primary' => 'nullable|boolean',
            'contact_info' => 'nullable|max:255',
            'operational_info' => 'nullable',
            'location' => 'required',
        ];
    }
}
