<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UpdatePostRequest extends FormRequest
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
    public function rules(Request $request)
    {
        
        return [
            'title' => 'required|min:3|unique:posts,title,'.$request->id,
            'description' => 'required|min:10',
            'user_id' =>  'exists:users,id',
            
        ];
    }
}
