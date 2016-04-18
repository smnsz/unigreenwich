<?php

namespace Community;

use Illuminate\Database\Eloquent\Model;

class ForumThreadsRead extends Model {

    protected $table = 'forum_threads_read';
    protected $fillable = ['thread_id', 'user_id'];

}
