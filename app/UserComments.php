<?php

namespace Community;

use Illuminate\Database\Eloquent\Model;

class UserComments extends Model {

    protected $table = 'user_comments';

    protected $fillable = ['comment', 'profile_id', 'user_id'];

    public function user() {
        return $this->belongsTo(Models::classname(User::class), 'user_id');
    }

    public function profile() {
        return $this->belongsTo(Models::classname(User::class), 'profile_id');
    }

}
