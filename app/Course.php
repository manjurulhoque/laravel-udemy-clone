<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $guarded = [];

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    public function review()
    {
        return $this->reviews()->whereUserId(auth()->user()->id)->whereCourseId($this->id)->first();
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function getAverageAttribute()
    {
        return (int)$this->reviews()->where('user_id', auth()->user()->id)->avg('rating');
    }
}
