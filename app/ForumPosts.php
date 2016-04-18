<?php

namespace Community;

use Illuminate\Database\Eloquent\Model;

class ForumPosts extends Model {

    protected $table = 'forum_posts';
    protected $fillable = ['thread_id', 'author_id', 'content', 'post_id'];

    public function thread() {
        return $this->belongsTo(Models::classname(Thread::class), 'thread_id', 'id');
    }

    public function author() {
        return $this->belongsTo(Models::classname(User::class), 'author_id');
    }

}
