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
    <link rel="stylesheet" href="{{ asset('Links/css/mm.css') }}">
    <link rel="stylesheet" href="{{ asset('Links/css/login1.css') }}">
    <link rel="stylesheet" href="{{ asset('Links/css/contact.css') }}">
    <link rel="stylesheet" href="{{ asset('Links/node_modules/bootstrap-icons/font/bootstrap-icons.css') }}">
</head>

<body class=" w-100 global" style="height:min-content;overflow:hidden !important">
    @include('includes.loading')
    <dev class="page w-100 d-flex flex-column h-100" style="opacity:0 !important">
    @include('includes.header')
    <main class="w-100" style="margin-top:68px ;min-height: 71vh !important;">
        <div class="container ps-5">
            <div class="text-contact pt-5 pb-2 pb-md-4">
                <p class="title-contact text-center fs-2">
                    Contact Us
                </p>
                <p class="introduction-contact text-center fs-4">
                    please get in touch and our expert support team will answer all your questions.
                </p>
            </div>
            <div class="content-contact ">
                <div class="container p-0 row row-cols-1 mt-4 row-cols-lg-2">
                    <div class="information-contact py-5">
                        <div class="information-address row row-cols-2">
                            <div class="icon rounded-circle">
                                <i class="bi bi-geo-alt-fill"></i>
                            </div>
                            <div class="content-information w-75">
                                <h4 class="title-information">
                                    Address :
                                </h4>
                                <p class="text-information ">
                                    Rue kadi ayad nr19 , Asilah-Tanger
                                </p>
                            </div>
                        </div>
                        <div class="information-email pt-5 row row-cols-2">
                            <div class="icon rounded-circle">
                                <i class="bi bi-envelope-fill"></i>
                            </div>
                            <div class="content-information w-75">
                                <h4 class="title-information">
                                    Email :
                                </h4>
                                <p class="text-information">
                                    ibrahimelabdellaoui43@gmail.com
                                </p>
                            </div>
                        </div>
                        <div class="information-phone pt-5 row row-cols-2">
                            <div class="icon rounded-circle">
                                <i class="bi bi-telephone-fill"></i>
                            </div>
                            <div class="content-information w-75">
                                <h4 class="title-information">
                                    Phone :
                                </h4>
                                <p class="text-information">
                                    +212 633 39 41 72
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="form-contact py-4 px-0">
                        <div class="content ps-0 ps-lg-5">
                            <div class="title-form mb-4">Send Message</div>
                            <p class="fs-5 " id="alert" style="font-weight:600;"></p>
                            <div class="form-floating mb-3" id="name">
                                <input type="text" class="form-control" id="floatingInput" placeholder="Full name">
                                <label for="floatingInput">Full name</label>
                            </div>
                            <div class="form-floating mb-3" id="email">
                                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                                <label for="floatingInput">Email address</label>
                            </div>
                            <div class="form-floating mb-4" id="message">
                                <textarea class="form-control" placeholder="Typeyour Message" id="floatingTextarea2" maxlength="100" style="height: 130px;"></textarea>
                                <label for="floatingTextarea2">Type your Message</label>
                            </div>
                            <button type="submit" name="send-message" id="send-message" class="btn btn-primary shadow-primary btn-war" style="font-weight:600 !important;width:50%">
                                Send
                                <i class="bi bi-send-fill" id="send-message"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @include('includes.footer')
    </dev>
    <script src="{{ asset('Links/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('Links/js/vanila-tilt.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("#name input").focus();
            //validate data
            //validate email
            const re_validate_email = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/i;
            //validate name
            const re_validate_name = /^([A-Za-zéàë]{4,30} ?)+$/i;
            //validation text
            const re_validate_message = /^([A-Za-zéàë]{2,100} ?)+$/i;

            $("#send-message").on('click', function() {
                if (re_validate_name.test($("#name input").val()) == false)
                    replace_info($("#name input"), "Please re-erter your name.");
                else if (re_validate_email.test($("#email input").val()) == false)
                    replace_info($("#email input"), "Check the email.");
                else if ($("#message textarea").val() == null||$("#message textarea").val() ==''||$("#message textarea").val().length<5)
                    replace_info($("#message textarea"), "Check the message you want to send.");
                else
                    send_message($("#name input").val(), $("#email input").val(), $("#message textarea").val());
            });
            //function reset input
            function reset_div(ele) {
                setTimeout(() => {
                    $("#alert").text("");
                    $("#alert").removeClass("text-danger");
                    ele.removeClass("border-danger");
                }, 5000);
            }
            //replace
            function replace_info(ele, msg) {
                $("#alert").text(msg);
                $("#alert").addClass("text-danger");
                ele.focus();
                ele.addClass("border-danger");
                reset_div(ele);
            }
            //send mail
            function send_message(name, mail, msg) {
                axios.post("/Contact_me",{
                    _token:$('meta[name="csrf-token"]').attr('content'),
                        name: name,
                        email: mail,
                        message: msg,
                    }).then(response=>{
                        if(response.data==true){
                            $("#alert").text("Your message has been sent successfully");
                            $("#alert").addClass("text-primary");
                            $("#send-message i").addClass("bi-send-check-fill");
                            $("#send-message i").removeClass("bi-send-fill");
                            reset_send();
                        }
                    }).catch(error=>{
                    if (error.response.data.errors.hasOwnProperty("name"))
                        replace_info($("#name input"), "Please re-erter your name.");
                    else if (error.response.data.errors.hasOwnProperty("email"))
                        replace_info($("#email input"), "Check the email.");
                    else
                        replace_info($("#message textarea"), "Check the message you want to send.");
                });
            }
            //reset after
            function reset_send() {
                $("#name input").val('')
                $("#email input").val('')
                $("#message textarea").val('')
                setTimeout(() => {
                    $("#alert").text("");
                    $("#alert").removeClass("text-primary");
                    $("#send-message i").removeClass("bi-send-check-fill");
                    $("#send-message i").addClass("bi-send-fill");
                }, 4000);
            }
            //keyboard
            $("#name input").on("keypress", function(e) {
                if (e.key === "Enter")
                    $("#email input").focus();
            });
            $("#email input").on("keypress", function(e) {
                if (e.key === "Enter")
                    $("#message textarea").focus();
            });
            $("#message textarea").on("keypress", function(e) {
                if (e.key === "Enter")
                    $("#send-message").click();
            });
        });
    </script>
</body>

</html>
