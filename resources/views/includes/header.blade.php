<header id="header" class="navbar w-100 navbar-expand-lg navbar-light bg-light fixed-top ">
    <div class="container py-2 ps-4 d-flex">
        <a class="logo fs-5 shadow-primary-input d-flex align-items-center text-black" style="font-weight: 510;" href="">
            <span class="text-nor fs-4 fw-bold">Self</span>Education
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa-solid fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse justify-content-sm-start justify-content-lg-end" id="navbarSupportedContent">
            <ul class="navbar-nav d-flex align-items-sm-start align-items-lg-center">
                <li class="nav-item checkbox-div fw-bold fs-3 mt-sm-3 mt-lg-0 me-ms-0 me-lg-5 rounded-circle d-flex align-items-center justify-content-center">
                    <label id="mode" for="#checkbox-mode" class=" d-flex align-items-center justify-content-center">
                        <input type="checkbox" name="" id="checkbox-mode" style="display: none;">
                        <div class="icon">
                            <i class="bi bi-brightness-high-fill"></i>
                        </div>
                    </label>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::route()->getName()=='Home'?'active':'' }}" aria-current="page" id="nav-link" href="{{ route('Home') }}">
                        <i class="fa-solid fa-house"></i>
                        <span>Home</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::route()->getName()=='Leaderboard'?'active':'' }}" id="nav-link" href="{{ route('Leaderboard') }}">
                        <i class="fa-solid fa-trophy"></i>
                        <span>Leaderboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::route()->getName()=='Contact'?'active':'' }}" id="nav-link" href="{{ route('Contact') }}">
                        <i class="fa-solid fa-comments"></i>
                        <span>Contact</span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle rounded-3 py-1" href="/" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="/Images/users/{{ Auth::user()->image=='default.png'?'nav-user.png':Auth::user()->image }}" alt="" width="31px" height="31px" class="rounded-circle">
                    </a>
                    <ul class="dropdown-menu px-2 rounded-3" aria-labelledby="navbarDropdown">
                        <li>
                            <a class="dropdown-item d-flex flex-row rounded-1" href="{{ route('Home') }}" id="content_result">
                                <div class="h-100">
                                    <img src="/Images/users/{{ Auth::user()->image }}" alt="Image user" width="40px" height="40px">
                                </div>
                                <div class="h-100 ps-2 pt-2" style="line-height: 2px;font-size:1rem;">
                                    <p id="user_name">{{ Auth::user()->name }}</p>
                                    <p style="color:#6c757d;font-size:0.8rem;">Go to profile</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item rounded-1" href="{{ route('Settings') }}">
                                <i class="fa-solid fa-gear me-2"></i>
                                Settings
                            </a></li>
                        <li><a class="dropdown-item rounded-1" href="{{ route('Contact') }}">
                                <i class="fa-solid fa-circle-question me-2"></i>
                                Help
                            </a></li>
                        <li>
                            <a class="dropdown-item rounded-1" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();" >
                                <i class="fa-solid fa-arrow-right-from-bracket me-2"></i>
                                Sign out
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</header>
