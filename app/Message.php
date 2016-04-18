<?php
namespace Community;

use Community\User;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Message extends Eloquent
{

    protected $table = 'messages';

    protected $touches = ['thread'];

    protected $fillable = ['thread_id', 'user_id', 'body'];

    protected $rules = [
        'body' => 'required',
    ];

    public function __construct(array $attributes = [])
    {
        $this->table = Models::table('messages');
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

    public function participants()
    {
        return $this->hasMany(Models::classname(Participant::class), 'thread_id', 'thread_id');
    }

    public function recipients()
    {
        return $this->participants()->where('user_id', '!=', $this->user_id);
    }
}