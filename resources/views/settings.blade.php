<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Self Education-{{ Request::route()->getName() }}</title>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js"></script>
        <link rel="stylesheet" href="{{ asset('Links/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('Links/css/all.min.css') }}">
        <script src="{{ asset('Links/jQuery/node_modules/jquery/dist/jquery.min.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.12/typed.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/gsap.min.js"></script>
        <script src="../Links/js/splitting.js"></script>
        <link rel="stylesheet" href="{{ asset('Links/css/typed.css') }}">
        <link rel="stylesheet" href="{{ asset('Links/css/mm.css')}}">
        <link rel="stylesheet" href="{{asset('Links/css/login1.css') }}">
        <link rel="stylesheet" href="{{ asset('Links/css/Splitting.css') }}">
        <link rel="stylesheet" href="{{ asset('Links/css/settings1.css') }}">
        <link rel="stylesheet" href="{{ asset('Links/node_modules/bootstrap-icons/font/bootstrap-icons.css') }}">
    </head>

<body class=" w-100 global" style="height:max-content;overflow:hidden !important">
    @include('includes.loading')
    <dev class="page h-100 w-100 d-flex flex-column" style="opacity:0 !important">
    @include('includes.header')
    <main class="w-100" style="margin-top:68px ;">
        <section class="w-100" id="introduction" style="height: 580px;">
            <div class="container text-white d-flex py-5 flex-lg-row  h-100" style="z-index:1027">
                <div class="information_user d-flex justify-content-center justify-content-lg-start" style="width:350px ;">
                    <div class="content h-100 row row-cols-1 mx-0 d-flex justify-content-center py-4" style="width: 350px;border-radius:0.7rem !important;overflow:hidden;">
                        <img src="Images/users/{{ Auth::user()->image }}" class="img-user p-0" id="active-image"></img>
                        <div class="information pt-4">
                            <h3 class="text-center name-user h4 fw-bold">{{ Auth::user()->name }}</h3>
                            <div class="country">
                                <span class="country-name">{{ Auth::user()->country }}</span>
                            </div>
                            <div class="level">
                                Level <span class="level-value">{{ Auth::user()->level }}</span>
                            </div>
                            <div class="xp">
                                <p><i class="fa-solid fa-star pe-2"></i><span class='xp-value'>{{ Auth::user()->xp }}</span>XP</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="scrollnext d-flex justify-content-center h-100" style="width:350px ;">
                    <div class="btn content fw-bold lh-1 text-white align-self-end" style="border: none;">
                        <span style="font-size: 4rem;">
                            <i class="bi bi-mouse"></i>
                        </span>
                        <i class="bi bi-chevron-down fs-1"></i>
                        <i class="bi bi-chevron-down fs-2"></i>
                        <i class="bi bi-chevron-down fs-3"></i>
                    </div>
                </div>
                <div class="incentivize  d-flex justify-content-lg-end" style="width:350px ;">
                    <div class="content py-3 d-flex flex-column" style="width: 350px;">
                        <img src="../Images/img-typed1.png" alt="" class="img-typed mx-auto rounded-3 ">
                        <div class="div-typed mt-4 rounded-2 px-5">
                            <span class="type1 text-white fw-bold w-50 mt-4 fs-5">
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="definition w-100 mt-4 d-flex flex-column justify-content-center">
            <div class="container rounded-3">
                    <div class="update_info row row-cols-1 row-cols-lg-2 my-4">
                        <div class="upd_img d-flex justify-content-center justify-content-lg-start ">
                            <div class="content_img" style="width: 340px;">
                                <img src="Images/users/{{ Auth::user()->image }}" class="mb-2 rounded-3" width="100%" height="340px" id="img_user_upd" alt="" srcset="" style="">
                                <p class="fw-bold text-center text-danger py-1" id="alter-img" style="display:{{$errors->has('image')?'block':'none' }}">Please choose another picture.</p>
                                <div class="input-group">
                                    <form action="/api/setImage/{{ Auth::user()->id }}" method='post' id="form-image" class="w-100" enctype="multipart/form-data">
                                        <input type="file" id="image" class="image-up" name="image" accept="image/*">
                                        <label for="image" class="btn btn-war border-0 btn-primary fw-bold w-100 d-flex rounded-3 justify-content-center align-items-center" id="im" style="cursor: pointer;">
                                            <i class="fa-solid fa-file-image "></i>&nbsp;
                                            Choose a Photo
                                        </label>
                                        <div class="up-img_btn  w-100 mt-1">
                                            <div class="content   d-flex justify-content-between ">
                                                <button class="btn border-0 btn-war btn-primary w-100 rounded-3 me-2 fw-bold" id="save_up_img" type="submit" name="upd_img">
                                                    Save
                                                </button>
                                                <button class="btn border-0 btn-war btn-primary w-100 rounded-3 fw-bold" type="reset" id="annuler_up_img">
                                                    Cancel
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <p class="text-muted text-center mt-2">
                                    JPG OR PNG, Max size 2MB
                                </p>
                            </div>
                        </div>
                        <div class="upd_inf">
                            <h4 class="title-upd-inf text-center text-lg-start mb-4">
                                <span class="fs-5 fw-bold pb-2 shadow-primary-input">
                                    Information
                                </span>
                            </h4>
                            <div class="alert alert-dismissible fade <?=$errors->any()?'show':'hide' ?>" id="alert" role="alert">

                            </div>
                            <input type="hidden" name="id_user" id="id_user" value="{{ Auth::user()->id }}">
                            <div class="form-input mb-3 position-relative">
                                <input type="text" class="w-100 rounded-3 shadow-primary-input border-nor" value="{{ Auth::user()->name }}" name="name" id="fullname" placeholder="Full name" autocomplete="off" style="padding-left: 10% !important;" />
                                <i class="fa-solid fa-user position-absolute top-50 translate-middle fs-5 text-nor" style="left: 5%;"></i>
                            </div>
                            <div class="form-input mb-3 position-relative">
                                <input type="email" class=" w-100 rounded-3 shadow-primary-input border-nor" id="email" value="{{ Auth::user()->email }}" name="email" placeholder="Email address" autocomplete="off" style="padding-left: 10% !important;" />
                                <i class="fa-solid fa-envelope position-absolute top-50 translate-middle fs-5 text-nor" style="left: 5%;"></i>
                            </div>
                            <div class="form-input search-box mb-3 position-relative">
                                <input type="search" class="w-100 rounded-3 shadow-primary-input border-nor " id="country" name="country" value='{{ Auth::user()->country }}' placeholder="Country" autocomplete="off" style="padding-left: 10% !important;" />
                                <i class="fa-solid fa-earth-africa position-absolute top-50 translate-middle fs-5 text-nor" style="left: 5%;"></i>
                                <div id="result_country" class="position-absolute w-100 bg-light text-black start-0 p-2 rounded-3" style="bottom:110%;max-height: 185px;overflow-y:scroll;"></div>
                            </div>
                            <div class="form-input mb-4 position-relative">
                                <input type="password" class="w-100 rounded-3 shadow-primary-input border-nor " maxlength="16" value="" name="password" id="password" placeholder="password" autocomplete="off" style="padding-left: 10% !important;" />
                                <i class="fa-solid fa-lock position-absolute top-50 translate-middle fs-5 text-nor" style="left: 5%;"></i>
                                <i class="fa-solid fa-eye position-absolute end-0 translate-middle text-nor" id="ic_ps" style="top:50%;font-size:1rem !important;cursor:pointer;"></i>
                            </div>
                            <button class="btn border-0  btn-primary btn-war fs-5" style="font-weight: 600;" id="update_info">
                                Save
                            </button>
                        </div>
                    </div>
            </div>
        </section>
    </main>
    @include('includes.footer')
    </dev>
    <script src="{{ asset('Links/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('Links/js/particles.js') }}"></script>
    <script src="{{ asset('Links/js/particles_app.js') }}"></script>
    <script src="{{ asset('Links/js/vanila-tilt.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        //icons
        let icons=$('.upd_inf .form-input i');
        //vanila tilt
        setTimeout(() => {
            VanillaTilt.init(document.querySelector(".information_user .content"), {
                reverse: true,
                max: 15,
                transition: true,
                reset: true,
                scale: 0.9,
                glare: true,
                "max-glare": 0.9,
                speed: 400
            });
        }, 2000);
        //typed objet
        var typed = new Typed('.type1', {
            strings: [
                '',
                '"Nothing is more necessary to achieve success of any kind than perseverance, because it transcends everything even nature."',
                '"It is not one giant step that has achieved an achievement, but a group of small steps."',
                '"The road to success is crowded, but the road to excellence is empty, so be the first to pass it."',
                '"Whoever sowed found, and whoever sowed reaped... so plant for your coming days, earnestness and diligence."',
                '"The one who never makes mistakes hasn\'t tried anything new."',
                '"To move the world, we must first move ourselves."',
                '"Work is the key to success, and hard work can help you accomplish anything."',
                '"All roads that lead to success have to pass through hard work boulevard at some point."',
                '"Most times , the way isn\'t clear, but you want to start anyway. It is in starting... that other steps become clearer."'
            ],
            backDelay: 10000,
            startDelay: 2000,
            typeSpeed: 100,
            backSpeed: 30,
            //cursorChar: '_',
            //shuffle: false,//random
            fadeOut: false,
            smartBackspace: true, // this is a default
            loop: true
        });
        /*
            typed.start();
            typed.toggle();
            typed.stop();
            typed.reset();
            typed.destroy();
        */
        /*setTimeout(() => {
            document.querySelector('.type').innerHTML = "Hello world! <br >My Name is: Ibrahim Elabdellaoui <br >I `m web developer";
            Splitting();
        }, 1500);
        <span class="type text-white fw-bold fs-5 lh-lg" data-splitting>
        </span>*/
        //gsap animate
        setTimeout(() => {
            gsap.from("#introduction .container", {
            opacity: 0,
            y: -400,
            duration: 2,
            delay: 0.5
        });
        }, 1900);
        let links = document.querySelectorAll('#nav-link');

        //active link
        /*
        for (let link of links) {
            link.addEventListener('click', active_link);
        }

        function active_link() {
            for (let link of links) {
                if (link.classList.contains('active'))
                    link.classList.remove('active');
            }
            this.classList.add('active');
        }
        */
        //scroll start course
        let mouse = document.querySelector('.bi-mouse');
        mouse.addEventListener('click', () => {
            window.scrollTo({
                top: document.querySelector('.definition').offsetTop - 80,
                behavior: 'smooth'
            });
        });
            //hide show password
            $("#ic_ps").on("click", function() {
                if ($(this).hasClass("fa-eye")) {
                    replace_class($(this), "fa-eye", "fa-eye-slash");
                    $("#password").get(0).type = "text";
                } else {
                    replace_class($(this), "fa-eye-slash", "fa-eye");
                    $("#password").get(0).type = "password";
                }
            });

            function replace_class(ele, active_class, new_class) {
                ele.removeClass(active_class);
                ele.addClass(new_class);
            }
            //country

            $('#country').on("keyup input",
                function() {
                    /* Get input value on change */
                    var inputVal = $(this).val();
                    var resultDropdown = $(this).siblings("#result_country");
                    $("#result_country").css("display", "block");
                    if (inputVal.length) {
                        axios.get("/country/"+inputVal).then(res=> {
                            resultDropdown.empty();
                            let data=res.data;
                            $.each(data,function( index, element ) {
                                resultDropdown.prepend('<p>'+element.country+'</p>');
                            })
                        });
                    } else {
                        resultDropdown.empty();
                    }
                });
            // Set search input value on click of result item
            $(document).on("click", "#result_country p", function() {
                $(this).parents(".search-box").find('input[type="search"]').val($(this).text()); //find b7al foreach ta9riban
                $(this).parent("#result_country").empty(); //parents search
                //parent search element
                $("#result_country").css("display", "none");
            });
            $("#country").on("blur", function() {
                setTimeout(() => {
                    $("#result_country").css("display", "none");
                }, 500);
            })
            //submit valider
            //validate password
            const re_validate_password = /^(?=.*\d)(?=.*[a-z])(?=.*[!@#$%^&*]).{8,16}$/i;
            //validate email
            const re_validate_email = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/i;
            //validate name
            // const re_validate_name = /^([A-Za-zéàë]{5,30} ?)+$/i;
            //save upd
            $("#update_info").on("click", function() {
                let err_up = "";
                let bg = "alert-danger";
                let element = "";
                if ($("#fullname").val() == '') {
                    err_up = "Fill in the name (use of special characters is prohibited)."
                    element = $("#fullname");
                } else if (re_validate_email.test($("#email").val()) == false) {
                    if (err_up == "") {
                        err_up = "Check the email, example : username@example.com."
                        element = $("#email");
                    }
                } else if ($("#country").val()== '') {
                    if (err_up == "") {
                        err_up = "Fill in the country (use of special characters is prohibited)."
                        element = $("#country");
                    }
                } else if ($("#password").val().length>0&&re_validate_password.test($("#password").val()) == false) {
                        if (err_up == "") {
                            err_up = "Please enter a more secure password (more than 8 chars, number and special character)."
                            element = $("#password");
                        }
                } else {
                    if($("#password").val().length>0)
                        axios.post('/api/update',{
                            'id':$('#id_user').val(),
                            'name':$("#fullname").val(),
                            'email':$("#email").val(),
                            'country':$("#country").val(),
                            'password':$("#password").val(),
                        }).then(reponse=>{
                            if(reponse.data==1)
                            result_up('', 'Successfully updated',"alert-success");
                            after_update(reponse.data)
                        }).catch(error=>{
                            if (error.response.data.errors.hasOwnProperty("name"))
                                result_up($("#fullname"), "Fill in the name (use of special characters is prohibited).",'alert-danger');
                            else if (error.response.data.errors.hasOwnProperty("email"))
                                result_up($("#email"), "Check the email, example : username@example.com.",'alert-danger');
                            else if (error.response.data.errors.hasOwnProperty("country"))
                                result_up($("#country"), "Fill in the country (use of special characters is prohibited).",'alert-danger');
                            else
                                result_up($("#password"), "Please enter a more secure password (more than 8 chars, number and special character).",'alert-danger');
                        })
                    else
                        axios.post('/api/setInfo',{
                            'id':$('#id_user').val(),
                            'name':$("#fullname").val(),
                            'email':$("#email").val(),
                            'country':$("#country").val(),
                        }).then(reponse=>{
                            if(reponse.data==1)
                                result_up('', 'Successfully updated',"alert-success");

                            after_update(reponse.data)
                        }).catch(error=>{
                            if (error.response.data.errors.hasOwnProperty("name"))
                                result_up($("#fullname"), "Fill in the name (use of special characters is prohibited).",'alert-danger');
                            else if (error.response.data.errors.hasOwnProperty("email"))
                                result_up($("#email"), "Check the email, example : username@example.com.",'alert-danger');
                            else
                                result_up($("#country"), "Fill in the country (use of special characters is prohibited).",'alert-danger');
                        })
                }
                if(element!='')
                    result_up(element, err_up,bg);
            });
            //after update data
            function after_update(data){
                if(data==1){
                    $('#introduction .information_user .name-user').text($("#fullname").val())
                    $('.dropdown-menu #user_name').text($("#fullname").val())
                    $('#introduction .information_user .country-name').text($("#country").val())
                    }
            }
            //update ??
            function result_up(ele, text,bg) {
                if (ele != "") {
                    replace_class(ele, "border-nor", "border-danger");
                    ele.focus();
                    if(ele.is($('#fullname')))
                        icons[0].classList.add('text-danger')
                    else if(ele.is($('#email')))
                        icons[1].classList.add('text-danger')
                    else if(ele.is($('#country')))
                        icons[2].classList.add('text-danger')
                    else{
                        icons[3].classList.add('text-danger')
                        icons[4].classList.add('text-danger')
                    }
                }
                $("#alert").text(text);
                if($("#alert").hasClass('alert-danger'))
                    $("#alert").removeClass('alert-danger')
                if($("#alert").hasClass('alert-success'))
                    $("#alert").removeClass('alert-success')
                $("#alert").addClass(bg);
                $("#alert").addClass('show');
                $("#alert").removeClass('hide');
                setTimeout(() => {
                    if (ele != ""){
                        replace_class(ele, "border-danger", "border-nor");

                    if(ele.is($('#fullname')))
                        icons[0].classList.remove('text-danger')
                    else if(ele.is($('#email')))
                        icons[1].classList.remove('text-danger')
                    else if(ele.is($('#country')))
                        icons[2].classList.remove('text-danger')
                    else{
                        icons[3].classList.remove('text-danger')
                        icons[4].classList.remove('text-danger')
                    }
                    }
                    $("#alert").text('');
                    $("#alert").removeClass(bg);
                    $("#alert").removeClass('show');
                    $("#alert").addClass('hide');
                }, 5000);
            }
            //update image
            let input_img = document.querySelector(".image-up");
            let image_user_src = document.querySelector("#active-image");
            let image_user = document.querySelector("#img_user_upd");
            let upd_img = document.querySelector(".up-img_btn");
            let alt_img=document.querySelector("#alter-img");
            //validate type image
            var allowedExtension = ['image/jpeg', 'image/jpg', 'image/png','image/JPEG', 'image/JPG', 'image/PNG'];
            input_img.addEventListener("change", function() {
                let type = input_img.files[0].type;
                if(allowedExtension.indexOf(type)>-1&&input_img.files[0].size/(1024*1024)<=2){
                    alt_img.style.cssText="display:none";
                    image_user.src = URL.createObjectURL(input_img.files[0]);
                    upd_img.style.cssText = "display:block !important";
                }else
                    alt_img.style.cssText="display:block";

            });
            document.querySelector("#annuler_up_img").onclick = () => {
                image_user.src = image_user_src.src;
                upd_img.style.cssText = "display:none !important";
            }

            $('#form-image').on('submit',function(e){
                if($('#image').val()==null&&$('#image').val()=='')
                    e.preventDefault();

            })
    </script>
</body>

</html>
