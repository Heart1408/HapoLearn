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
        return $this->belongsToMany(User::class, 'reviews', 'course_id', 'user_id')->withPivot('rate', 'comment', 'updated_at');
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
        if (isset($data['search_key'])) {
            $query->where('name', 'like', '%'. $data['search_key'] .'%')
                ->orWhere('description', 'like', '%'. $data['search_key'] .'%');
        }

        if (isset($data['status'])) {
            $query->orderBy('id', $data['status']);
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

    public function scopeJoined($query, $user)
    {
        return $query->withCount(['users as user' => function ($query) use ($user) {
            $query->where('user_id', $user);
        }]);
    }

    public static function isJoined($id)
    {
        if (Auth()->check()) {
            $user = Auth()->user()->id;
            $checkused = Course::Joined($user)->find($id);
            if ($checkused->user > 0) {
                return true;
            }
        }
        return false;
    }

    public function scopeGetDataReviews($query)
    {
        return $query->withCount([
            'reviews AS number_review' => function ($query) {
                $query->select(DB::raw('COUNT(user_id)'));
            },
            'reviews AS avg_rate' => function ($query) {
                $query->select(DB::raw('AVG(rate)'))->where('rate', '<>', null);
            },
            'reviews AS total_rating' => function ($query) {
                $query->select(DB::raw('COUNT(rate)'))->where('rate', '<>', null);
            },
            'reviews AS five_star' => function ($query) {
                $query->select(DB::raw("COUNT('rate')"))->where('rate', 5);
            },
            'reviews AS four_star' => function ($query) {
                $query->select(DB::raw("COUNT('rate')"))->where('rate', 4);
            },
            'reviews AS three_star' => function ($query) {
                $query->select(DB::raw("COUNT('rate')"))->where('rate', 3);
            },
            'reviews AS two_star' => function ($query) {
                $query->select(DB::raw("COUNT('rate')"))->where('rate', 2);
            },
            'reviews AS one_star' => function ($query) {
                $query->select(DB::raw("COUNT('rate')"))->where('rate', 1);
            }
        ]);
    }
}
