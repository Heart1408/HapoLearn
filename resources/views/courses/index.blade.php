@extends('main')

@section('content')
    <div class="list_course_page">
        <form action="{{ route('courses.index') }}" method="get" class="list_course_header">
            <div class="search row">
                <button type="button" class="btn-filter" id="filter-btn"><i class="fa-solid fa-sliders"></i> Filter</button>
                <input type="text" placeholder="Search..." name="key" value="{{ request('key') }}">
                <button class="search-btn" type="submit">Tìm kiếm</button>
            </div>
            <div class="filter row" id="filter">
                <p class="title">Lọc theo</p>
                <div class="row container">
                    <input type="radio" name="status" id="new-status" value="desc" {{ request('status') == 'desc' ? 'checked' : '' }}>
                    <label class="status-btn btn-newest active" for="new-status">Mới nhất</label>
                    <input type="radio" name="status" id="old-status" value="asc" {{ request('status') == 'asc' ? 'checked' : '' }}>
                    <label class="status-btn btn-oldest" for="old-status">Cũ nhất</label>
                    <select name="teacher" id="teacher">
                        <option value="" {{ request('teacher') ? 'selected' : '' }}>Teacher</option>
                        @foreach ($teachers as $teacher)
                            <option value="{{ $teacher->id }}" {{ request('teacher') == $teacher->id ? 'selected' : '' }}>{{ $teacher->name }}</option>
                        @endforeach
                    </select>
                    <select name="number_learner" id="">
                        <option value="" {{ request('number_learner') ? 'selected' : '' }}>Số người học</option>
                        <option value="asc" {{ request('number_learner') == 'asc' ? 'selected' : '' }}>Tăng dần</option>
                        <option value="desc" {{ request('number_learner') == 'desc' ? 'selected' : '' }}>Giảm dần</option>
                    </select>
                    <select name="time" id="">
                        <option value="" {{ request('time') ? 'selected' : '' }}>Thời gian học</option>
                        <option value="asc" {{ request('time') == 'asc' ? 'selected' : '' }}>Tăng dần</option>
                        <option value="desc" {{ request('time') == 'desc' ? 'selected' : '' }}>Giảm dần</option> 
                    </select>
                    <select name="number_lesson" id="">
                        <option value="" {{ request('number_lesson') ? 'selected' : '' }}>Số bài học</option>
                        <option value="asc" {{ request('number_lesson') == 'asc' ? 'selected' : '' }}>Tăng dần</option>
                        <option value="desc" {{ request('number_lesson') == 'desc' ? 'selected' : '' }}>Giảm dần</option>
                    </select>
                    <select name="tags" id="">
                        <option value="">Tags</option>
                        @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}" {{ request('tags') == $tag->id  ? 'selected' : '' }}>{{ $tag->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </form>

        <div class="list_course row">
            @foreach ($courses as $course)
                @include('courses._course_card')
            @endforeach
        </div>
        {{ $courses->withQueryString()->links('layouts.pagination')}}
    </div>
@endsection
