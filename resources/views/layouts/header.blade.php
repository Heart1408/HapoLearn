<section class="header">
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('success')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @elseif (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error: </strong> {{session('error')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session('error-message'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{session('error-message')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('message')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <nav>
        <div class="header-menu">
            <div class="header-logo">
                <div class="logo-img">
                    <img src="{{ asset('images/hapo_learn_logo.png') }}" alt="HapoLearn logo">
                </div> 
            </div>
            <ul class="header-menu-list" id="headerMenuList">
                <li>
                    <a href="#">HOME</a>
                </li>
                <li>
                    <a class="active-menu" href="#">ALL COURSES</a>
                </li>
                @if (@Auth::check()) 
                    <li class="dropdown row">
                        <a class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                            {{ Auth()->user()->name }}
                        </a>
                        <div class="img">
                            <img src="{{ asset(Auth()->user()->avartar) }}" alt="avartar">
                        </div>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Profile</a>
                            <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                        </div>
                    </li>
                @else
                    <li>
                        <a id="loginRegisterFormBtn" href="#">LOGIN/REGISTER</a>
                    </li>
                @endif
            </ul>
            <button class="toggle" id="showMenu">
                <i class="fa-solid fa-bars"></i>
            </button>
        </div>
    </nav>
</section>