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
                <li>
                    <a id="loginRegisterFormBtn" href="#">LOGIN/REGISTER</a>
                </li> 
                <li>
                    <a href="#">PROFILE</a>
                </li>
            </ul>
            <button class="toggle" id="showMenu">
                <i class="fa-solid fa-bars"></i>
            </button>
        </div>
    </nav>
</section>
