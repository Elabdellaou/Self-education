<?php
$key = 'ibrahim';
$iv = '1234521478569874';
function valid($var)
{
    for ($i = 0; $i < strlen($var); $i++) {
        if ($var[$i] == ' ')
            $var[$i] = '+';
    }
    return $var;
}

$id = isset($_GET['id']) ? $_GET['id'] : '';
$access = isset($_GET['access']) ? $_GET['access'] : '';
$id = valid($id);
$access = valid($access);
$id_decrypt = openssl_decrypt($id, 'AES-256-CBC', $key, 0, $iv);
$access_decrypt = openssl_decrypt($access, 'AES-256-CBC', $key, 0, $iv);
if (!isset($_GET['access']) || !isset($_GET['id'])) {
    header('Location:/login');
} else {
    if ($access_decrypt != 'selfeducation2022' || filter_var($id_decrypt, FILTER_VALIDATE_INT) == false)
        header('Location:/login');
}
?>
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
        <link rel="stylesheet" href="{{ asset('Links/css/Forgot_password1.css') }}">
        <link rel="stylesheet" href="{{ asset('Links/node_modules/bootstrap-icons/font/bootstrap-icons.css') }}">
    </head>

<body class="w-100 vh-100">
    @include('includes.loading')
    <div class="w-100 h-100 d-flex justify-content-center align-items-center page" style="opacity:0 !important">
    <div class="content w-75 h-75 bg-white position-relative" style="overflow: hidden;">
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
            <div class="sign-in w-100 position-absolute start-50 top-50 translate-middle">
                <form action="{{ route('password.edit') }}" method="post" class="w-50 h-100 d-flex flex-column">
                    @csrf
                    <h1 class="mb-4 fw-bold text-start text-nor fs-4 mb-5 title position-relative">Reset Password</h1>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert" style="display:<?=$errors->any()?'block':'none' ?> !important">
                        <strong>Error!</strong>
                        @if ($errors->has('password'))
                            <span>Please enter a more secure password (more than 8 chars, number and special character).</span>
                        @else
                            <span>Confirm password.</span>
                        @endif
                    </div>
                    <p class="mb-2 fs-6">Choose a new password for your account.</p>
                    <div class="form-input mb-3 position-relative">
                        <input type="password" class=" w-100 h-100 rounded-3 shadow-primary-input  border-nor  @error('password') border-danger @enderror" id="password" name="password" placeholder="Password" required autocomplete="off" />
                        <i class="fa-solid fa-lock position-absolute top-50 translate-middle fs-5 text-nor  @error('password') text-danger @enderror" style="left: 7%;"></i>
                        <i class="fa-solid fa-eye position-absolute end-0 translate-middle text-nor @error('password') text-danger @enderror" style="top:50%;font-size:1rem !important;cursor:pointer;"></i>
                    </div>
                    <div class="form-input mb-3 position-relative">
                        <input type="password" class=" w-100 h-100 rounded-3 shadow-primary-input  border-nor  @error('password_confirmation') border-danger @enderror" id="cpassword" name="password_confirmation" placeholder="Confirm password" required autocomplete="off" />
                        <i class="fa-solid fa-lock position-absolute top-50 translate-middle fs-5 text-nor @error('password_confirmation') text-danger @enderror" style="left: 7%;"></i>
                        <i class="fa-solid fa-eye position-absolute end-0 translate-middle text-nor @error('password_confirmation') text-danger @enderror" style="top:50%;font-size:1rem !important;cursor:pointer;"></i>
                    </div>
                    <input type="hidden" value="<?=$id_decrypt ?>" name="id" id="id" >
                    <button class="btn mb-2 btn-lg btn-primary shadow-primary btn-form" id="reset" type="submit" name="submit">
                        Reset
                    </button>
                </form>
            </div>
            <p class=" text-muted text-end position-absolute start-50" style="top:93%; transform:translateX(-50%)">&copy; 2022 Self Education </p>
        </div>
        <div class="panels position-absolute top-0">
            <div class="panel h-75 panel-right position-absolute top-0">
                <div class="container h-75 d-flex flex-column my-5 align-items-center justify-content-around">
                    <div class="content d-flex flex-column align-items-center">
                        <h3 class="fw-bold fs-2 text-white">Enter password to log in ?</h3>
                        <p class="text-white fs-4">Powerful for developers.<br /> Fast for everyone.</p>
                        <a class="btn btn-outline-light shadow-primary transparent fw-bold" id="sign-up-btn" href="{{ route('Login') }}">Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        //variables
        let diver = document.querySelector("form .alert.alert-danger");
        let diver_p = document.querySelector("form .alert.alert-danger span");
        let inp = document.querySelectorAll("form input");
        let icons = document.querySelectorAll("form i");
        //hide show password variables
        icon_pass = [icons[1], icons[3]];
        //fine variables
        //body load
        function focus() {
            document.body.classList.contains("dark-mode") ? icon.classList.replace("bi-brightness-high-fill", "bi-moon-stars-fill") : icon.classList.replace("bi-moon-stars-fill", "bi-brightness-high-fill");
            focuser();
        }
        //validet data input
        //validate password
        const re_validate_password = /^(?=.*\d)(?=.*[a-z])(?=.*[!@#$%^&*]).{8,16}$/i;
        document.forms[0].onsubmit = function(event) {
            let password = false;
            let confirm_password = false;
            let error = "";
            let contains_err;

            if (re_validate_password.test(inp[1].value)) {

                password = true;

                inp[1].classList.replace("border-danger", "border-nor");
                icons[0].classList.replace("text-danger", "text-nor");
                icons[1].classList.replace("text-danger", "text-nor");

            } else {
                contains_err = get_error();
                if (contains_err == 0) {
                    inp[1].classList.replace("border-nor", "border-danger");
                    icons[0].classList.replace("text-nor", "text-danger");
                    icons[1].classList.replace("text-nor", "text-danger");

                    error = "Please enter a more secure password (more than 8 chars, number and special character).";
                }
            }
            contains_err = 0;
            if (inp[1].value == inp[2].value) {
                confirm_password = true;
                inp[2].classList.replace("border-danger", "border-nor");
                icons[2].classList.replace("text-danger", "text-nor");
                icons[3].classList.replace("text-danger", "text-nor");
            } else {
                contains_err = get_error();
                if (contains_err == 0) {
                    inp[2].classList.replace("border-nor", "border-danger");
                    icons[2].classList.replace("text-nor", "text-danger");
                    icons[3].classList.replace("text-nor", "text-danger");

                }
                if (error.length == 0)
                    error = "Confirm password.";
            }

            if (password == false || confirm_password == false) {
                event.preventDefault();
                diver.style.cssText = "display: Block !important;"
                diver_p.textContent = error;
            }
            focuser();
        }
        //focus input
        function focuser() {
            let contains_error = get_error();
            if (contains_error == 0) {
                inp[1].focus();
            }
        }
        //search error
        function get_error() {
            let i = 0;
            inp.forEach(ele => {
                if (ele.classList.contains("border-danger")) {
                    ele.focus();
                    i = 1;
                }
            });
            return i;
        }
        //hide show function
        //hide show password sign up
        icon_pass.forEach((ele, index) => {
            ele.addEventListener('click', function() {
                if (this.classList.contains("fa-eye")) {
                    this.classList.remove("fa-eye");
                    this.classList.add("fa-eye-slash");
                    inp[index+1].type = "text";
                } else {
                    this.classList.remove("fa-eye-slash");
                    this.classList.add("fa-eye");
                    inp[index+1].type = "password";
                }
            });
        });
    </script>
</body>

</html>
