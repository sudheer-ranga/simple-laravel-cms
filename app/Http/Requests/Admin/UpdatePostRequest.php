<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;
use \App\Post;

class UpdatePostRequest extends Request
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
//        dd($this->post);
//        $postId = Post::whereSlug($this->get('slug'))->first();

        $post = Post::whereSlug($this->post)->first();

//        dd($post);

        return [
            'title' => 'required|min:2',
            'slug' => 'required|min:3|unique:posts,slug,'.$post->id,
        ];
    }
}
