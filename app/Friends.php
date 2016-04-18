<?php

namespace Community;

use Illuminate\Database\Eloquent\Model;

class Friends extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'friends';

    /**
     * The attributes that can be set with Mass Assignment.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'friend_id', 'accepted'];

    public function user() {
        return $this->belongsTo(Models::classname(User::class), 'user_id');
    }
    
    public function friend() {
        return $this->belongsTo(Models::classname(User::class), 'friend_id');
    }

}
