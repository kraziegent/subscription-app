<?php

namespace App\Http\Requests;

use App\Services\SiteService;
use Illuminate\Foundation\Http\FormRequest;

class SiteStoreRequest extends FormRequest
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
            'name' => ['required','string'],
            'url' => ['required', 'string'],
        ];
    }

    /**
     * Execute the request action
     *
     * @return App\Models\Site
     */
    public function execute()
    {
        $service = app(SiteService::class);

        return $service->storeSite($this->input());
    }
}
