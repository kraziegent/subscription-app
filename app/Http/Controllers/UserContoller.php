<?php

namespace App\Http\Controllers;

use App\Http\Requests\SiteSubscribtionRequest;
use App\Http\Requests\UserStoreRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserContoller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  UserStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        try {
            $user = $request->execute();

            return $this->response($user, "User created successfully");
        } catch (\Exception $e) {
            return $this->response(null, "Error saving user {$e->getMessage()}", false);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    /**
     * Subscribe user to a site
     *
     * @param  SiteSubscribtionRequest $request
     * @return \Illuminate\Http\Response
     */
    public function subscribe(SiteSubscribtionRequest $request)
    {
        try {
            $site = $request->execute();

            return $this->response($site, "User subscribed to site successfully");
        } catch (\Exception $e) {
            return $this->response(null, "Error susbcribing to site. {$e->getMessage()}", 500);
        }
    }
}
