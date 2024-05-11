<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Self Education-{{ Request::route()->getName() }}</title>
    <link rel="stylesheet" href="{{ asset('Links/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Links/css/all.min.css') }}">
    <script src="{{ asset('Links/jQuery/node_modules/jquery/dist/jquery.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('Links/css/login1.css') }}">
    <link rel="stylesheet" href="{{ asset('Links/node_modules/bootstrap-icons/font/bootstrap-icons.css') }}">
</head>

<body class="w-100 vh-100">
    @include('includes.loading')
    <div class="w-100 h-100  d-flex justify-content-center align-items-center page"  style="opacity:0 !important">
    <div class="content w-75 h-75 bg-white position-relative" style="overflow: hidden;">
        <div class="sign-in-sign-up position-absolute">
            <div class="header px-5 pt-3 w-100 d-flex flex-row justify-content-between">
                <a class="logo fs-5 shadow-primary-input text-black" style="font-weight: 510;" href="">
                    <span class="text-nor fs-4 fw-bold">Self</span>Education
                </a>
                <div class="checkbox-div fw-bold fs-4 rounded-circle d-flex align-items-center justify-content-center">
                    <label for="#checkbox-mode" class=" d-flex align-items-center justify-content-center">
                        <input type="checkbox" id="checkbox-mode" style="display: none;">
                        <div class="icon">
                            <i class="bi bi-brightness-high-fill"></i>
                        </div>
                    </label>
                </div>
            </div>
            <div class="sign-in w-100 position-absolute start-50 top-50 translate-middle">
                <form method="POST" action="{{ route('login') }}"  class="w-50 h-100 d-flex flex-column">
                    @csrf
                    <h1 class="fw-bold text-start text-nor fs-4 mb-<?=$errors->any()?3:5 ?> title position-relative">Welcome Back</h1>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert" style="display:<?=$errors->any()?'block':'none' ?> !important">
                        <strong>Error!</strong> email or password incorrect please try again.
                    </div>
                    <div class="form-input mb-3 position-relative">
                        <input type="email" class=" w-100 h-100 rounded-3 shadow-primary-input border-nor @error('email') border-danger @enderror" value="{{ old('email') }}" id="email_sign_in" name="email"  placeholder="Email address" required autocomplete="off" autofocus/>
                        <i class="fa-solid fa-envelope position-absolute top-50 translate-middle fs-5 text-nor @error('email') text-danger @enderror" style="left: 7%;"></i>
                    </div>
                    <div class="form-input mb-3  position-relative">
                        <input type="password" class="w-100 h-100 rounded-3 shadow-primary-input border-nor @error('password') border-danger @enderror" value="{{ old('password') }}" maxlength="16" id="password_in"  name="password" placeholder="Password" required autocomplete="off" />
                        {{-- <asp:textbox autocomplete="off"> --}}
                        <i class="fa-solid fa-lock position-absolute top-50 translate-middle text-nor @error('password') text-danger @enderror fs-5" style="left: 7%;"></i>
                        <i class="fa-solid fa-eye position-absolute end-0 translate-middle text-nor @error('password') text-danger @enderror" style="top:50%;font-size:1rem !important;cursor:pointer;"></i>
                    </div>
                    <div class="checkbox mb-3 ms-1 fs-6 fw-normal">
                        <label>
                            <input type="checkbox" value="on" name="remember" id="remember_me" checked {{ old('remember') ? 'checked' : '' }} /> Remember me
                        </label>
                    </div>
                    <button class="btn mb-2 btn-lg shadow-primary btn-form" name="login" type="submit">
                        Log In
                    </button>
                    <p class="mt-1 text-end"><a class="fst-normal fp fw-semibold" href="{{ route('Forgot-password') }}">Forget password?</a></p>
                </form>
            </div>
            <p class="text-muted text-end position-absolute start-50 d-none d-md-block" style="top:93% !important; transform:translateX(-50%)">&copy; 2024 Self Education </p>
        </div>
        <div class="panels position-absolute top-0">
            <div class="panel h-75 panel-right position-absolute top-0">
                <div class="container h-75 d-flex flex-column my-5 align-items-center justify-content-around">
                    <div class="content d-flex flex-column align-items-center">
                        <h3 class="fw-bold fs-2 text-white"> New here ?</h3>
                        <p class="text-white fs-4">Powerful for developers.<br /> Fast for everyone.</p>
                        <a class="btn btn-outline-light shadow-primary transparent fw-bold" href="{{ route('Register') }}" id="sign-up-btn">Sign up</a>
                    </div>
                    <a class=" btn btn-lg btn-primary shadow-primary fs-6 rounded-3 facebook" href="{{ route('facebook.Login') }}" style="font-weight: 580;" name="facebook_sign_in">
                        <i class="fa-brands fa-facebook-square fs-5"></i>
                        <span> Sign in <span class="fm">with Facebook</span></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        //variables
        let inp_sign_in = document.querySelectorAll(".sign-in form input");
        let icon_sign_in = document.querySelectorAll(".sign-in form i");
        //hide show password

        icon_sign_in[2].addEventListener('click', function() {
                if (this.classList.contains("fa-eye")) {
                    this.classList.replace("fa-eye", "fa-eye-slash");
                    inp_sign_in[2].type = "text";
                } else {
                    this.classList.replace("fa-eye-slash", "fa-eye");
                    inp_sign_in[2].type = "password";
                }
            });
            //validate password
            const re_validate_password = /^(?=.*\d)(?=.*[a-z])(?=.*[!@#$%^&*]).{8,16}$/i;
            //validate email
            const re_validate_email = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/i;

            document.forms[0].onsubmit=function(e){
                let email=false
                let password=false
                let a=false
                if(re_validate_email.test(inp_sign_in[1].value)){
                    email=true
                    inp_sign_in[1].classList.replace('border-danger','border-nor')
                    icon_sign_in[0].classList.replace('text-danger','text-nor')
                }else{
                    inp_sign_in[1].classList.replace('border-nor','border-danger')
                    icon_sign_in[0].classList.replace('text-nor','text-danger')
                    a=true
                }
                if(a==false){
                    if(re_validate_password.test(inp_sign_in[2].value)){
                        password=true
                        inp_sign_in[2].classList.replace('border-danger','border-nor')
                        icon_sign_in[1].classList.replace('text-danger','text-nor')
                        icon_sign_in[2].classList.replace('text-danger','text-nor')
                    }else{
                        inp_sign_in[2].classList.replace('border-nor','border-danger')
                        icon_sign_in[1].classList.replace('text-nor','text-danger')
                        icon_sign_in[2].classList.replace('text-nor','text-danger')
                    }
                }
                if(email==false||password==false){
                    e.preventDefault();
                    document.querySelector('.alert.alert-danger').style.cssText='display=Block !important'
                    if(inp_sign_in[2].classList.contains('border-danger'))
                        inp_sign_in[2].focus()
                    else
                        inp_sign_in[1].focus()
                }
            }
        /*
        //remember me
        document.querySelector("#remember_me").addEventListener("change",function(e){
            if(e.target.checked){
            this.value="on";
            this.setAttribute('checked','true')
            }
            else{
                this.value="off";
                this.removeAttribute('checked')
            }
        })
        */
    </script>
</body>

</html>
