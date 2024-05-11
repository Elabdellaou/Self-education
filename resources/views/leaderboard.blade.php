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
    <link rel="stylesheet" href="{{ asset('Links/node_modules/bootstrap-icons/font/bootstrap-icons.css') }}">
</head>

<body class=" w-100 global" id="body_leader" style="height: max-content;overflow:hidden !important">
    @include('includes.loading')
    <dev class="page h-100 w-100 d-flex flex-column" style="opacity:0 !important">
        @include('includes.header')
        <Main class="w-100" style="margin-top:68px;">
            <div class="container pt-3 d-flex justify-content-center">
                <div id="content-user" class="content w-75 px-3">
                    <div class="footer_leader pb-3">
                        <div class=" fw-bold fs-4 pt-2" id="title_footer_leader" style="color:#6c757d !important;">
                            Leaderboard
                        </div>
                        <div class="body_footer_leader row row-cols-1 row-cols-sm-3 ">
                            <div class="btn level1 py-4 mb-2 mb-sm-0 py-md-5 fs-3 fw-bold text-dark text-center"
                                data-niveau="1">Level 1</div>
                            <div class="btn level2 py-4 py-md-5 mb-2 mb-sm-0 fs-3 fw-bold text-dark text-center"
                                data-niveau="2">Level 2</div>
                            <div class="btn level3 py-4 py-md-5 fs-3 fw-bold text-dark text-center" data-niveau="3">
                                Level 3</div>
                        </div>
                    </div>
                    <div class="title_leaders fw-bold pt-3 fs-4" id="title_leaders"
                        style="color:#6c757d !important;height:min-content; ">
                        <p class="title_l pb-2"><span id="leader_with">Global</span> <i
                                class="fa-solid fa-angle-right"></i>
                            Top 10</p>
                    </div>
                    <div id="result">
                        @for ($i = 1; $i < count($users) + 1 && $i < 11; $i++)
                            <div class="position-relative  d-flex flex-row py-2" id="leaders"
                                style="overflow:hidden;">
                                <span id="top_ranking" class="ps-3 pe-5 pt-2 fw-bold fs-4">
                                    {{ $i < 10 ? '0' . $i : $i }}
                                </span>
                                <div id="user_image" class="h-100 py-1">
                                    <img src="../Images/users/{{ $users[$i - 1]->image }}" alt="Image user"
                                        style="background-size:cover;width:48px; max-height:48px !important;"
                                        class="h-100 rounded-circle">
                                </div>
                                <div id="name_country" class="h-100 ps-4 pt-3"
                                    style="line-height: 2px;font-size:1.2rem;">
                                    <p id="user_name" class="pb-1">{{ $users[$i - 1]->name }}</p>
                                    <p id="user_country" style="color:#6c757d;font-size:1rem;">
                                        {{ $users[$i - 1]->country }}</p>
                                </div>
                                <div id="toptime_user" class="position-absolute end-0 pe-3 py-3">
                                    <span>{{ $users[$i - 1]->time_passed }}</span>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        </Main>
        @include('includes.footer')
    </dev>
    <script src="{{ asset('Links/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('Links/js/vanila-tilt.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        $(document).ready(function() {

            $('.body_footer_leader div').on('click', function() {
                let i = $(this).hasClass("active") ? 1 : 0;
                $('.body_footer_leader div').each(function() {
                    $(this).removeClass("active");
                });
                if (i == 1) {
                    $("#leader_with").text("Global");
                } else {
                    $(this).addClass("active");
                    $("#leader_with").text($(this).text());
                }
                replacedata($('.body_footer_leader div.active').data('niveau'));
            });

            function replacedata(id = '') {
                /*$.ajax({
                    method: "POST",
                    url: "../Source/php/Tools/leaders.php",
                    data: {
                        level: $("#leader_with").text()
                    },
                    success: function(data) {
                        $("#result").html(data);
                    }
                });*/
                axios.get('/users/' + id + '').then(response => {
                    let i = 1;
                    $("#result").html('');
                    let res = ''
                    for (data of response.data) {
                        res +=
                            '<div class="position-relative  d-flex flex-row py-2" id="leaders" style="overflow:hidden;"><span id="top_ranking" class="ps-3 pe-5 pt-2 fw-bold fs-4">' +
                            (i < 10 ? ('0' + i).toString() : i) +
                            '</span><div id="user_image" class="h-100 py-1"><img src="../Images/users/' +
                            data.image +
                            '" alt="Image user" style="background-size:cover;width:48px; max-height:48px !important;" class="h-100 rounded-circle"></div><div id="name_country" class="h-100 ps-4 pt-3" style="line-height: 2px;font-size:1.2rem;"><p id="user_name" class="pb-1">' +
                            data.name + '</p><p id="user_country" style="color:#6c757d;font-size:1rem;">' +
                            data.country +
                            '</p></div><div id="toptime_user" class="position-absolute end-0 pe-3 py-3"><span>' +
                            (id != '' ? data.session_time_passed : data.time_passed) +
                            '</span></div></div>';
                        i++
                    }
                    $("#result").html(res);
                }).catch(error => {
                    console.log(error)
                })
            }
        });
    </script>

</body>

</html>
