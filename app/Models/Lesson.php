<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lesson extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'course_id',
        'description',
        'requirement',
        'time',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_lessons', 'lesson_id', 'user_id');
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function scopeGetLessons($query, $data, $id)
    {
        $query->where('course_id', $id)->orderBy('course_id');
        if (isset($data['search_key'])) {
            $query->where('lessons.description', 'like', '%'. $data['search_key'] . '%');
        }
        return $query;
    }
}
