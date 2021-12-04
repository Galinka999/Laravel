<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditNewsRequest extends FormRequest
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
            'category_id' => ['required', 'integer'],
            'title' => ['required', 'string', 'min:3', 'max:100'],
            'image' => ['nullable', 'mimes:jpg,png,jpeg'],
            'author' => ['required', 'string', 'min:2', 'max:100'],
            'status' => ['required', 'string'],
            'description' => ['sometimes']
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
          'title' => 'заголовок',
          'author' => 'автор'
        ];
    }
}
