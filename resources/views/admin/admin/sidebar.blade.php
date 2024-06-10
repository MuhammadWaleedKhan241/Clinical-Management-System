<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="{{route('admin.dashboard')}}" class="text-nowrap logo-img">
                <img src="assets/images/logos/light-logo.png" class="light-logo" width="180" alt="" />
            </a>
            <div class="close-btn d-lg-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8 text-muted"></i>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar>
            <ul id="sidebarnav">

                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Home</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="" aria-expanded="false">
                        <span>
                            <i class="ti ti-clipboard"></i>
                        </span>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="#" aria-expanded="false">
                        <span class="d-flex">
                            <i class="ti ti-basket"></i>
                        </span>
                        <span class="hide-menu">Admin</span>
                    </a>
                    {{-- <ul aria-expanded="false" class="collapse first-level visible">
                        <li class="sidebar-item">
                            <a href={{route('department.show')}} class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu">Departments</span>
                            </a>
                        </li> --}}
                        {{-- <li class="sidebar-item">
                            <a href="{{route('service.show')}}" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu">Service</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('package.show')}}" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu">Packages</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('employee.show')}}" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu">Emplyee</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('doctoropd.show')}}" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu">Doctor OPD</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('invoice-report.show')}}" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu">Invoice Report</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" aria-expanded="false">
                        <span>
                            <i class="ti ti-message-dots"></i>
                        </span>
                        <span class="hide-menu">Patient</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level visible">
                        <li class="sidebar-item">
                            <a href="{{route('patient.show')}}" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu">Patients</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{rotue('appontment.show')}}" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu">Appointments</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a href="invoie" class="sidebar-link has-arrow" href="#" aria-expanded="false">
                        <span>
                            <i class="ti ti-user-circle"></i>
                        </span>
                        <span class="hide-menu">Invoice Bill</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level visible">
                        <li class="sidebar-item">
                            <a href="{{route('service-bill.show')}}" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu">Service Bill</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('OPD-bill.show')}}" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu">OPD Bill</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('package-bill.show')}}" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu">Package Bill</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" aria-expanded="false">
                        <span>
                            <i class="ti ti-file-pencil"></i>
                        </span>
                        <span class="hide-menu">Report</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level visible">
                        <li class="sidebar-item">
                            <a href="{{route('service-sale-report.show')}}" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu">Service Sale Report</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('OPD-sales-report.show')}}" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu">OPD Sale Report</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('package-sale-report.show')}}" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu">Package Sale Report</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" aria-expanded="false">
                        <span>
                            <i class="ti ti-file-pencil"></i>
                        </span>
                        <span class="hide-menu">Lab Test</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level visible">
                        <li class="sidebar-item">
                            <a href="{{route('manage-test.show')}}" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu">Manage Test</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('test-reference.show')}}" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu">Test Reference</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('examination-report.show')}}" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu">Examination Report</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('stain-report.show')}}" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu">Stain Report</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('report.show')}}" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu">Report</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" aria-expanded="false">
                        <span>
                            <i class="ti ti-file-description"></i>
                        </span>
                        <span class="hide-menu">Setting</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level visible">
                        <li class="sidebar-item">
                            <a href="{{route('user.show')}}" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu">User</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('settings.show')}}" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu">Settings</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('backup.show')}}" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu">Backup</span>
                            </a>
                        </li>
                    </ul>
                </li> --}}
            </ul>
        </nav>
</aside>