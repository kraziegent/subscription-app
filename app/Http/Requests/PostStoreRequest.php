<?php

namespace App\Http\Requests;

use App\Services\PostService;
use Illuminate\Foundation\Http\FormRequest;

class PostStoreRequest extends FormRequest
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
            'title' => ['required','string'],
            'description' => ['required', 'string'],
            'body' => ['required', 'string'],
            'site_id' => ['required', 'integer', 'exists:sites,id'],
            'user_id' => ['required', 'integer', 'exists:users,id'],
        ];
    }

    /**
     * Execute the request action
     *
     * @return Post
     */
    public function execute()
    {
        $service = app(PostService::class);

        return $service->storePost($this->input());
    }
}
