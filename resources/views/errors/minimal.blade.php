<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('Links/css/login1.css') }}">
        {{-- Bootstrap --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" >
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}code{font-family:monospace,monospace;font-size:1em}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}code{font-family:Menlo,Monaco,Consolas,Liberation Mono,Courier New,monospace}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-gray-400{--border-opacity:1;border-color:#cbd5e0;border-color:rgba(203,213,224,var(--border-opacity))}.border-t{border-top-width:1px}.border-r{border-right-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-xl{max-width:36rem}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-4{padding-left:1rem;padding-right:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.uppercase{text-transform:uppercase}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.tracking-wider{letter-spacing:.05em}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@-webkit-keyframes spin{0%{transform:rotate(0deg)}to{transform:rotate(1turn)}}@keyframes spin{0%{transform:rotate(0deg)}to{transform:rotate(1turn)}}@-webkit-keyframes ping{0%{transform:scale(1);opacity:1}75%,to{transform:scale(2);opacity:0}}@keyframes ping{0%{transform:scale(1);opacity:1}75%,to{transform:scale(2);opacity:0}}@-webkit-keyframes pulse{0%,to{opacity:1}50%{opacity:.5}}@keyframes pulse{0%,to{opacity:1}50%{opacity:.5}}@-webkit-keyframes bounce{0%,to{transform:translateY(-25%);-webkit-animation-timing-function:cubic-bezier(.8,0,1,1);animation-timing-function:cubic-bezier(.8,0,1,1)}50%{transform:translateY(0);-webkit-animation-timing-function:cubic-bezier(0,0,.2,1);animation-timing-function:cubic-bezier(0,0,.2,1)}}@keyframes bounce{0%,to{transform:translateY(-25%);-webkit-animation-timing-function:cubic-bezier(.8,0,1,1);animation-timing-function:cubic-bezier(.8,0,1,1)}50%{transform:translateY(0);-webkit-animation-timing-function:cubic-bezier(0,0,.2,1);animation-timing-function:cubic-bezier(0,0,.2,1)}}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}}
           svg#freepik_stories-503-error-service-unavailable:not(.animated) .animable {opacity: 0;}svg#freepik_stories-503-error-service-unavailable.animated #freepik--background-simple--inject-34 {animation: 1s 1 forwards cubic-bezier(.36,-0.01,.5,1.38) slideDown;animation-delay: 0s;}svg#freepik_stories-503-error-service-unavailable.animated #freepik--planet-3--inject-34 {animation: 1s 1 forwards cubic-bezier(.36,-0.01,.5,1.38) fadeIn;animation-delay: 0s;}svg#freepik_stories-503-error-service-unavailable.animated #freepik--planet-2--inject-34 {animation: 1s 1 forwards cubic-bezier(.36,-0.01,.5,1.38) slideLeft;animation-delay: 0s;}svg#freepik_stories-503-error-service-unavailable.animated #freepik--planet-1--inject-34 {animation: 1s 1 forwards cubic-bezier(.36,-0.01,.5,1.38) slideUp;animation-delay: 0s;}svg#freepik_stories-503-error-service-unavailable.animated #freepik--Text--inject-34 {animation: 1s 1 forwards cubic-bezier(.36,-0.01,.5,1.38) slideLeft;animation-delay: 0s;}svg#freepik_stories-503-error-service-unavailable.animated #freepik--Character--inject-34 {animation: 1s 1 forwards cubic-bezier(.36,-0.01,.5,1.38) zoomOut;animation-delay: 0s;}            @keyframes slideDown {                0% {                    opacity: 0;                    transform: translateY(-30px);                }                100% {                    opacity: 1;                    transform: translateY(0);                }            }                    @keyframes fadeIn {                0% {                    opacity: 0;                }                100% {                    opacity: 1;                }            }                    @keyframes slideLeft {                0% {                    opacity: 0;                    transform: translateX(-30px);                }                100% {                    opacity: 1;                    transform: translateX(0);                }            }                    @keyframes slideUp {                0% {                    opacity: 0;                    transform: translateY(30px);                }                100% {                    opacity: 1;                    transform: inherit;                }            }                    @keyframes zoomOut {                0% {                    opacity: 0;                    transform: scale(1.5);                }                100% {                    opacity: 1;                    transform: scale(1);                }            }
            svg#freepik_stories-error-429:not(.animated) .animable {opacity: 0;}svg#freepik_stories-error-429.animated #freepik--background-complete--inject-3 {animation: 1s 1 forwards cubic-bezier(.36,-0.01,.5,1.38) zoomIn;animation-delay: 0s;}svg#freepik_stories-error-429.animated #freepik--Server--inject-3 {animation: 1s 1 forwards cubic-bezier(.36,-0.01,.5,1.38) slideUp;animation-delay: 0s;}svg#freepik_stories-error-429.animated #freepik--Floor--inject-3 {animation: 1s 1 forwards cubic-bezier(.36,-0.01,.5,1.38) lightSpeedRight;animation-delay: 0s;}svg#freepik_stories-error-429.animated #freepik--Device--inject-3 {animation: 1s 1 forwards cubic-bezier(.36,-0.01,.5,1.38) zoomOut;animation-delay: 0s;}svg#freepik_stories-error-429.animated #freepik--Screens--inject-3 {animation: 1s 1 forwards cubic-bezier(.36,-0.01,.5,1.38) zoomOut;animation-delay: 0s;}svg#freepik_stories-error-429.animated #freepik--Gears--inject-3 {animation: 1s 1 forwards cubic-bezier(.36,-0.01,.5,1.38) lightSpeedRight;animation-delay: 0s;}            @keyframes zoomIn {                0% {                    opacity: 0;                    transform: scale(0.5);                }                100% {                    opacity: 1;                    transform: scale(1);                }            }                    @keyframes slideUp {                0% {                    opacity: 0;                    transform: translateY(30px);                }                100% {                    opacity: 1;                    transform: inherit;                }            }                    @keyframes lightSpeedRight {              from {                transform: translate3d(50%, 0, 0) skewX(-20deg);                opacity: 0;              }              60% {                transform: skewX(10deg);                opacity: 1;              }              80% {                transform: skewX(-2deg);              }              to {                opacity: 1;                transform: translate3d(0, 0, 0);              }            }                    @keyframes zoomOut {                0% {                    opacity: 0;                    transform: scale(1.5);                }                100% {                    opacity: 1;                    transform: scale(1);                }            }
            svg#freepik_stories-401-error-unauthorized:not(.animated) .animable {opacity: 0;}svg#freepik_stories-401-error-unauthorized.animated #freepik--Floor--inject-33 {animation: 1s 1 forwards cubic-bezier(.36,-0.01,.5,1.38) zoomIn;animation-delay: 0s;}svg#freepik_stories-401-error-unauthorized.animated #freepik--Shadows--inject-33 {animation: 1s 1 forwards cubic-bezier(.36,-0.01,.5,1.38) slideLeft;animation-delay: 0s;}svg#freepik_stories-401-error-unauthorized.animated #freepik--Plant--inject-33 {animation: 1s 1 forwards cubic-bezier(.36,-0.01,.5,1.38) slideUp;animation-delay: 0s;}svg#freepik_stories-401-error-unauthorized.animated #freepik--card-reader--inject-33 {animation: 1s 1 forwards cubic-bezier(.36,-0.01,.5,1.38) slideDown;animation-delay: 0s;}svg#freepik_stories-401-error-unauthorized.animated #freepik--Character--inject-33 {animation: 1s 1 forwards cubic-bezier(.36,-0.01,.5,1.38) zoomOut;animation-delay: 0s;}svg#freepik_stories-401-error-unauthorized.animated #freepik--id-card--inject-33 {animation: 1s 1 forwards cubic-bezier(.36,-0.01,.5,1.38) slideRight;animation-delay: 0s;}svg#freepik_stories-401-error-unauthorized.animated #freepik--error-401--inject-33 {animation: 1s 1 forwards cubic-bezier(.36,-0.01,.5,1.38) zoomIn;animation-delay: 0s;}            @keyframes zoomIn {                0% {                    opacity: 0;                    transform: scale(0.5);                }                100% {                    opacity: 1;                    transform: scale(1);                }            }                    @keyframes slideLeft {                0% {                    opacity: 0;                    transform: translateX(-30px);                }                100% {                    opacity: 1;                    transform: translateX(0);                }            }                    @keyframes slideUp {                0% {                    opacity: 0;                    transform: translateY(30px);                }                100% {                    opacity: 1;                    transform: inherit;                }            }                    @keyframes slideDown {                0% {                    opacity: 0;                    transform: translateY(-30px);                }                100% {                    opacity: 1;                    transform: translateY(0);                }            }                    @keyframes zoomOut {                0% {                    opacity: 0;                    transform: scale(1.5);                }                100% {                    opacity: 1;                    transform: scale(1);                }            }                    @keyframes slideRight {                0% {                    opacity: 0;                    transform: translateX(30px);                }                100% {                    opacity: 1;                    transform: translateX(0);                }            }
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
        </style>

    </head>
    <body class="antialiased font-sans">
        <div class="md:flex min-h-screen">
            <div class="w-full md:w-1/2 bg-white flex items-center justify-center">
                <div class="max-w-sm m-8">
                    <div class="text-black text-5xl md:text-15xl font-black">
                        @yield('code', __('Oh no'))
                    </div>

                    <div class="w-16 h-1 bg-purple-light my-3 md:my-6"></div>

                    <p class="text-grey-darker text-2xl md:text-3xl font-light mb-8 leading-normal">
                        @yield('message')
                    </p>

                    <a href="{{ app('router')->has('Home') ? route('Home') : url('/') }}">
                        <button class="bg-transparent text-grey-darkest font-bold uppercase tracking-wide py-3 px-6 border-2 border-grey-light hover:border-grey rounded-lg">
                            {{ __('Go Home') }}
                        </button>
                    </a>
                </div>
            </div>

            <div class="relative pb-full md:flex md:pb-0 md:min-h-screen w-full md:w-1/2">
                @yield('image')
            </div>
        </div>
        <script type='text/javascript'>
            document.addEventListener('DOMContentLoaded', function () {
                window.setTimeout(document.querySelector('svg').classList.add('animated'),1500);
            })
        </script>
    </body>
</html>
