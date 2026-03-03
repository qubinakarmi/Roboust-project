<!--begin::Sidebar-->
<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand">
        <!--begin::Brand Link-->
        <a href="./index.html" class="brand-link">
            <!--begin::Brand Image-->
            <img src="{{ asset('all_collect/assets/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                class="brand-image opacity-75 shadow" />
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-light">ABC Consultancy</span>
            <!--end::Brand Text-->
        </a>
        <!--end::Brand Link-->
    </div>
    <!--end::Sidebar Brand-->


    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="navigation"
                aria-label="Main navigation" data-accordion="false" id="navigation">
                <li class="nav-item menu-open">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link active">
                        <i class="nav-icon bi bi-speedometer"></i>
                        <p>
                            Dashboard
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                </li>









                <li class="nav-item">
                    <a href="#" class="nav-link">
                        {{-- <i class="nav-icon bi bi-clipboard-fill"></i> --}}
                        <p>
                            Blog
                            {{-- <span class="nav-badge badge text-bg-secondary me-3">6</span> --}}
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.blog') }}" class="nav-link">
                                {{-- <i class="nav-icon bi bi-circle"></i> --}}
                                <p>Blog List</p>
                            </a>
                        </li>





                    </ul>
                </li>



                <li class="nav-item">
                    <a href="#" class="nav-link">
                        {{-- <i class="nav-icon bi bi-clipboard-fill"></i> --}}
                        <p>
                            Form
                            {{-- <span class="nav-badge badge text-bg-secondary me-3">6</span> --}}
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('contact.form') }}" class="nav-link">
                                {{-- <i class="nav-icon bi bi-circle"></i> --}}
                                <p>Contact Form</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('register.form') }}" class="nav-link">
                                {{-- <i class="nav-icon bi bi-circle"></i> --}}
                                <p>Register Form</p>
                            </a>
                        </li>





                    </ul>
                </li>


                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <p> Services<i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.services') }}" class="nav-link">
                                {{-- <i class="nav-icon bi bi-circle"></i> --}}
                                <p>Services List</p>
                            </a>
                        </li>
                    </ul>
                </li>






                        <li class="nav-item">
                    <a href="#" class="nav-link">
                        <p> Gallery<i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('gallery') }}" class="nav-link">
                                {{-- <i class="nav-icon bi bi-circle"></i> --}}
                                <p>Add Gallery</p>
                            </a>
                        </li>
                    </ul>
                </li>





                <li class="nav-item">
                    <a href="#" class="nav-link">
                        {{-- <i class="nav-icon bi bi-clipboard-fill"></i> --}}
                        <p> Testimonial
                            {{-- <span class="nav-badge badge text-bg-secondary me-3">6</span> --}}
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.testimonial') }}" class="nav-link">
                                {{-- <i class="nav-icon bi bi-circle"></i> --}}
                                <p>Testimonial List</p>
                            </a>
                        </li>
                    </ul>
                </li>




                <li class="nav-item">
                    <a href="#" class="nav-link">
                        {{-- <i class="nav-icon bi bi-clipboard-fill"></i> --}}


                        <p>
                            Settings
                            {{-- <span class="nav-badge badge text-bg-secondary me-3">6</span> --}}
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('setting.index') }}" class="nav-link">
                                {{-- <i class="nav-icon bi bi-circle"></i> --}}
                                <p>Settings List</p>
                            </a>
                        </li>





                    </ul>
                </li>













            </ul>
            <!--end::Sidebar Menu-->
        </nav>
    </div>
    <!--end::Sidebar Wrapper-->
</aside>
<!--end::Sidebar-->
