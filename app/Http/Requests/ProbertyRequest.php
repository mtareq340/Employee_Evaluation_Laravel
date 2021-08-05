<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProbertyRequest extends FormRequest
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
            'name' => 'required|string',
            // 'employee_id' => 'required',
           
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'الاسم مطلوب',
            'name.string' => 'الاسم يجب ان يكون حروف',
            // 'employee_id.required' => 'الوظيفة مطلوبة',
        ];
    }
}
