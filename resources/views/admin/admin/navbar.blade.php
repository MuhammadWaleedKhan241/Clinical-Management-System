<header class="app-header">
    <nav class="navbar navbar-expand-lg navbar-light">
        <ul class="navbar-nav d-flex justify-content-between">
            <li class="nav-item">
                <a class="nav-link sidebartoggler nav-icon-hover ms-n3" id="headerCollapse" href="javascript:void(0)">
                    <i class="ti ti-menu-2"></i>
                </a>
            </li>
        </ul>
    </nav>
</header>
{{-- <header class="app-header bg-light">
    <nav class="navbar navbar-expand-lg navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link sidebartoggler nav-icon-hover ms-n3" id="headerCollapse" href="javascript:void(0)">
                    <i class="ti ti-menu-2"></i>
                </a>
            </li>
        </ul>

        <button class="navbar-toggler p-0 border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="p-2">
                <i class="ti ti-dots fs-7"></i>
            </span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <div class="d-flex align-items-center justify-content-between">
                <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">
                    <li class="nav-item dropdown">
                        <a class="nav-link pe-0" href="" id="drop" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="d-flex align-items-center">
                                <div class="user-profile-img">
                                    <img src={{ asset('images/profile/user-1.jpg') }} class="rounded-circle" width="35"
                                        height="35" alt="">
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up w-25"
                            aria-labelledby="drop1">
                            <div class="profile-dropdown position-relative" data-simplebar>
                                <div class="message-body">
                                    <!-- Link to the user's profile -->
                                    {{-- <a href="{{ route('admin.profile.show') }}"
                                        class="py-8 px-7 mt-8 d-flex align-items-center">My Profile</a> --}}

                                    <!-- Link to change password page -->
                                    {{-- <a href="{{ route('admin.password.change') }}"
                                        class="py-8 px-7 d-flex align-items-center">Change
                                        Password</a> 

                                    <!-- Logout form -->
                                    <form action="{{ route('admin.logout') }}" method="POST">
                                        @csrf

                                        <button type="submit" class="py-8 px-7 mt-8 d-flex align-items-center">Log
                                            Out</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

</header> --}}