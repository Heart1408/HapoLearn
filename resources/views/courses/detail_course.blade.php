@extends('main')

@section('content')
    <div class="tab">
        <div class="tab-content">
            <a href="{{ route('homepage') }}">Home > </a>
            <a href="{{ route('courses.index') }}"> All courses ></a>
            <a href="#"> Course details</a>
        </div>
    </div>
    <div class="course-details">
        <div class="container">
            <div class="course-details-left col-12 col-md-9">
                <div class="img">
                    <img src="{{ $course->logo }}" alt="course-logo-img">
                </div>
                <div class="lesson_content">
                    <ul class="nav nav-pills mb-3 tab-list" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="tab-btn active" data-toggle="pill" href="#pills-lesson" role="tab" aria-selected="true">Lessons</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="tab-btn" data-toggle="pill" href="#pills-teacher" role="tab" aria-selected="false">Teacher</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="tab-btn" data-toggle="pill" href="#pills-review" role="tab" aria-selected="false">Review</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-lesson" role="tabpanel" aria-labelledby="pills-home-tab">
                            <div class="tab-lesson-head">
                                <form action="{{ route('courses.show', $course->id) }}" method="get" class="search">
                                    <input type="text" placeholder="Tìm kiếm" name="search_key" value="{{ request('search_key') }}">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                    <button type="submit">Tìm kiếm</button>
                                </form>
                                <button>Tham gia khóa học</button>
                            </div>
                            @foreach ($lessons as $lesson)
                            <div class="lessons_list">
                                <p class="lesson_desc">{{ ($lessons->currentPage()-1) * $lessons->perPage() + $loop->index + 1 }} .   {{ $lesson->description }}</p>
                                <a class="lesson-btn" href="{{ route('courses.lessons.show', [$course->id, $lesson->id]) }}">Learn</a>
                            </div>
                           @endforeach
                           {{ $lessons->withQueryString()->links('layouts.pagination')}}
                        </div>
                        <div class="tab-pane fade teacher" id="pills-teacher" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <p class="title">Main Teacher</p>
                            <div class="teacher-list">
                                @foreach ($course->teachers as $teacher)
                                    <div class="info">
                                        <div class="avartar">
                                            <img src="{{ $teacher->avartar }}" alt="avartar-img">
                                        </div>
                                        <div class="detail">
                                            <p class="name">{{ $teacher->name }}</p>
                                            <p class="experiences">Second Year Teacher</p>
                                            <div class="contact">
                                                <a href="#" class="icon google-plus"><i class="fa-brands fa-google-plus-g"></i></a>
                                                <a href="#" class="icon facebook"><i class="fa-brands fa-facebook-f"></i></a>
                                                <a href="#" class="icon slack"><i class="fa-brands fa-slack"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="desc">
                                        Vivamus volutpat eros pulvinar velit laoreet, sit amet egestas erat dignissim. Sed quis rutrum tellus, sit amet viverra felis. Cras sagittis sem sit amet urna feugiat rutrum. Nam nulla ipsum, venenatis malesuada felis quis, ultricies convallis neque. Pellentesque tristique 
                                    </p>
                                @endforeach
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-review" role="tabpanel" aria-labelledby="pills-contact-tab">...</div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="desc-course">
                    <p class="title">Descriptions course</p>
                    <p class="desc">{{ $course->description }}</p>
                </div>
                <div class="couse-statistic">
                    <div class="field">
                        <div class="field-name">
                            <i class="fa-solid fa-users"></i>
                            <p class="name">Learners</p>
                        </div>
                        <p class="number">: {{ $course->totalLearner }}</p>
                    </div>
                    <div class="field">
                        <div class="field-name">
                            <i class="fa-solid fa-rectangle-list"></i>
                            <p class="name">Lessons</p>
                        </div>
                        <p class="number">: {{ $course->totalLesson}} lesson</p>
                    </div>
                    <div class="field">
                        <div class="field-name">
                            <i class="fa-solid fa-clock"></i>
                            <p class="name">Times</p>
                        </div>
                        <p class="number">: {{ $course->totalTime }} hours</p>
                    </div>
                    <div class="field">
                        <div class="field-name">
                            <i class="fa-solid fa-tags"></i>
                            <p class="name">Tags</p>
                        </div>
                        @foreach ($course->tags as $tag)
                            <a href="/courses?tags={{ $tag->id }}">#{{ $tag->name }}</a> 
                        @endforeach
                    </div>
                    <div class="field">
                        <div class="field-name">
                            <i class="fa-solid fa-money-bill-1"></i>
                            <p class="name">Price</p>
                        </div>
                        <p class="number">: {{ $course->price }}</p>
                    </div>
                </div>
                <div class="other-course-card">
                    <div class="title">Other Courses</div>
                    @foreach ($otherCourses as $course)
                    <div class="other-course">
                        <p>{{ $loop->index + 1 }}. {{ $course->name }}</p>
                    </div>
                    @endforeach
                    <a class="all-course-btn" href="{{ route('courses.index') }}">View all ours courses</a>
                </div>
            </div>
        </div>
    </div>
@endsection
