<header class="app-header bg-light">
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
        <div class="collapse1 navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">
                <li class="nav-item dropdown">
                    <a class="nav-link1 pe-0" href="#" id="drop" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="d-flex align-items-center">
                            <div class="user-profile-img">
                                <img src="{{ asset('/assets/images/profile/user-10.jpg') }}" class="rounded-circle"
                                    width="35" height="35" alt="User Image">
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up w-25" aria-labelledby="drop">
                        <div class="profile-dropdown position-relative">
                            <div class="message-body">
                                <a class="py-8 px-7 mt-8 d-flex align-items-center"
                                    href="{{route('admin.profile.edit')}}">My Profile</a>
                                <a class="py-8 px-7 d-flex align-items-center" href="">Change Password</a>
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
    </nav>
</header>