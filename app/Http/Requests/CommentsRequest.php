<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentsRequest extends FormRequest
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
            // 'post_id' => 'required|integer|exists:posts,id',
            // 'user_id' => 'nullable|integer',
            'email'   => 'required|email',
            'name'    => 'required|string|max:191',
            'text'    => 'required|min:3|max:1000'
        ];
    }
}
