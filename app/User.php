<?php

namespace Community;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;

use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    use PresentableTrait;

    protected $presenter = 'Community\Presenters\UserPresenter';

    protected $table = 'users';
    
    protected $fillable = ['username', 'year_of', 'first_name', 'last_name', 'email', 'password', 'address', 'programming', 'database', 'frontend', 'something', 'bio', 'avatar', 'available_for_help'];

    protected $hidden = ['password', 'remember_token'];
    
    public function posts()
    {
	    return $this->belongsToMany('Community\Posts', 'user_id');
    }
    
    public function comments()
    {
	    return $this->belongsToMany('Community\Comments', 'user_id');
    }
    
    public function friendsOfMine()
    {
	    return $this->belongsToMany('Community\User', 'friends', 'user_id', 'friend_id');
    }
    
    public function friendOf()
    {
	    return $this->belongsToMany('Community\User', 'friends', 'friend_id', 'user_id');
    }
    
    public function friends()
    {
	    return $this->friendsOfMine()->wherePivot('accepted', true)->get()->merge($this->friendOf()->wherePivot('accepted', true)->get());
    }
    
    public function friendRequests()
    {
	    return $this->friendsOfMine()->wherePivot('accepted', false)->get();
    }
    
    public function friendRequestsPending()
    {
        return $this->friendOf()->wherePivot('accepted', false)->get();
    }
    
    public function hasfriendRequestPending(User $user)
    {
        return (bool) $this->friendRequestsPending()->where('id', $user->id)->count();
    }
    
    public function hasFriendRequestReceived(User $user)
    {
        return (bool) $this->friendRequests()->where('id', $user->id)->count();
    }
    
    public function addFriend(User $user)
    {
        $this->friendOf()->attach($user->id);
    }
    
    public function acceptFriendRequest(User $user)
    {
        $this->friendRequests()->where('id', $user->id)->first()
            ->pivot->update([
                'accepted' =>true,
            ]);
    }
    
    public function isFriendWith(User $user)
    {
        return (bool) $this->friends()->where('id', $user->id)->count();
    }
    
    public function likes()
    {
	    return $this->morphMany('Community\Like', 'likeable');
    }
    
    public function getNameOrUsername()
    {
        return $this->getName()?:$this->username;
    }
    
    public function getFirstNameOrUsername()
    {
        return $this->first_name?: $this->username;
    }
}
