<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
        $this->preCheck();
        $rules = [
            'title' => 'required|max:255',
            'image' => 'required|image|max:3000',
            'status' => 'boolean'
        ];

        if ($this->isMethod('PATCH')) {
            $rules['image'] = 'image|max:3000';
        }
        return $rules;
    }

    public function preCheck()
    {
        if (!$this->request->has('status')) {
            $this->request->add(['status' => 0]);
        }
    }
}
