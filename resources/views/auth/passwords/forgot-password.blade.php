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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js"></script>
        <link rel="stylesheet" href="{{ asset('Links/css/login1.css') }}">
        <link rel="stylesheet" href="{{ asset('Links/css/Forgot_password1.css') }}">
        <link rel="stylesheet" href="{{ asset('Links/node_modules/bootstrap-icons/font/bootstrap-icons.css') }}">
    </head>

<body class="w-100 vh-100">
    @include('includes.loading')
    <div class="w-100 h-100 d-flex justify-content-center align-items-center page" id="content" style="opacity:0 !important">
    <div class="content w-75 h-75 bg-white position-relative "  style="overflow: hidden;">
        <div class="sign-in-sign-up position-absolute">
            <div class="header px-5 pt-3 w-100 d-flex flex-row justify-content-between">
                <a class="logo fs-5 shadow-primary-input text-black" style="font-weight: 510" href="">
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
                <div class="w-50 h-100 d-flex flex-column">
                    <h1 class="mb-4 fw-bold text-start text-nor fs-4 mb-5 title position-relative">Password recovery</h1>
                    <div class="alert alert-danger alert-dismissible fade <?=$errors->any()?'show':'hide'?>" role="alert" >
                        <strong>Error!</strong> The email field is not a valid e-mail address.
                    </div>
                    <p class="mb-2 fs-6">Enter your account email address to recover your password.</p>
                    <div class="form-input mb-3 position-relative">
                        <input type="email" class=" w-100 h-100 rounded-3 shadow-primary-input border-nor" id="email_search" name="email_search" placeholder="Email address" autocomplete="off" />
                        <i class="fa-solid fa-envelope position-absolute top-50 translate-middle fs-5 text-nor" style="left: 7%;"></i>
                    </div>
                    <button class="btn mb-2 btn-lg btn-primary shadow-primary btn-form" id="search_btn">
                        Search
                    </button>
                </div>
            </div>
            <div class="sign-up w-100 position-absolute start-50 top-50 translate-middle">
                <div class="w-50 h-100 d-flex flex-column">
                    <h1 class=" fw-bold text-start text-nor fs-2 mb-5 title position-relative">Reset password</h1>
                    <p class="mb-1 fs-6">You will receive an email to complete the password reset.</p>
                    <p class="mb-1 fs-6 text-nor w-100 text-center" id="aftersend" style="display:none">Send Email</p>
                    <div class=" p-2 bg-light rounded-2" id="result">
                    </div>
                    <button class="btn my-2 btn-lg shadow-primary btn-form" id="send">
                        Send
                    </button>
                    <button class="btn btn-lg btn-outline-primary shadow-primary " id="Not_you">
                        Not you?
                    </button>
                </div>
            </div>
            <p class=" text-muted text-end position-absolute start-50" style="top:93% !important; transform:translateX(-50%)">&copy; 2022 Self Education </p>
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

        $(document).ready(function() {

            let icon_email = $(".form-input i");
            let email = $("#email_search");
            let result = $("#result");
            //load
            email.focus();
            //replace class icon
            function replaceClass(firstclass, newclass) {
                icon.removeClass(firstclass);
                icon.addClass(newclass);
            }
            /*
            cancel
            */
            $('#Not_you').on('click',function(){
                $("#content").removeClass("send_mode");
            })
            //search account
            //validate
            const re_validate_email = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/i;
            $("#search_btn").on('click', function() {
                if (email.val().match(re_validate_email)) {
                    axios.get("/Compte/"+email.val()+"").then(response=>{
                            if(response.data.length>0){
                                response=response.data[0]
                                $("#content").addClass("send_mode");
                                result.html('<div class="d-flex flex-row" id="content_result" style="height:40px;overflow:hidden;"><div class="h-100"><img src="Images/users/'+response.image+'" alt="Image user" style="background-size:cover;width:40px;" class="h-100"></div><div class="h-100 ps-2 pt-2" style="line-height: 2px;font-size:1rem;"><input type="hidden" id="id_user" value="'+response.id+'" name="id_user"><p id="email_user">'+response.email+'</p><p style="color:#6c757d;font-size:0.8rem;" id="name_user" >'+response.name+'</p></div></div>');
                            }
                        else
                            Error_search()
                    }).catch(function (error) {
                        Error_search()
                    });
                } else
                    Error_search()

            });
            //error
            function Error_search(){
                email.focus();
                    if($(".alert").hasClass("hide"))
                        replace_class($(".alert"),"hide","show");
                    replace_class(email, "border-nor", "border-danger");
                    replace_class(icon_email, "text-nor", "text-danger");
                    setTimeout(function() {
                        replace_class(email, "border-danger", "border-nor");
                        replace_class(icon_email, "text-danger", "text-nor");
                    }, 1000);
            }
            //send mail
            $("#send").on("click",function(){
                axios.post('/api/forgot-password',{
                        id:$("#id_user").val(),
                        email:$("#email_user").text(),
                        name:$("#name_user").text()
                    }
                ).then(res=>{
                    $('#aftersend').css('display','block');
                }).catch(error=>{
                    console.log(error)
                });
            });
            // complete:function(){
            //             $("#aftersend").css("display","block");
            //             setTimeout(() => {
            //                 $("#aftersend").css("display","none");
            //             }, 2000);
            //         }
            function replace_class(element, class_active, new_class) {
                element.removeClass(class_active);
                element.addClass(new_class);
            }
        })
    </script>
</body>

</html>
