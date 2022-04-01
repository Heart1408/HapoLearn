<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory,
        SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'logo',
        'price',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_course', 'course_id', 'user_id');
    }

    public function teachers()
    {
        return $this->belongsToMany(Course::class, 'teacher_course', 'course_id', 'user_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
