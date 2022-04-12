<div class="form-popup" id="loginRegisterForm">
    <div class="popup-container">
        <div action="" class="form">
            <button class="close-form" id="closeForm">
                <i class="fa-solid fa-xmark"></i>
            </button>
            <div class="form-header">
                <button class="active" id="openLoginFormBtn">LOGIN</button>
                <button id="openRegisterFormBtn">REGISTER</button>
            </div>
            <form class="form-container login-form active-form" id="loginForm" action="{{ route('login') }}" method="POST">
                @csrf
                <label class="textfield" for="username">Username:</label>
                <input id="username" name="username" type="text">
                <label class="textfield" for="password">Password:</label>
                <input id="password" name="password" type="password">
                <div class="roww">
                    <div class="remember-me">
                        <label for="rememberMe">
                            <input id="rememberMe" type="checkbox">
                            <span class="checkmark"></span>
                            Remember me
                        </label>
                    </div>
                    <a href="#">Forgot password</a>
                </div>
                <button class="submit-form-btn" type="submit">LOGIN</button>
                <div class="line"></div>
                <p class="login-width">Login width</p>
                <button class="login-width-gg-btn"><i class="fa-brands fa-google-plus-g"></i>Google</button>
                <button class="login-width-fb-btn"><i class="fa-brands fa-facebook-f"></i>Facebook</button>
            </form>
            <form class="form-container register-form" id="registerForm" action="{{ route('register') }}" method="POST">
                @csrf
                <label class="textfield" for="username">Username:</label>
                <input id="username" type="text" class="form-control @error('username_register') is-invalid @enderror" name="username_register" value="{{ old('username_register') }}">
                <label class="text-danger form-label custom-label font-weight-bold">
                    @error('username_register')
                        {{ $message }}
                    @enderror
                </label>
                <label class="textfield" for="email">Email:</label>
                <input id="email" type="text"  class="form-control @error('email_register') is-invalid @enderror" name="email_register" value="{{ old('email_register') }}">
                <label class="text-danger form-label custom-label font-weight-bold">
                    @error('email_register')
                        {{ $message }}
                    @enderror
                </label>
                <label class="textfield" for="password">Password:</label>
                <input id="password" type="password" class="form-control @error('password_register') is-invalid @enderror" name="password_register">
                <label class="text-danger form-label custom-label font-weight-bold">
                    @error('password_register')
                        {{ $message }}
                    @enderror
                </label>
                <label class="textfield" for="repeatPassword">Repeat Password:</label>
                <input id="repeatPassword" type="password" class="form-control @error('repeatpass') is-invalid @enderror" name="repeatpass">
                <label class="text-danger form-label custom-label font-weight-bold">
                    @error('repeatpass')
                        {{ $message }}
                    @enderror
                </label>
                <button class="submit-form-btn">REGISTER</button>
                <div class="form-bottom"></div>
            </form>
        </div>
    </div>
</div>
