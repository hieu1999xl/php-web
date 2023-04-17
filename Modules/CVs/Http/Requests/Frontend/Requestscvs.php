<?php

namespace Modules\CVs\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class Requestscvs extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username_candidate'    => 'required|max:255',
            'email_candidate'       => 'required|email',
            'phone_candidate'       => 'required',
            'position'              => 'required',
            'times_start_job'       => 'required',
            'file_cv'               => 'required'
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
