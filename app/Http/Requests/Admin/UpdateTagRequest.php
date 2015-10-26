<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;
use \App\Tag;

class UpdateTagRequest extends Request
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
        $tag = Tag::whereSlug($this->tag)->first();

        return [
            'name' => 'required|min:2',
            'slug' => 'required|min:2|unique:tags,slug,'.$tag->id
        ];
    }
}
