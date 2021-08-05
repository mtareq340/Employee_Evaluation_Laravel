<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
        return [
            'name' => 'required|string|max:100',
            'address' => 'required',
            'phone' => 'required',
            'store_id' => 'required',
            'title_id' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'الاسم مطلوب',
            'address.required' => 'العنوان مطلوب',
            'phone.required' => 'رقم الموبيل مطلوب',
            'store_id.required' => 'اسم الفرع مطلوب',
            'title_id.required' => 'الوظيفة مطلوب',
            'name.string' => 'الاسم يجب ان يكون حروف',
            'name.max' => 'اسم القسم لا يزيد عن 100 حرف',
        ];
    }
}
