<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditFeedbackRequest extends FormRequest
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
            'news_id' => ['required', 'integer'],
            'name' => ['required', 'string', 'min:3', 'max:30'],
            'message' => ['required', 'string', 'min:2', 'max:300']
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
            'name' => 'Ваше имя',
            'message' => 'Сообщение'
        ];
    }
}
