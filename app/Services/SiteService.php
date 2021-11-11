<?php

namespace App\Services;

use App\Models\Site;
use App\Models\User;
use Illuminate\Validation\ValidationException;

class SiteService
{
    /**
     * Store a new site in the database.
     *
     * @param array $data
     * @return site
     */
    public function storeSite(array $data)
    {
        $site = Site::create($data);

        return $site;
    }

    /**
     * Subscribe a user to a site.
     *
     * @param User $user
     * @param Site $site
     * @return Site
     */
    public function subscribeSite(Site $site, User $user)
    {
        if ($site->subscribers()->where('user_id', $user->id)->exists()) {
            throw ValidationException::withMessages([
                'user_id' => ['User is already subscribed to this site.'],
            ]);
        }

        $site->subscribers()->attach($user->id);

        return $site;
    }
}
