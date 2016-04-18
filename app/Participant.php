<?php
namespace Community;

use Community\User;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;

class Participant extends Eloquent
{
    use SoftDeletes;

    protected $table = 'participants';

    protected $fillable = ['thread_id', 'user_id', 'last_read'];

    protected $dates = ['created_at', 'updated_at', 'deleted_at', 'last_read'];

    public function __construct(array $attributes = [])
    {
        $this->table = Models::table('participants');
        parent::__construct($attributes);
    }

    public function thread()
    {
        return $this->belongsTo(Models::classname(Thread::class), 'thread_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(Models::classname(User::class), 'user_id');
    }
}