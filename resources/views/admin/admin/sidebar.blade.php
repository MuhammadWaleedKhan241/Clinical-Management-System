<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="admin-dashboard.html" class="text-nowrap logo-img">
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
                    <a class="sidebar-link" href="{{route('admin.dashboard')}}" aria-expanded="false">
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
                    <ul aria-expanded="false" class="collapse first-level visible">
                        <li class="sidebar-item">
                            <a href="{{route('admin.department.show')}}" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu">Departments</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('admin.service.show')}}" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu">Services</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('admin.package.show')}}" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu">Packages</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('admin.employee.show')}}" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu">Emplyees</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('admin.doctoropd.show')}}" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu">OPD Doctors</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('admin.invoice.show')}}" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu">Invoice Reports</span>
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
                            <a href="{{route('admin.patient.show')}}" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu">Patients</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('admin.appointment.show')}}" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu">Appointments</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="#" aria-expanded="false">
                        <span>
                            <i class="ti ti-user-circle"></i>
                        </span>
                        <span class="hide-menu">Invoice Bill</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level visible">
                        <li class="sidebar-item">
                            <a href="{{route('admin.servicebill.show')}}" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu">Service Bills</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('admin.OPDbill.show')}}" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu">OPD Invoice </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('admin.packagebill.show')}}" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu">Package Bills</span>
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
                            <a href="{{route('admin.servicesalereport.show')}}" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu">Service Sale Reports</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('admin.OPDsalereport.show')}}" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu">OPD Sale Reports</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('admin.packagesalereport.show')}}" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu">Package Sale Reports</span>
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
                            <a href="{{route('admin.managetest.show')}}" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu">Manage Test</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('admin.testreference.show')}}" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu">Test References</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('admin.examinationreport.show')}}" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu">Examination Reports</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('admin.stainreport.show')}}" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu">Stain Reports</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('admin.report.show')}}" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu">Reports</span>
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
                            <a href="{{route('admin.user.show')}}" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu">Users</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="settings.html" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu">Settings</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="backup.html" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu">Backup</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
</aside>