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
        <div class="container row">
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
                                @if ($checkJoinCourse == 1)
                                    <form action="{{ route('courses.update',  $course->id) }}" method="post">
                                    @method('put')
                                        @csrf
                                        <button type="submit">Rời khóa học</button>
                                    </form>
                                 @else
                                    <form action="{{ route('courses.store') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="course_id" value="{{ $course->id }}">
                                        <button type="submit">Tham gia khóa học</button>
                                    </form>
                                @endif
                            </div>
                            @foreach ($lessons as $lesson)
                            <div class="lessons_list">
                                <p class="lesson_desc">{{ ($lessons->currentPage()-1) * $lessons->perPage() + $loop->index + 1 }} .   {{ $lesson->description }}</p>
                                <a class="lesson-btn" @if ($checkJoinCourse == 0) style="pointer-events: none; cursor: default;" @endif href="{{ route('courses.lessons.show', [$course->id, $lesson->id]) }}">Learn</a>
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
                        <div class="tab-pane fade review" id="pills-review" role="tabpanel" aria-labelledby="pills-contact-tab">
                            <div class="total-review" id="numberReview"></div>
                            <div class="rating row">
                                <div class="total-rating col-md-4 col-12">
                                    <div class="container">
                                        <span class="avg-rate" id="avgRate"></span>
                                        <div class="star" rate="{{ floor($course->rate) }}">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <span id="number-vote"></span>
                                    </div>
                                </div>
                                <div class="rating-detail col-md-8 col-12">
                                    <div class="container" id="showRatingDetail">
                                    </div>
                                </div>
                            </div>
                            <div class="list-review" id="listReviews">
                            </div>
                            <a class="leave-review-link" href="#">Leave a Review</a>
                            <div class="review-message m-3">
                                <p class="title">Message</p>
                                <input type="hidden" id="courseId" name="course_id" value="{{ $course->id }}">
                                <textarea name="comment" id="comment" cols="30" rows="5" class="form-control mb-3"></textarea>
                                <div class="vote-star d-flex align-items-center">
                                    <p class="title">Vote </p>
                                    <div class="vote">
                                        <input type="radio" id="star-five" name="vote" class="vote-option" value="5"/>
                                        <label for="star-five" title="text"></label>
                                        <input type="radio" id="star-four" name="vote" class="vote-option" value="4"/>
                                        <label for="star-four" title="text"></label>
                                        <input type="radio" id="star-three" name="vote" class="vote-option" value="3" />
                                        <label for="star-three" title="text"></label>
                                        <input type="radio" id="star-two" name="vote" class="vote-option" value="2" />
                                        <label for="star-two" title="text"></label>
                                        <input type="radio" id="star-one" name="vote" class="vote-option star-one" value="1" />
                                        <label for="star-one" title="text"></label>
                                    </div>
                                    <p class="sub-title">(stars)</p>
                                </div>
                                <button class="send-review-btn" id="sendReviewMessage">Send</button>
                            </div>
                        </div>
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
