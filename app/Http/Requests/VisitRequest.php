<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VisitRequest extends FormRequest
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
            'visit_date' => 'required',
            'visitnumber_id' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'visit_date.required' => 'تاريخ الزيارة مطلوب ',
            'visitnumber_id.required' => 'ترتيب الزيارة مطلوب',
        ];
    }
}
