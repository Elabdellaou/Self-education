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

<body class="w-100 global " style="height:max-content;overflow:hidden !important">
    @include('includes.loading')
    <div class="w-100 h-100 d-flex flex-column page" style="opacity:0 !important">
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
                    <div class="debut content text-center fw-bold mb-4">
                        <div class="d-flex shadow-title justify-content-center py-4">
                            <p class="difinition-title fs-1 ">About our <span>C</span> course</p>
                        </div>
                        <p class="difinition_text  fs-3">Our course covers basic concepts, variables, arrays, conditional statements, loops, functions, strings, and much more.</p>
                    </div>
                    <div class="content row row-cols-1 mx-auto mx-lg-0 row-cols-lg-3 p-0 pb-5">
                        <div class='card-niveu d-flex justify-content-center justify-content-lg-start '>
                            <div class="card {{ $session_1['session_progress']>=7?'valid':'active' }} py-3 h-100" style="width: 360px;">
                                <div class="card-img-top">
                                    <img src="../Images/niveu/niveu1.svg" class="card-img-top" alt="">
                                </div>
                                <div class="card-body p-0 px-4 my-2">
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                                <div class="progress-niveu progress-start px-4 my-2 w-100">
                                    <div class="progress-information ">
                                        <div class=" d-flex position-relative flex-row">
                                            <span class="progress-title fs-3">Progress</span>
                                            <span class="progress-result position-absolute end-0 fs-3"><span class="result-pro">{{ $session_1['session_progress'] }}</span>/10</span>
                                        </div>
                                        <div class="progress mt-2">
                                            <div class="progress-bar" role="progressbar" style="width: {{ $session_1['session_progress']==0?'':$session_1['session_progress'] }}0%" aria-valuenow="{{ $session_1['session_progress'] }}" aria-valuemin="0" aria-valuemax="10"></div>
                                        </div>
                                    </div>
                                    <div class="progress-locked text-center fs-4">
                                        Locked
                                    </div>
                                </div>
                                <div class="card-access h-100 w-100  d-flex justify-content-center align-items-center">
                                    <a href="/test/{{ $session_1['id'] }}" class="fa-solid">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class='card-niveu d-flex justify-content-center'>
                            <div class="card @if (isset($session_2))
                                @if ($session_2['session_progress']>=7)
                                    {{ 'valid' }}
                                @else
                                    {{ 'active' }}
                                @endif
                                @else
                                    {{ 'locked' }}
                            @endif  py-3 h-100 " style="width: 360px;">
                                <div class="card-img-top">
                                    <img src="../Images/niveu/niveu2.svg" class="card-img-top" alt="">
                                </div>
                                <div class="card-body p-0 px-4 my-2">
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                                <div class="progress-niveu  px-4 my-2 w-100">
                                    <div class="progress-information">
                                        <div class=" d-flex position-relative flex-row">
                                            <span class="progress-title fs-3">Progress</span>
                                            <span class="progress-result position-absolute end-0 fs-3"><span class="result-pro">@if (isset($session_2))
                                                    {{ $session_2['session_progress'] }}
                                                @else
                                                    {{ 0 }}
                                            @endif</span>/10</span>
                                        </div>
                                        <div class="progress mt-2">
                                            <div class="progress-bar" role="progressbar"
                                            style="width:    @if (isset($session_2))
                                                                @if($session_2['session_progress']==0)
                                                                    {{ '0%' }}
                                                                @else
                                                                    {{ $session_2['session_progress'].'0%' }}
                                                                @endif
                                                            @else
                                                                {{ '0%' }}
                                                            @endif " aria-valuenow="@if (isset($session_2))
                                                    {{ $session_2['session_progress'] }}
                                                @else
                                                    {{ 0 }}
                                            @endif" aria-valuemin="0" aria-valuemax="10"></div>
                                        </div>
                                    </div>
                                    <div class="progress-locked text-center fs-4">
                                        Locked
                                    </div>
                                </div>
                                <div class="card-access h-100 w-100 d-flex justify-content-center align-items-center">
                                    <a href="@if(isset($session_2)){{ '/test/'.$session_2['id'] }} @endif" class="fa-solid">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class='card-niveu d-flex justify-content-center justify-content-lg-end '>
                            <div class="card @if (isset($session_3))
                            @if ($session_3['session_progress']>=7)
                                {{ 'valid' }}
                            @else
                                {{ 'active' }}
                            @endif
                            @else
                                {{ 'locked' }}
                        @endif py-3 h-100 " style="width: 360px;">
                                <div class="card-img-top">
                                    <img src="../Images/niveu/niveu3.svg" class="card-img-top" alt="">
                                </div>
                                <div class="card-body p-0 px-4 my-2">
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                                <div class="progress-niveu  px-4 my-2 w-100">
                                    <div class="progress-information">
                                        <div class=" d-flex position-relative flex-row">
                                            <span class="progress-title fs-3">Progress</span>
                                            <span class="progress-result position-absolute end-0 fs-3"><span class="result-pro">@if (isset($session_3))
                                                {{ $session_3['session_progress'] }}
                                            @else
                                                {{ 0 }}
                                        @endif</span>/10</span>
                                        </div>
                                        <div class="progress mt-2">
                                            <div class="progress-bar" role="progressbar" style="width: @if (isset($session_3))
                                            @if($session_3['session_progress']==0)
                                                {{ '0%' }}
                                            @else
                                                {{ $session_3['session_progress'].'0%' }}
                                            @endif
                                        @else
                                            {{ '0%' }}
                                        @endif " aria-valuenow="@if (isset($session_3))
                                                    {{ $session_3['session_progress'] }}
                                                @else
                                                    {{ 0 }}
                                            @endif" aria-valuemin="0" aria-valuemax="10"></div>
                                        </div>
                                    </div>
                                    <div class="progress-locked text-center fs-4">
                                        Locked
                                    </div>
                                </div>
                                <div class="card-access h-100 w-100  d-flex justify-content-center align-items-center">
                                    <a href="@if(isset($session_3)){{ '/test/'.$session_3['id'] }} @endif" class="fa-solid">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="certificate w-100 mt-4">
                            <div class="content">
                                <div class="certificate_info">
                                    <div class="d-flex shadow-title certificate_title_desktop justify-content-center py-4 mb-2">
                                        <p class="difinition-title fs-1 ">Certification</p>
                                    </div>
                                    <p class="certificate_info-text text-center fs-3">In order to get you certificate you should first finish all the levels.
                                        <br>
                                        Certificates play a great role on proving your skills and education level.
                                    </p>
                                </div>
                            </div>
                            <div class="certificate-content d-flex justify-content-start justify-content-md-end">
                                <div class="get-certificate h-100 pt-5 pe-5 me-lg-l5">
                                    <div>
                                        <p class="get-certificate-title">
                                            Here’s how close you are to getting the certificate:
                                        </p>
                                        <p class="result-certificate">
                                            <span class="progress-result">{{ $certificate['language_progress'] }}</span>%
                                        </p>
                                        <div class=" progress progress-certificate w-75">
                                            <div class="progress-bar" role="progressbar" style="width: {{ $certificate['language_progress'] }}%" aria-valuenow="{{ $certificate['language_progress'] }}" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <p class="progress-info pt-1">
                                            Course progress
                                        </p>
                                    </div>
                                    <!--disabled-->
                                    <button  class="btn btn-war border-0 {{ $certificate['language_progress']==100?'':'disabled' }} btn-primary shadow-primary btn-get-certificate"  @if ($certificate['language_progress']==100) data-bs-toggle="modal" data-bs-target="#staticBackdrop" @endif style="font-weight: 600;">Acquire your certificate</button>

                                    <!-- Modal -->
                                    @if ($certificate['language_progress']==100)
                                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog  modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-body-certificate px-4">
                                                    <div class="Modal certificate-footer d-flex justify-content-between my-3">
                                                        <h5 class="modal-title text-black fw-bold fs-4" id="staticBackdropLabel">Certificate</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="img">
                                                        <img src="/Images/certificate/{{ $certificate['certificate_id'] }}.jpg" width="100%" alt="">
                                                    </div>
                                                    <div class="copy-link my-4 d-flex justify-content-between">
                                                        <div class="form-input position-relative" style="width:80%;">
                                                            <input id="link-certificate" type="text" class="h-100 w-100 rounded-3  shadow-primary-input border-nor text-dark fs-6" readonly value="http://127.0.0.1:8000/Images/certificate/{{ $certificate['certificate_id'] }}.jpg" />
                                                            <i class="bi bi-link-45deg fs-5 position-absolute top-50 translate-middle fs-5 text-nor" style="left: 7%;"></i>
                                                        </div>
                                                        <div>
                                                            <button id="btn-copy" class="btn h-100 fw-bold text-nor  border-nor shadow-primary-input">
                                                                Copy
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="download_certificate d-flex justify-content-between my-3">
                                                        <a href="/certificate/jpg/{{ $certificate['certificate_id'] }}" class="btn btn-war border-0 shadow-primary btn-primary" style="font-weight: 600;">Download JPG</a>
                                                        <a href="/certificate/pdf/{{ $certificate['certificate_id'] }}" class="btn btn-war border-0 shadow-primary btn-primary" style="font-weight: 600;">Download PDF</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </section>
        </main>
    @include('includes.footer')
    </div>
    <script src="{{ asset('Links/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('Links/js/particles.js') }}"></script>
    <script src="{{ asset('Links/js/particles_app.js') }}"></script>
    <script src="{{ asset('Links/js/vanila-tilt.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
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
            typeSpeed: 150,
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

        //scroll start course
        let mouse = document.querySelector('.bi-mouse');
        mouse.addEventListener('click', () => {
            window.scrollTo({
                top: document.querySelector('.definition').offsetTop - 80,
                behavior: 'smooth'
            });
        });
        //copy link of certificate
        $("#btn-copy").on("click", function() {
            $(this).addClass("active");
            $("#link-certificate").select();
            document.execCommand("copy");
            window.getSelection().removeAllRanges();
            setTimeout(() => {
                $(this).removeClass("active");
            }, 1500);
        });
    </script>
</body>

</html>
