<?php

namespace Community;

use Illuminate\Database\Eloquent\Model;

class ForumThreads extends Model {

    protected $table = 'forum_threads';
    protected $fillable = ['category_id', 'author_id', 'title', 'pinned', 'locked'];

    public function category() {
        return $this->belongsTo(Models::classname(ForumCategories::class), 'category_id');
    }
    public function author() {
        return $this->belongsTo(Models::classname(User::class), 'author_id');
    }

}
