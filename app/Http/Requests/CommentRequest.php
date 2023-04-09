<?php

namespace App\Http\Requests;

use App\Models\Conversation\Conversation;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CommentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'data.cypher_id' => 'int|required',
            'data.comment' => 'string|required',
        ];
    }
}
