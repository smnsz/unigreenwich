<?php

namespace Community\Http\Controllers;

use Auth;
use Community\User;
use Illuminate\Http\Request;

class FriendController extends Controller
{
    public function getIndex()
    {
        $friends = Auth::user()->friends();
        $requests = Auth::user()->friendRequests();
        return view('friends.index')
            ->with('friends', $friends)
            ->with('requests', $requests);
    }
    /**
     * Send a friend request
     */
    public function getAdd($username)
    {        
        $ma_user = json_decode($username);
        $user = User::where('username', $ma_user->username)->first();
        //if the user can be found
        if (!$user)
        {
            return redirect()->route('root_path')->with('info', 'The user couldn\'t be found');
        }
        //check if we send the request back to us
        if ( Auth::user()->id === $user->id )
        {
            return redirect()->route('root_path');
        }
        //if the request is being already set
        if ( Auth::user()->hasFriendRequestPending($user) || $user->hasFriendRequestPending(Auth::user()) )
        {
            return redirect()->route('profile_path', ['username' => $user->username])
                ->with('info', 'Friend request already pending.');
        }
        //if we are already friends
        if ( Auth::user()->isFriendWith($user) )
        {
            return redirect()->route('profile_path', ['username' => $user->username])
                ->with('info', 'You are already friends.');
        }
        Auth::user()->addFriend($user);
        return redirect()
            ->route('profile_path', ['username' => $user->username])
                ->with('info', 'Friend request sent.');
    }
    /**
     * Accept a friend request
     */
    public function getAccept($username)
    {
        $ma_user = json_decode($username);
        $user = User::where('username', $ma_user->username)->first();
        //if the user can be found
        if (!$user)
        {
            return redirect()->route('root_path')->with('info', 'The user couldn\'t be found');
        }
        //if we actually received a friend request from this user
        if ( !Auth::user()->hasFriendRequestReceived($user) )
        {
            return redirect()->route('root_path');
        }
        Auth::user()->acceptFriendRequest($user);
        return redirect()->route('profile_path', ['username' => $user->username])
            ->with('info', 'Friend Request accepted');
    }
}