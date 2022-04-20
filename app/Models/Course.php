<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Course extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'logo',
        'price',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_courses', 'course_id', 'user_id');
    }

    public function students()
    {
        return $this->users()->where('users.role', User::ROLE['student']);
    }

    public function teachers()
    {
        return $this->belongsToMany(User::class, 'teacher_courses', 'course_id', 'user_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'course_tags', 'course_id', 'tag_id');
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class, 'course_id');
    }

    public function getTotalLearnerAttribute()
    {
        return $this->students()->count();
    }

    public function getTotalLessonAttribute()
    {
        return $this->lessons()->count();
    }

    public function getTotalTimeAttribute()
    {
        return $this->lessons()->sum('time');
    }

    public function getRateAttribute()
    {
        return $this->reviews()->avg('rate');
    }

    public function scopeSearch($query, $data)
    {
        if (isset($data['key'])) {
            $query->where('courses.name', 'like', '%'. $data['key'] .'%')
                ->orWhere('courses.description', 'like', '%'. $data['key'] .'%');
        }

        if (isset($data['status'])) {
            $query->orderBy('courses.id', $data['status']);
        }

        if (isset($data['teacher'])) {
            $query->whereHas('teachers', function ($subQuery) use ($data) {
                $subQuery->where('user_id', $data['teacher']);
            });
        }

        if (isset($data['number_learner'])) {
            $query->withCount('students')->orderBy('students_count', $data["number_learner"]);
        }

        if (isset($data['number_lesson'])) {
            $query->withCount('lessons')->orderBy('lessons_count', $data["number_lesson"]);
        }

        if (isset($data['time'])) {
            $query->withSum('lessons', 'time')->orderBy('lessons_sum_time', $data["time"]);
        }

        if (isset($data['tags'])) {
            $query->whereHas('tags', function ($subquery) use ($data) {
                $subquery->where('tag_id', $data['tags']);
            });
        }

        return $query;
    }
}
