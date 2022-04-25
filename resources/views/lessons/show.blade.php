@extends('main')

@section('content')
    <div class="tab">
        <div class="tab-content">
            <a href="{{ route('homepage') }}">Home > </a>
            <a href="{{ route('courses.index') }}"> All courses ></a>
            <a href="{{ route('courses.show', $course->id) }}"> Course details ></a>
            <a href="#"> Lesson details</a>
        </div>
    </div>
    <div class="lesson-details">
        <div class="container">
            <div class="course-details-left col-12 col-md-9">
                <div class="img">
                    <img src="{{ $course->logo }}" alt="course-logo-img">
                </div>
                <div class="lesson_content">
                    <ul class="nav nav-pills mb-3 tab-list" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="tab-btn active" data-toggle="pill" href="#pills-desc" role="tab" aria-selected="true">Descriptions</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="tab-btn" data-toggle="pill" href="#pills-program" role="tab" aria-selected="false">Program</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active description" id="pills-desc" role="tabpanel" aria-labelledby="pills-home-tab">
                            <p class="title">Descriptions Lesson</p>
                            <p class="details">{{ $lesson->description }}</p>
                            <p class="title">Requirements</p>
                            <p class="details">{{ $lesson->requirement }}</p>
                            <div class="tag">
                                <p class="tag-title">Tags: </p>
                                @foreach ($course->tags as $tag)
                                    <a href="">#{{ $tag->name }}</a>
                                @endforeach
                            </div>
                        </div>
                        <div class="tab-pane fade program" id="pills-program" role="tabpanel" aria-labelledby="pills-contact-tab">
                            <p class="title">Program</p>
                            <div class="program-list">
                                <div class="program-list-item">
                                    <div class="icon">
                                        <img src="{{ asset('images/docs.png') }}" alt="docs-png">
                                        <p>Lesson</p>
                                    </div>
                                    <p class="program-name">Program learn HTML/CSS</p>
                                </div>
                                <a class="program-btn" href="#">Preview</a>
                            </div>
                            <div class="program-list">
                                <div class="program-list-item">
                                    <div class="icon">
                                        <img src="{{ asset('images/pdf.png') }}" alt="docs-png">
                                        <p>PDF</p>
                                    </div>
                                    <p class="program-name">Download course slides</p>
                                </div>
                                <a class="program-btn" href="#">Preview</a>
                            </div>
                            <div class="program-list">
                                <div class="program-list-item">
                                    <div class="icon">
                                        <img src="{{ asset('images/video.png') }}" alt="docs-png">
                                        <p>Video</p>
                                    </div>
                                    <p class="program-name">Download course videos</p>
                                </div>
                                <a class="program-btn" href="#">Preview</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="couse-statistic">
                    <div class="field">
                        <div class="field-name">
                            <i class="fa-solid fa-desktop"></i>
                            <p class="name">Course</p>
                        </div>
                        <p class="number">: {{ $course->name}} </p>
                    </div>
                    <div class="field">
                        <div class="field-name">
                            <i class="fa-solid fa-users"></i>
                            <p class="name">Learners</p>
                        </div>
                        <p class="number">: {{ $course->totalLearner }}</p>
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
