@extends('main')

@section('content')
    <section class="hapo-learn-banner">
        <div class="banner-content">
            <p class="title">Learn Anytime, Anywhere</p>
            <div class="subtitle">
                <p>at HapoLearn </p>
                <div class="img-hapo-icon">
                    <img src="{{ asset('images/hapo_icon.png') }}" alt="Hapo icon">
                </div>
                <p>&nbsp!</p>
            </div>
            <p class="description">
                Interactive lessons, "on-the-go" <br>
                practice, peer support.
            </p>
            <button class="banner-btn"> Start Learning Now!</button>
        </div>
    </section>
    <div class="hapo-learn-banner-bottom">
    </div>
    
    <section class="list-course">
        @foreach($courses as $course)
            <div class="course-card">
                <div class="course-card-logo w3-logo">
                    <div class="img">
                        <img src="{{ $course->logo }}" alt="HTML, CSS, JS Tutorial">
                    </div>
                </div>
                <div class="course-card-content">
                    <p class="title">
                        {{ $course->name }}
                    </p>
                    <p class="content">
                        {{ $course->description }}
                    </p>
                    <button>
                        Take This Course
                    </button>
                </div>
            </div>
        @endforeach
    </section>
    <section class="orther-courses">
        <div class="other-courses-title">
            <p>Other courses</p>
        </div>
        <div class="orther-courses-list">
            
            @foreach($courses as $course)
                <div class="course-card">
                    <div class="course-card-logo css-logo">
                        <div class="img">
                            <img src="{{ $course->logo }}" alt="CSS Tutorial">
                        </div>
                    </div>
                    <div class="course-card-content">
                        <p class="title">
                            {{ $course->name }}
                        </p>
                        <p class="content">
                            {{ $course->description }}
                        </p>
                        <button>
                            Take This Course
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
        <a class="other-courses-link" href="#">
            View All Our Courses
            <i class="fa-solid fa-arrow-right-long"></i>
        </a>
    </section>
    <section class="why-hapo-learn">
        <div class="why-hapo-learn-top">
            <div class="top-img">
                <img src="{{ asset('images/small_lap.png') }}" alt="why-hapo-learn-img">
            </div>
            <p class="title active">Why HapoLearn?</p>
        </div>
        <div class="content">
            <div class="why-hapo-learn-list">
                <div class="container">
                    <p class="title">Why HapoLearn?</p>
                    <p>
                        <i class="fa-solid fa-circle-check"></i>
                        Interactive lessons, "on-the-go" practice, peer support.
                    </p>
                    <p>
                        <i class="fa-solid fa-circle-check"></i>
                        Interactive lessons, "on-the-go" practice, peer support.
                    </p>
                    <p>
                        <i class="fa-solid fa-circle-check"></i>
                        Interactive lessons, "on-the-go" practice, peer support.
                    </p>
                    <p>
                        <i class="fa-solid fa-circle-check"></i>
                        Interactive lessons, "on-the-go" practice, peer support.
                    </p>
                    <p>
                        <i class="fa-solid fa-circle-check"></i>
                        Interactive lessons, "on-the-go" practice, peer support.
                    </p>
                </div>
            </div>
            <div class="img">
                <img src="{{ asset('images/laptop.png') }}" alt="why-hapo-learn-img">
            </div>
        </div>
    </section>
    <section class="feedback">
        <div class="feedback-title">
            <p>Feedback</p>
        </div>
        <p class="feedback-desc">
            What other students turned professionals have to say about us after learning with us and reaching their
            goals
        </p>
        <div class="slick-slider">
            @foreach($reviews as $review)
            <div class="slick-item">
                <div class="slick-item-content">
                    <div class="line"></div>
                    <p>
                        {{ $review->comment }}
                    </p>
                </div>
                <div class="slick-item-down">
                    <div class="avatar">
                        <img src="{{ $review->avartar }}" alt="avatar">
                    </div>
                    <div class="profile">
                        <p class="name">{{ $review->name }}</p>
                        <p class="job">PHP</p>
                        <div class="rating">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    <section class="become-member">
        <div class="become-member-container">
            <p class="title">
                Become a member of our
                <br> growing community!
            </p>
            <button class="become-member-btn">Start Learning Now!</button>
        </div>
    </section>
    <section class="statistic">
        <div class="statistic-title">
            <p>Statistic</p>
        </div>
        <div class="statistic-details">
            <div class="details">
                <p class="details-name">Courses</p>
                <span class="details-num">{{ $sumcourse }}</span>
            </div>
            <div class="details">
                <p class="details-name">Lessons</p>
                <span class="details-num">{{ $sumlesson }}</span>
            </div>
            <div class="details">
                <p class="details-name">Learners</p>
                <span class="details-num">{{ $learners }}</span>
            </div>
        </div>
    </section>
@endsection