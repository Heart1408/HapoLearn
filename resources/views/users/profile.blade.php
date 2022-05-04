@extends('main')

@section('content')
    <section class="profile row">
        <div class="col-12 col-sm-4">
            <div class="info text-center">
                <div class="avatar">
                    <img src="{{ Auth()->user()->avartar }}" alt="avatar">
                    <label for="changeAvatar" class="change-avatar-btn"><i class="fa-solid fa-camera"></i></label>
                    <input id="changeAvatar" class="d-none" type="file" name="avatar">
                    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" id="modalUpdateAvatar">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h2 class="modal-title">Change Avatar</h2>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="avatar-preview">
                                        <img id="imagePreview"></img>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" id="updateAvatarBtn">Save changes</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="name">{{ Auth()->user()->name }}</p>
                <p class="email">{{ Auth()->user()->email }}</p>
            </div>
            <div class="info-details birthday">
                <i class="fa-solid fa-cake-candles"></i>
                <p>{{ Auth()->user()->birthday }}</p>
            </div>
            <div class="info-details phone">
                <i class="fa-solid fa-phone"></i>
                <p>{{ Auth()->user()->phone }}</p>
            </div>
            <div class="info-details address">
                <i class="fa-solid fa-house-chimney"></i>
                <p>{{ Auth()->user()->address }}</p>
            </div>
            <div class="desc">{{ Auth()->user()->description }}</div>
        </div>
        <div class="col-12 col-sm-8">
            <div class="mycourse">
                <p class="title">My courses</p>
                <div class="row justify-content-center">
                    @foreach ($courses as $course)
                    <div class="course px-3">
                        <a href="{{ route('courses.show', $course->id) }}">
                            <div class="img">
                                <img src="{{ $course->logo }}" alt="">
                            </div>
                        </a>
                        <div class="course-name text-center pt-2">HTML</div>
                    </div>
                    @endforeach
                    <div class="course px-3">
                        <a class="add-course-btn" href="{{ route('courses.index') }}"><i class="fa-solid fa-plus"></i></a>
                        <div class="course-name add-course-text text-center pt-2">Add course</div>
                    </div>
                </div>
            </div>
            <div class="edit-profile">
                <p class="title">Edit profile</p>
                <form action="{{ route('editprofile') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6 col-12">
                            <label for="name" class="form-label custom-label font-weight-bold">Name:</label>
                            <input type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" placeholder="Your name..." id="name" name="name">
                            <label class="text-danger form-label custom-label font-weight-bold">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </label>
                        </div>
                        <div class="form-group col-md-6 col-12">
                            <label for="email" class="form-label custom-label font-weight-bold">Email:</label>
                            <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror"  placeholder="Your email..." id="email" name="email">
                            <label class="text-danger form-label custom-label font-weight-bold">
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </label>
                        </div>
                        <div class="form-group col-md-6 col-12">
                            <label for="birthday" class="form-label custom-label font-weight-bold">Date of birthday:</label>
                            <input type="date" class="form-control form-control-lg @error('birthday') is-invalid @enderror" id="birthday" name="birthday">
                            <label class="text-danger form-label custom-label font-weight-bold">
                                @error('birthday')
                                    {{ $message }}
                                @enderror
                            </label>
                        </div>
                        <div class="form-group col-md-6 col-12">
                            <label for="phone" class="form-label custom-label font-weight-bold">Phone:</label>
                            <input type="text" class="form-control form-control-lg @error('phone') is-invalid @enderror"  placeholder="Your phone..." id="phone" name="phone">
                            <label class="text-danger form-label custom-label font-weight-bold">
                                @error('phone')
                                    {{ $message }}
                                @enderror
                            </label>
                        </div>
                        <div class="form-group col-md-6 col-12">
                            <label for="address" class="form-label custom-label font-weight-bold">Address:</label>
                            <input type="text" class="form-control form-control-lg @error('address') is-invalid @enderror" placeholder="Your address..." id="address" name="address">
                            <label class="text-danger form-label custom-label font-weight-bold">
                                @error('address')
                                    {{ $message }}
                                @enderror
                            </label>
                        </div>
                        <div class="form-group col-md-6 col-12">
                            <label for="desc" class="form-label custom-label font-weight-bold">About me:</label>
                            <textarea rows="3" class="form-control form-control-lg" placeholder="About you..." id="desc" name="desc"></textarea>
                        </div>
                    </div>
                    <button class="edit-profile-btn" type="submit">Save</button>
                </form>
            </div>
        </div>
    </section>
@endsection
