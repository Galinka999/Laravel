<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'min:3', 'max:20'],
            'description' => ['required', 'string', 'min:3']
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Поле :attribute обязательно необходимо заполнить',
            'min' => [
                'string' => 'Поле :attribute должно содержать не меньше :min символов.'
            ]
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'Наименование',
            'description' => 'Описание'
        ];
    }
}
