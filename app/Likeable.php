<?php


namespace App;


trait Likeable
{

    public function isDislikedBy(User $user)
    {
        return (bool)$user->likes->where('tweet_id', $this->id)->where('liked', false)->count();
    }

    public function likesCount()
    {
        return $this->likes()->where('liked', true)->count();
    }

    public function dislikesCount()
    {
        return $this->likes()->where('liked', false)->count();
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function isLikedBy(User $user)
    {
        return (bool)$user->likes()->where('tweet_id', $this->id)->where('liked', true)->count();
    }

    public function dislike($user = null)
    {
        return $this->like($user, false);
    }

    public function like($user = null, $like = true)
    {

        return $this->likes()->updateOrCreate([
            'user_id' => $user ? $user->id : auth()->id(),
        ], [
            'liked' => $like
        ]);
    }
}
