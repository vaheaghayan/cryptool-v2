<?php

namespace App\Http\Requests;

use App\Models\Conversation\Conversation;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ConversationEditRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'data.title' => 'string|required',
            'data.category' => [Rule::in(Conversation::CATEGORIES)],
            'data.description' => 'string|required',
//            'data.message' => 'required|string',
        ];
    }

}
