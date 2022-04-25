<div class="col-12 col-md-6 course-card">
    <div class="container">
        <div class="course-content row">
            <div class="img">
                <img src="{{ $course->logo }}" alt="">
            </div>
            <div class="course-content-desc">
                <p class="title">{{ $course->name }}</p>
                <p class="desc">{{ $course->description }}</p>
                <button>More</button>
            </div>
        </div>
        <div class="course-card-bottom row">
            <div class="statistic">
                <p class="name">Learners</p>
                <span>{{ number_format($course->total_learner) }}</span>
            </div>
            <div class="statistic">
                <p class="name">Lessons</p>
                <span>{{ number_format($course->total_lesson) }}</span>
            </div>
            <div class="statistic">
                <p class="name">Times</p>
                <span>{{ number_format($course->total_time) }} (h)</span>
            </div>
        </div>
    </div>
</div>
