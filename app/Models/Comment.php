<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    const IS_ALLOW = 1;
    const IS_DISALLOW = 0;


    protected $fillable = ['text', 'user_id', 'post_id'];

    public function post()
    {
        return $this->hasOne(Post::class);
    }

    public function author()
    {
     return $this->hasOne(User::class);
    }

    public function allow()
    {
        $this->status = Comment::IS_ALLOW;
        $this->save();
    }

    public function disAllow()
    {
        $this->status = Comment::IS_DISALLOW;
        $this->save();
    }

    public function toggleStatus()
    {
        if ($this->status = null)
        {
            return $this->allow();
        }

        return  $this->disAllow();
    }

    public function remove()
    {
        $this->delete();
    }

}
