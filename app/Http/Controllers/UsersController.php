<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function notifications()
    {
        auth()->user()->unreadNotifications->markAsread();

        //dd(auth()->user()->notifications->first()->data['discussion']['title']);

        return view('users.notifications',[

            'notifications' => auth()->user()->notifications
        ]);
    }
}
