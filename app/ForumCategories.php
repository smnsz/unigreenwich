<?php

namespace Community;

use Illuminate\Database\Eloquent\Model;

class ForumCategories extends Model {

    protected $table = 'forum_categories';
    protected $fillable = ['category_id', 'title', 'description', 'weight', 'enable_threads', 'private'];

    
    public function category() {
        return $this->belongsTo(Models::classname(ForumCategories::class), 'category_id');
    }
    
    

}
