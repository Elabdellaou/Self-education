<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
                {{-- Bootstrap --}}
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" >
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
                <link rel="stylesheet" href="{{ asset('Links/css/login1.css') }}">
        <!-- Styles -->
        <style>
               svg#freepik_stories-500-internal-server-error:not(.animated) .animable {opacity: 0;}
            svg#freepik_stories-500-internal-server-error.animated #freepik--background-complete--inject-53
            {animation: 1s 1 forwards cubic-bezier(.36,-0.01,.5,1.38) slideLeft;animation-delay: 0s;}
            svg#freepik_stories-500-internal-server-error.animated #freepik--Shadow--inject-53
            {animation: 1s 1 forwards cubic-bezier(.36,-0.01,.5,1.38) slideDown;animation-delay: 0s;}
            svg#freepik_stories-500-internal-server-error.animated #freepik--Server--inject-53
            {animation: 1s 1 forwards cubic-bezier(.36,-0.01,.5,1.38) zoomOut;animation-delay: 0s;}
            svg#freepik_stories-500-internal-server-error.animated #freepik--Texts--inject-53
            {animation: 1s 1 forwards cubic-bezier(.36,-0.01,.5,1.38) slideLeft;animation-delay: 0s;}
            svg#freepik_stories-500-internal-server-error.animated #freepik--wall-plug--inject-53
             {animation: 1s 1 forwards cubic-bezier(.36,-0.01,.5,1.38) slideUp;animation-delay: 0s;}
             svg#freepik_stories-500-internal-server-error.animated #freepik--Floor--inject-53
             {animation: 1s 1 forwards cubic-bezier(.36,-0.01,.5,1.38) zoomIn;animation-delay: 0s;}
             svg#freepik_stories-500-internal-server-error.animated #freepik--Dog--inject-53
             {animation: 1s 1 forwards cubic-bezier(.36,-0.01,.5,1.38) zoomIn;animation-delay: 0s;}
             svg#freepik_stories-500-internal-server-error.animated #freepik--Lines--inject-53 {animation: 1s 1 forwards cubic-bezier(.36,-0.01,.5,1.38) lightSpeedLeft;animation-delay: 0s;}svg#freepik_stories-500-internal-server-error.animated #freepik--Device--inject-53 {animation: 1s 1 forwards cubic-bezier(.36,-0.01,.5,1.38) lightSpeedLeft;animation-delay: 0s;}            @keyframes slideLeft {                0% {                    opacity: 0;                    transform: translateX(-30px);                }                100% {                    opacity: 1;                    transform: translateX(0);                }            }                    @keyframes slideDown {                0% {                    opacity: 0;                    transform: translateY(-30px);                }                100% {                    opacity: 1;                    transform: translateY(0);                }            }                    @keyframes zoomOut {                0% {                    opacity: 0;                    transform: scale(1.5);                }                100% {                    opacity: 1;                    transform: scale(1);                }            }                    @keyframes slideUp {                0% {                    opacity: 0;                    transform: translateY(30px);                }                100% {                    opacity: 1;                    transform: inherit;                }            }                    @keyframes zoomIn {                0% {                    opacity: 0;                    transform: scale(0.5);                }                100% {                    opacity: 1;                    transform: scale(1);                }            }                    @keyframes lightSpeedLeft {              from {                transform: translate3d(-50%, 0, 0) skewX(20deg);                opacity: 0;              }              60% {                transform: skewX(-10deg);                opacity: 1;              }              80% {                transform: skewX(2deg);              }              to {                opacity: 1;                transform: translate3d(0, 0, 0);              }            }
            .animator-hidden { display: none; }
            html {
                line-height: 1.15;
                    -ms-text-size-adjust: 100%;
                -webkit-text-size-adjust: 100%;
            }

            body {
                margin: 0;
            }

            header,
            nav,
            section {
                display: block;
            }

            figcaption,
            main {
                display: block;
            }

            a {
                background-color: transparent;
                -webkit-text-decoration-skip: objects;
            }

            strong {
                font-weight: inherit;
            }

            strong {
                font-weight: bolder;
            }

            code {
                font-family: monospace, monospace;
                font-size: 1em;
            }

            dfn {
                font-style: italic;
            }

            svg:not(:root) {
                overflow: hidden;
            }

            button,
            input {
                font-family: sans-serif;
                font-size: 100%;
                line-height: 1.15;
                margin: 0;
            }

            button,
            input {
                overflow: visible;
            }

            button {
                text-transform: none;
            }

            button,
            html [type="button"],
            [type="reset"],
            [type="submit"] {
                -webkit-appearance: button;
            }

            button::-moz-focus-inner,
            [type="button"]::-moz-focus-inner,
            [type="reset"]::-moz-focus-inner,
            [type="submit"]::-moz-focus-inner {
                border-style: none;
                padding: 0;
            }

            button:-moz-focusring,
            [type="button"]:-moz-focusring,
            [type="reset"]:-moz-focusring,
            [type="submit"]:-moz-focusring {
                outline: 1px dotted ButtonText;
            }

            legend {
                -webkit-box-sizing: border-box;
                        box-sizing: border-box;
                color: inherit;
                display: table;
                max-width: 100%;
                padding: 0;
                white-space: normal;
            }

            [type="checkbox"],
            [type="radio"] {
                -webkit-box-sizing: border-box;
                        box-sizing: border-box;
                padding: 0;
            }

            [type="number"]::-webkit-inner-spin-button,
            [type="number"]::-webkit-outer-spin-button {
                height: auto;
            }

            [type="search"] {
                -webkit-appearance: textfield;
                outline-offset: -2px;
            }

            [type="search"]::-webkit-search-cancel-button,
            [type="search"]::-webkit-search-decoration {
                -webkit-appearance: none;
            }

            ::-webkit-file-upload-button {
                -webkit-appearance: button;
                font: inherit;
            }

            menu {
                display: block;
            }

            canvas {
                display: inline-block;
            }

            template {
                display: none;
            }

            [hidden] {
                display: none;
            }

            html {
                -webkit-box-sizing: border-box;
                        box-sizing: border-box;
                font-family: sans-serif;
            }

            *,
            *::before,
            *::after {
                -webkit-box-sizing: inherit;
                        box-sizing: inherit;
            }

            p {
                margin: 0;
            }

            button {
                background: transparent;
                padding: 0;
            }

            button:focus {
                outline: 1px dotted;
                outline: 5px auto -webkit-focus-ring-color;
            }

            *,
            *::before,
            *::after {
                border-width: 0;
                border-style: solid;
                border-color: #dae1e7;
            }

            button,
            [type="button"],
            [type="reset"],
            [type="submit"] {
                border-radius: 0;
            }

            button,
            input {
                font-family: inherit;
            }

            input::-webkit-input-placeholder {
                color: inherit;
                opacity: .5;
            }

            input:-ms-input-placeholder {
                color: inherit;
                opacity: .5;
            }

            input::-ms-input-placeholder {
                color: inherit;
                opacity: .5;
            }

            input::placeholder {
                color: inherit;
                opacity: .5;
            }

            button,
            [role=button] {
                cursor: pointer;
            }

            .bg-transparent {
                background-color: transparent;
            }

            .bg-white {
                background-color: #fff;
            }

            .bg-teal-light {
                background-color: #64d5ca;
            }

            .bg-blue-dark {
                background-color: #2779bd;
            }

            .bg-indigo-light {
                background-color: #7886d7;
            }

            .bg-purple-light {
                background-color: #a779e9;
            }

            .bg-no-repeat {
                background-repeat: no-repeat;
            }

            .bg-cover {
                background-size: cover;
            }

            .border-grey-light {
                border-color: #dae1e7;
            }

            .hover\:border-grey:hover {
                border-color: #b8c2cc;
            }

            .rounded-lg {
                border-radius: .5rem;
            }

            .border-2 {
                border-width: 2px;
            }

            .hidden {
                display: none;
            }

            .flex {
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
            }

            .items-center {
                -webkit-box-align: center;
                    -ms-flex-align: center;
                        align-items: center;
            }

            .justify-center {
                -webkit-box-pack: center;
                    -ms-flex-pack: center;
                        justify-content: center;
            }

            .font-sans {
                font-family: Nunito, sans-serif;
            }

            .font-light {
                font-weight: 300;
            }

            .font-bold {
                font-weight: 700;
            }

            .font-black {
                font-weight: 900;
            }

            .h-1 {
                height: .25rem;
            }

            .leading-normal {
                line-height: 1.5;
            }

            .m-8 {
                margin: 2rem;
            }

            .my-3 {
                margin-top: .75rem;
                margin-bottom: .75rem;
            }

            .mb-8 {
                margin-bottom: 2rem;
            }

            .max-w-sm {
                max-width: 30rem;
            }

            .min-h-screen {
                min-height: 100vh;
            }

            .py-3 {
                padding-top: .75rem;
                padding-bottom: .75rem;
            }

            .px-6 {
                padding-left: 1.5rem;
                padding-right: 1.5rem;
            }

            .pb-full {
                padding-bottom: 100%;
            }

            .absolute {
                position: absolute;
            }

            .relative {
                position: relative;
            }

            .pin {
                top: 0;
                right: 0;
                bottom: 0;
                left: 0;
            }

            .text-black {
                color: #22292f;
            }

            .text-grey-darkest {
                color: #3d4852;
            }

            .text-grey-darker {
                color: #606f7b;
            }

            .text-2xl {
                font-size: 1.5rem;
            }

            .text-5xl {
                font-size: 3rem;
            }

            .uppercase {
                text-transform: uppercase;
            }

            .antialiased {
                -webkit-font-smoothing: antialiased;
                -moz-osx-font-smoothing: grayscale;
            }

            .tracking-wide {
                letter-spacing: .05em;
            }

            .w-16 {
                width: 4rem;
            }

            .w-full {
                width: 100%;
            }

            @media (min-width: 768px) {
                .md\:bg-left {
                    background-position: left;
                }

                .md\:bg-right {
                    background-position: right;
                }

                .md\:flex {
                    display: -webkit-box;
                    display: -ms-flexbox;
                    display: flex;
                }

                .md\:my-6 {
                    margin-top: 1.5rem;
                    margin-bottom: 1.5rem;
                }

                .md\:min-h-screen {
                    min-height: 100vh;
                }

                .md\:pb-0 {
                    padding-bottom: 0;
                }

                .md\:text-3xl {
                    font-size: 1.875rem;
                }

                .md\:text-15xl {
                    font-size: 9rem;
                }

                .md\:w-1\/2 {
                    width: 50%;
                }
            }

            @media (min-width: 992px) {
                .lg\:bg-center {
                    background-position: center;
                }
            }
             svg#freepik_stories-403-error-forbidden:not(.animated) .animable {
                opacity: 0;
            }svg#freepik_stories-403-error-forbidden.animated #freepik--background-complete--inject-95 {
                animation: 1s 1 forwards cubic-bezier(.36,-0.01,.5,1.38) slideLeft;animation-delay: 0s;
            }
            svg#freepik_stories-403-error-forbidden.animated #freepik--Shadow--inject-95 {
                animation: 1s 1 forwards cubic-bezier(.36,-0.01,.5,1.38) lightSpeedLeft;animation-delay: 0s;
            }
            svg#freepik_stories-403-error-forbidden.animated #freepik--error-403-sign--inject-95 {
                animation: 1s 1 forwards cubic-bezier(.36,-0.01,.5,1.38) zoomOut;animation-delay: 0s;
            }
            svg#freepik_stories-403-error-forbidden.animated #freepik--Character--inject-95 {
                animation: 1s 1 forwards cubic-bezier(.36,-0.01,.5,1.38) lightSpeedRight;animation-delay: 0s;
            }
            svg#freepik_stories-403-error-forbidden.animated #freepik--Barricade--inject-95 {
                animation: 1s 1 forwards cubic-bezier(.36,-0.01,.5,1.38) lightSpeedRight;animation-delay: 0s;
            }
             @keyframes slideLeft {
                               0% {                    opacity: 0;                    transform: translateX(-30px);                }
                                100% {                    opacity: 1;                    transform: translateX(0);                }
            }
             @keyframes lightSpeedLeft {
                from {                transform: translate3d(-50%, 0, 0) skewX(20deg);                opacity: 0;              }
                60% {                transform: skewX(-10deg);                opacity: 1;              }
                80% {                transform: skewX(2deg);              }
                to {                opacity: 1;                transform: translate3d(0, 0, 0);              }
            }
                @keyframes zoomOut {
                    0% {                    opacity: 0;                    transform: scale(1.5);                }
                    100% {                    opacity: 1;                    transform: scale(1);                }
                }
                @keyframes lightSpeedRight {
                    from {                transform: translate3d(50%, 0, 0) skewX(-20deg);                opacity: 0;              }
                    60% {                transform: skewX(10deg);                opacity: 1;              }
                    80% {                transform: skewX(-2deg);              }
                    to {                opacity: 1;                transform: translate3d(0, 0, 0);              }
                }
            svg#freepik_stories-oops-404-error-with-a-broken-robot:not(.animated) .animable {
                opacity: 0;
            }
            svg#freepik_stories-oops-404-error-with-a-broken-robot.animated #freepik--background-complete--inject-2 {
                animation: 1s 1 forwards cubic-bezier(.36,-0.01,.5,1.38) slideDown;animation-delay: 0s;
            }
            svg#freepik_stories-oops-404-error-with-a-broken-robot.animated #freepik--Plant--inject-2 {
                animation: 1s 1 forwards cubic-bezier(.36,-0.01,.5,1.38) lightSpeedRight;animation-delay: 0s;
            }
            svg#freepik_stories-oops-404-error-with-a-broken-robot.animated #freepik--Floor--inject-2 {
                animation: 1s 1 forwards cubic-bezier(.36,-0.01,.5,1.38) zoomIn;animation-delay: 0s;
            }
            svg#freepik_stories-oops-404-error-with-a-broken-robot.animated #freepik--Shadow--inject-2 {
                animation: 1s 1 forwards cubic-bezier(.36,-0.01,.5,1.38) slideLeft;animation-delay: 0s;
            }
            svg#freepik_stories-oops-404-error-with-a-broken-robot.animated #freepik--404-error--inject-2 {
                animation: 1s 1 forwards cubic-bezier(.36,-0.01,.5,1.38) fadeIn;animation-delay: 0s;
            }
            svg#freepik_stories-oops-404-error-with-a-broken-robot.animated #freepik--Robot--inject-2 {
                animation: 1s 1 forwards cubic-bezier(.36,-0.01,.5,1.38) slideDown;animation-delay: 0s;
            }
            svg#freepik_stories-oops-404-error-with-a-broken-robot.animated #freepik--Gears--inject-2 {
                animation: 1s 1 forwards cubic-bezier(.36,-0.01,.5,1.38) slideRight;animation-delay: 0s;
            }
            svg#freepik_stories-oops-404-error-with-a-broken-robot.animated #freepik--speech-bubble--inject-2 {
                animation: 1s 1 forwards cubic-bezier(.36,-0.01,.5,1.38) fadeIn;animation-delay: 0s;
            }
            @keyframes slideDown {
                0% {                    opacity: 0;                    transform: translateY(-30px);                }
                100% {                    opacity: 1;                    transform: translateY(0);                }
            }
            @keyframes lightSpeedRight {
                from {                transform: translate3d(50%, 0, 0) skewX(-20deg);                opacity: 0;              }
                60% {                transform: skewX(10deg);                opacity: 1;              }
                80% {                transform: skewX(-2deg);              }
                to {                opacity: 1;                transform: translate3d(0, 0, 0);              }
            }
            @keyframes zoomIn {
                0% {                    opacity: 0;                    transform: scale(0.5);                }
                100% {                    opacity: 1;                    transform: scale(1);                }
            }
            @keyframes slideLeft {
                0% {                    opacity: 0;                    transform: translateX(-30px);                }
                100% {                    opacity: 1;                    transform: translateX(0);                }
            }
            @keyframes fadeIn {
                0% {                    opacity: 0;                }
                100% {                    opacity: 1;                }
            }
            @keyframes slideRight {
                0% {                    opacity: 0;                    transform: translateX(30px);                }
                100% {                    opacity: 1;                    transform: translateX(0);                }
            }
            .animator-hidden { display: none; }
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 36px;
                padding: 20px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title">
                    @yield('message')
                </div>
            </div>
        </div>
    </body>
    <script type='text/javascript'>
        document.addEventListener('DOMContentLoaded', function () {
            window.setTimeout(document.querySelector('svg').classList.add('animated'),1500);
        })
    </script>
</html>
