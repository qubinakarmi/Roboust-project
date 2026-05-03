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
                        <p> Admission<i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('enroll.index') }}" class="nav-link">
                                <p>Admission List</p>
                            </a>
                        </li>
                    </ul>

                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <p>
                           Details<i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('section.index') }}" class="nav-link">
                                <p>Section </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('requirement.index') }}" class="nav-link">
                                <p>Requirement </p>
                            </a>
                        </li>


                    </ul>
                </li>































                <li class="nav-item">
                    <a href="#" class="nav-link">
                        {{-- <i class="nav-icon bi bi-clipboard-fill"></i> --}}
                        <i class=" nav-icon fas fa-file-alt "></i>

                        <p>
                            Blog
                            {{-- <span class="nav-badge badge text-bg-secondary me-3">6</span> --}}
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>




                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('author.index') }}" class="nav-link">
                                {{-- <i class="nav-icon bi bi-circle"></i> --}}
                                <p>Author List</p>
                            </a>
                        </li>

                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('blog.index') }}" class="nav-link">
                                {{-- <i class="nav-icon bi bi-circle"></i> --}}
                                <p>Blog List</p>
                            </a>
                        </li>

                    </ul>

                           <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('video.index') }}" class="nav-link">
                                {{-- <i class="nav-icon bi bi-circle"></i> --}}
                                <p>Video  List</p>
                            </a>
                        </li>

                    </ul>
                </li>

                        <li class="nav-item">
                    <a href="{{ route('faq.index') }}" class="nav-link">
                        <p>
                            Faq
                        </p>
                    </a>

                </li>



                <li class="nav-item">
                    <a href="{{ route('counter.index') }}" class="nav-link">
                        {{-- <i class="nav-icon bi bi-clipboard-fill"></i> --}}
                        <i class="nav-icon fas fa-tachometer-alt "></i>
                        <p>
                            Counter
                            {{-- <span class="nav-badge badge text-bg-secondary me-3">6</span> --}}
                            {{-- <i class="nav-arrow bi bi-chevron-right"></i> --}}
                        </p>
                    </a>

                </li>




                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa-solid fa-book"></i>
                        {{-- <i class=" nav-icon fa-solid fa-person-walking-luggage"></i> --}}
                        <p> Course<i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('course.index') }}" class="nav-link">
                                <p>Course List</p>
                            </a>
                        </li>
                    </ul>

                </li>


                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-clipboard-fill"></i>
                        <p>
                            Form
                            {{-- <span class="nav-badge badge text-bg-secondary me-3">6</span> --}}
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('contacts.index') }}" class="nav-link">
                                {{-- <i class="nav-icon bi bi-circle"></i> --}}
                                <p>Contact </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('reg.index') }}" class="nav-link">
                                {{-- <i class="nav-icon bi bi-circle"></i> --}}
                                <p>Register </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('team.index') }}" class="nav-link">
                                <p>Teams </p>
                            </a>
                        </li>

                    </ul>
                </li>


                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class=" nav-icon fa-solid fa-person-walking-luggage"></i>
                        <p> Services<i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('category.index') }}" class="nav-link">
                                <p>Category List</p>
                            </a>
                        </li>
                    </ul>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('service.index') }}" class="nav-link">
                                <p>Services List</p>
                            </a>
                        </li>
                    </ul>
                </li>




                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa-solid fa-image"></i>

                        <p> Gallery<i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('gall.create') }}" class="nav-link">

                                <i class="fa-thin fa-image"></i>
                                <p>Add Gallery</p>
                            </a>
                        </li>
                    </ul>
                </li>



                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <p> Teacher<i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('teacher.index') }}" class="nav-link">
                                <p>Teacher List</p>
                            </a>
                        </li>
                    </ul>

                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        {{-- <i class="nav-icon bi bi-clipboard-fill"></i> --}}
                        <i class="nav-icon fas fa-quote-left"></i>

                        <p> Testimonial
                            {{-- <span class="nav-badge badge text-bg-secondary me-3">6</span> --}}
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('testimonial.index') }}" class="nav-link">
                                {{-- <i class="nav-icon bi bi-circle"></i> --}}
                                <p>Testimonial List</p>
                            </a>
                        </li>
                    </ul>
                </li>





                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa-solid fa-sliders"></i>
                        <p> Slider
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('slider.index') }}" class="nav-link">
                                <p>Slider List</p>
                            </a>
                        </li>
                    </ul>
                </li>



                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa-regular fa-file"></i>
                        <p> Pages
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('page.index') }}" class="nav-link">
                                <p>Pages List</p>
                            </a>
                        </li>
                    </ul>


                </li>



















                <li class="nav-item">
                    <a href="#" class="nav-link">
                        {{-- <i class="nav-icon bi bi-clipboard-fill"></i> --}}
                        <i class=" nav-icon fa-solid fa-gear"></i>


                        <p>
                            Settings
                            {{-- <span class="nav-badge badge text-bg-secondary me-3">6</span> --}}
                            <i class="nav-arrow bi bi-chevron-right"></i>

                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('sets.index') }}" class="nav-link">
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
