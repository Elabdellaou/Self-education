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

<body class="w-100 vh-100 rotate">
    @include('includes.loading')
    <div class="w-100 h-100  d-flex justify-content-center align-items-center page"  style="opacity:0 !important">
    <div class="content w-75 h-75 bg-white position-relative sign-up-mode " style="overflow: hidden;">
        <div class="sign-in-sign-up position-absolute">
            <div class="header px-5 pt-3 w-100 d-flex flex-row justify-content-between">
                <a class="logo fs-5 shadow-primary-input text-black" style="font-weight: 510;" href="">
                    <span class="text-nor fs-4 fw-bold">Self</span>Education
                </a>
                <div class="checkbox-div fw-bold fs-4 rounded-circle d-flex align-items-center justify-content-center">
                    <label for="#checkbox-mode" class=" d-flex align-items-center justify-content-center">
                        <input type="checkbox" name="" id="checkbox-mode" style="display: none;">
                        <div class="icon">
                            <i class="bi bi-brightness-high-fill"></i>
                        </div>
                    </label>
                </div>
            </div>
            <div class="sign-up w-100 h-75 position-absolute start-50 top-50 translate-middle">
                <form method="POST" action="{{ route('register') }}" class="w-50 h-100 d-flex flex-column">
                    <h1 class="mb-4 fw-bold text-start text-nor fs-3 mb-<?=$errors->any()?3:5 ?> title position-relative">Create Account</h1>
                    <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert"
                        style="display:<?=$errors->any()?'block':'none' ?> !important">
                        <strong>Error! </strong>
                        @if ($errors->has('name'))
                        <span>Fill in the name (use of special characters is prohibited).</span>
                       @elseif ($errors->has('email'))
                       <span>example : username@example.com.</span>
                       @elseif ($errors->has('password'))
                       <span>Please enter a more secure password (more than 8 chars, number and special character).</span>
                       @else
                       <span>Confirm password.</span>
                        @endif
                    </div>
                    @csrf

                    <div class="form-input mb-3 position-relative">
                        <input type="text" class="w-100 h-100 rounded-3 shadow-primary-input border-nor @error('name') border-danger @enderror"
                            id="fullname" value="{{ old('name') }}" name="name" placeholder="Full name" autocomplete="off" autofocus/>
                        <i class="fa-solid fa-user position-absolute top-50 translate-middle fs-5 text-nor @error('name') text-danger @enderror"
                            style="left: 7%;"></i>
                    </div>
                    <div class="form-input mb-3 position-relative">
                        <input type="email" value="{{ old('email') }}" class=" w-100 h-100 rounded-3 shadow-primary-input border-nor @error('email') border-danger @enderror"
                            id="email" name="email" placeholder="Email address" autocomplete="off" />
                        <i class="fa-solid fa-envelope position-absolute top-50 translate-middle fs-5 text-nor @error('email') text-danger @enderror "
                            style="left: 7%;"></i>
                    </div>
                    <div class="form-input mb-3 position-relative">
                        <input type="password" value="{{ old('password') }}" class="w-100 h-100 rounded-3 shadow-primary-input border-nor @error('password') border-danger @enderror "
                            maxlength="16" id="password" name="password" placeholder="Password" autocomplete="off" />
                        <i class="fa-solid fa-lock position-absolute top-50 translate-middle fs-5 text-nor @error('password') text-danger @enderror"
                            style="left: 7%;"></i>
                        <i class="fa-solid fa-eye position-absolute end-0 translate-middle text-nor @error('password') text-danger @enderror"
                            style="top:50%;font-size:1rem !important;cursor:pointer;"></i>
                    </div>
                    <div class="form-input mb-4 position-relative">
                        <input type="password" value="{{ old('password_confirmation') }}" class="w-100 h-100 rounded-3 shadow-primary-input border-nor @error('password_confirmation') border-danger @enderror "
                            maxlength="16" id="cpassword" name="password_confirmation" placeholder="Confirm password"
                            autocomplete="off" />
                        <i class="fa-solid fa-lock position-absolute top-50 translate-middle fs-5 text-nor @error('password_confirmation') text-danger @enderror"
                            style="left: 7%;"></i>
                        <i class="fa-solid fa-eye position-absolute end-0 translate-middle text-nor @error('password_confirmation') text-danger @enderror"
                            style="top:50%;font-size:1rem !important;cursor:pointer;"></i>
                    </div>
                    <input type="hidden" id="country" value="Morocco" name="country">
                    <button class="btn btn-lg btn-primary shadow-primary btn-form" name="submit" type="submit">
                        sign up
                    </button>
                </form>
            </div>
            <p class="text-muted text-end position-absolute start-50"
                style="top:93% !important; transform:translateX(-50%)">&copy; 2022 Self Education </p>
        </div>
        <div class="panels position-absolute top-0">
            <div class="panel h-75 panel-left position-absolute top-0">
                <div class="container h-75 d-flex flex-column my-5 align-items-center justify-content-around">
                    <div class="content d-flex flex-column align-items-center">
                        <h3 class="fw-bold fs-2 text-white">Already have an account ?</h3>
                        <p class="text-white fs-4">Powerful for developers.<br /> Fsast for everyone.</p>
                        <a class="btn btn-outline-light shadow-primary transparent fw-bold" href="{{ route('Login') }}" id="sign-in-btn">Sign
                            in</a>
                    </div>
                    <a class="btn btn-lg btn-primary shadow-primary fs-6 facebook ronded-3" href="{{ route('facebook.Login') }}"
                        style="font-weight: 580;" name="facebook_sign_up">
                        <i class="fa-brands fa-facebook-square fs-5"></i>
                        <span> Sign up <span class="fm">with Facebook</span></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script language="JavaScript" src="http://www.geoplugin.net/javascript.gp" type="text/javascript"></script>
    <script>
        //Load
        // focuser();
        //variables
        //sign_up
        let form_sign_up = document.querySelectorAll(".sign-up form");
        let diver = document.querySelector(".sign-up form .alert.alert-danger");
        let diver_p = document.querySelector(".sign-up form .alert.alert-danger span");
        let inp = document.querySelectorAll(".sign-up form input");
        let icons = document.querySelectorAll(".sign-up form i");

        //icons password hide show
        let icon_pass = [icons[3], icons[5]];
        let input_pass = [inp[3], inp[4]];
        //fine variables

        //hide show password sign up
        icon_pass.forEach((ele, index) => {
            ele.addEventListener('click', function() {
                if (this.classList.contains("fa-eye")) {
                    this.classList.replace("fa-eye", "fa-eye-slash");
                    input_pass[index].type = "text";
                } else {
                    this.classList.replace("fa-eye-slash", "fa-eye");
                    input_pass[index].type = "password";
                }
            });
        });
        //submit valider
        //validate password
        const re_validate_password = /^(?=.*\d)(?=.*[a-z])(?=.*[!@#$%^&*]).{8,16}$/i;
        //validate email
        const re_validate_email = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/i;
        //validate name
        //const re_validate_name = /^([A-Za-zéàë]{5,30} ?)+$/i;
        //sign_up
        document.forms[0].onsubmit = function(event) {
            let email = false;
            let password = false;
            let confirm_password = false;
            let name = false;
            let error = "";
            let contains_err;
            if (inp[1].value!="") {
                name = true;
                inp[1].classList.replace("border-danger", "border-nor");
                icons[0].classList.replace("text-danger", "text-nor");
            } else {
                inp[1].classList.replace("border-nor", "border-danger");
                icons[0].classList.replace("text-nor", "text-danger");
                error = 'Fill in the name (use of special characters is prohibited).';
            }
            if (re_validate_email.test(inp[2].value)) {
                email = true;
                inp[2].classList.replace("border-danger", "border-nor");
                icons[1].classList.replace("text-danger", "text-nor");
            } else {
                contains_err = inp[1].classList.contains('border-danger') ? 1 : 0;
                if (contains_err == 0) {
                    inp[2].classList.replace("border-nor", "border-danger");
                    icons[1].classList.replace("text-nor", "text-danger");
                }
                if (error.length == 0)
                    error = 'example : username@example.com.';
            }
            contains_err = 0;
            if (re_validate_password.test(inp[3].value)) {

                password = true;

                inp[3].classList.replace("border-danger", "border-nor");
                icons[2].classList.replace("text-danger", "text-nor");
                icons[3].classList.replace("text-danger", "text-nor");

            } else {
                contains_err = get_error([inp[1], inp[2], inp[3]]);
                if (contains_err == 0) {
                    inp[3].classList.replace("border-nor", "border-danger");
                    icons[2].classList.replace("text-nor", "text-danger");
                    icons[3].classList.replace("text-nor", "text-danger");

                }
                if (error.length == 0)
                    error = "Please enter a more secure password (more than 8 chars, number and special character).";
            }
            contains_err = 0;
            if (inp[4].value == inp[3].value) {
                confirm_password = true;
                inp[4].classList.replace("border-danger", "border-nor");
                icons[4].classList.replace("text-danger", "text-nor");
                icons[5].classList.replace("text-danger", "text-nor");
            } else {
                contains_err = get_error();
                if (contains_err == 0) {
                    inp[4].classList.replace("border-nor", "border-danger");
                    icons[4].classList.replace("text-nor", "text-danger");
                    icons[5].classList.replace("text-nor", "text-danger");

                }
                if (error.length == 0)
                    error = "Confirm password.";
            }

            if (password == false || confirm_password == false || email == false || name == false) {
                event.preventDefault();
                diver.style.cssText = "display: Block !important;"
                diver_p.textContent = error;
                focuser();
            }
        }

        //fine valider
        //focus input

        function focuser() {
            if (document.body.classList.contains("rotate")) {
                let contains_error = get_error();
                if (contains_error == 0) {
                    inp[0].focus();
                }
            } else {
                inp_sign_in[0].focus();
            }
        }
        //fine focus input
        //search contains class error
        function get_error(arr = [inp[1],inp[2],inp[3],inp[4]]) {
            let i = 0;
            for (ele of arr) {
                if (ele.classList.contains("border-danger")) {
                    ele.focus();
                    i = 1;
                    break;
                }
            }
            return i;
        }
        //fine search error
        //get Country
        $('#cpassword').on('blur',function(){
            $("#country").val(geoplugin_countryName());
        })
    </script>
</body>

</html>
