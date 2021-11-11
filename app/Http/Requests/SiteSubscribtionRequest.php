<?php

namespace App\Http\Requests;

use App\Models\Site;
use App\Models\User;
use App\Services\SiteService;
use Illuminate\Foundation\Http\FormRequest;

class SiteSubscribtionRequest extends FormRequest
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
            'site_id' => ['required', 'integer', 'exists:sites,id'],
            'user_id' => ['required', 'integer', 'exists:users,id'],
        ];
    }

    /**
     * Execute the request action
     *
     * @return Site
     */
    public function execute()
    {
        $service = app(SiteService::class);

        $site = Site::find($this->input('site_id'));
        $user = User::find($this->input('user_id'));

        return $service->subscribeSite($site, $user);
    }
}
