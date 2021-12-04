<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCategoryRequest extends FormRequest
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
            'title' => ['required', 'string', 'min:3', 'max:50'],
            'description' => ['required', 'text', 'min:3'],
            'name_pars' => ['string', 'min:3']
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
