  <!-- HEADER START -->

  <header>
      <div class="menu-section">
          <div class="container">
              <div class="row">
                  <div class="col-12 col-sm-12">
                      <nav class="navbar navbar-expand-lg bg-body-tertiary navbar-default">
                          {{-- {{ dd($settings['logo']) }} --}}
                          <a class="navbar-brand" href="{{ route('home') }}"><img
                                  src="{{ isset($settings['logo']) ? asset('settings/' . $settings['logo']) : 'N/A' }}"
                                  alt=""> </a>
                          <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                              data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown"
                              aria-expanded="false" aria-label="Toggle navigation">
                              <span class="navbar-toggler-icon"></span>
                          </button>
                          <div class="collapse navbar-collapse" id="navbarNavDropdown">
                              <ul class="navbar-nav me-auto">
                                  <li class="nav-item">
                                      <a class="nav-link" href="{{ route('home') }}">Home</a>
                                  </li>
                                  <li class="nav-item dropdown position-static">
                                      <a data-mdb-dropdown-init class="nav-link dropdown-toggle" href="#"
                                          id="navbarDropdown" role="button" data-mdb-toggle="dropdown"
                                          aria-expanded="false">
                                          Training
                                      </a>
                                      <div class="dropdown-menu mt-0" aria-labelledby="navbarDropdown"
                                          style="border-top-left-radius: 0; border-top-right-radius: 0;">
                                          <div class="row">
                                              <!-- Existing Courses -->
                                              <div class="col-md-6 mb-3 mb-lg-0">
                                                  <div class="list-group list-group-flush">
                                                      @foreach ($courses as $course)
                                                          <a href="{{ route('courses.course_detail', $course->slug) }}"
                                                              class="dropdown-item">{{ $course->title }}</a>
                                                      @endforeach


                                                  </div>
                                              </div>

                                              <!-- New Courses with gap -->
                                              {{-- <div class="col-md-6 mb-3 mb-lg-0">
                                                  <div class="list-group list-group-flush">
                                                      <a href="{{ route('courses.social-work') }}"
                                                          class="dropdown-item">Social Work & Community Services</a>
                                                      <a href="{{ route('courses.aged-care') }}"
                                                          class="dropdown-item">Aged Care & Disability Support</a>
                                                      <a href="{{ route('courses.civil-engineering') }}"
                                                          class="dropdown-item">Civil Engineering</a>
                                                  </div>
                                              </div> --}}
                                          </div>
                                      </div>
                                  </li>
                                  <li class="nav-item dropdown">
                                      <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink"
                                          role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                          Tech Solutions
                                      </a>
                                      <ul class="dropdown-menu dropdown-menu-dark"
                                          aria-labelledby="navbarDarkDropdownMenuLink">
                                          <li><a class="dropdown-item" href="{{ route('coming-soon') }}"> Domain &
                                                  Hosting</a></li>
                                          <li><a class="dropdown-item" href="{{ route('coming-soon') }}"> Digital
                                                  Marketing</a></li>
                                          <li><a class="dropdown-item" href="{{ route('coming-soon') }}"> Search Engine
                                                  Optimization</a></li>
                                          <li><a class="dropdown-item" href="{{ route('coming-soon') }}"> Social Media
                                                  Marketing</a></li>
                                          <li><a class="dropdown-item" href="{{ route('coming-soon') }}"> Cloud
                                                  Computing Services</a></li>
                                          <li><a class="dropdown-item" href="{{ route('coming-soon') }}"> Web Design &
                                                  Development</a></li>
                                          <li><a class="dropdown-item" href="{{ route('coming-soon') }}"> Mobile App
                                                  Development</a></li>
                                          <li><a class="dropdown-item" href="{{ route('coming-soon') }}"> Custom
                                                  Software Development</a></li>
                                      </ul>
                                  </li>
                                  <li class="nav-item dropdown">
                                      <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink"
                                          role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                          About
                                      </a>
                                      <ul class="dropdown-menu dropdown-menu-dark"
                                          aria-labelledby="navbarDarkDropdownMenuLink">
                                          <li><a class="dropdown-item" href="{{ route('about-us') }}"> About Us</a>
                                          </li>
                                          <li><a class="dropdown-item" href="{{ route('blogs.index') }}"> Blogs</a>
                                          </li>
                                          <li><a class="dropdown-item" href="{{ route('faqs') }}"> FAQs</a></li>
                                          <li><a class="dropdown-item" href="{{ route('teams') }}"> Our Team</a></li>
                                          <li><a class="dropdown-item" href="{{ route('careers.index') }}">
                                                  Career</a></li>
                                      </ul>
                                  </li>
                                  <li class="nav-item dropdown">
                                      <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink"
                                          role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                          Contacts
                                      </a>
                                      <ul class="dropdown-menu dropdown-menu-dark"
                                          aria-labelledby="navbarDarkDropdownMenuLink">

                                                 @foreach ($offices as $office)
                                                          
                                                     
                                          <li><a class="dropdown-item" href="{{ route('contact.office', $office->slug) }}">
                                                  {{ $office->name }}</a></li>

                                                   @endforeach
                                    
                                      </ul>
                                  </li>
                              </ul>
                          </div>
                          <div class="nav-logo-btn">
                              <div class="d-none d-md-block" style="float: inline-start;">
                                  <a href="http://www.linkedin.com/in/careconnecttech/" class="head_social"
                                      target="_blank"><i class="fab fa-linkedin"></i> </a>
                                  <a href="https://www.facebook.com/profile.php?id=61583521261937" class="head_social"
                                      target="_blank"><i class="fab fa-facebook-f"></i> </a>
                                  <a href="https://www.instagram.com/care.connecttech/" class="head_social"
                                      target="_blank"><i class="fa-brands fa-square-instagram"></i> </a>
                                  <a href="https://www.tiktok.com/@careconnecttech" class="head_social"
                                      target="_blank"><i class="fab fa-tiktok"></i> </a>
                              </div>
                              <a href="{{ route('enroll.index') }}" class="btn btn-login"
                                  style="margin-left: 20px;"><i class="fa fa-paper-plane"></i> &nbsp; Enroll Now </a>
                          </div>
                      </nav>
                  </div>
              </div>
          </div>

          <span class="clickmenus" onclick="openNav()">&#9776; </span>
          <div id="mySidenav" class="sidenav">
              <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
              <div class="mobile-menus">
                  <ul>
                      <li>
                          <a href="{{ route('home') }}">Home</a>
                      </li>
                      <li>
                          <a href="#" type="text" data-bs-toggle="collapse"
                              data-bs-target="#collapseExample" aria-expanded="false"
                              aria-controls="collapseExample">Training <i
                                  class="wsmenu-arrow fa fa-angle-down"></i></a>
                          <div class="collapse" id="collapseExample">
                              <div class="card card-body">
                                  <ul>
                                      @foreach ($courses as $course)
                                          <li> <a
                                                  href="{{ route('courses.course_detail', $course->slug) }}">{{ $course->title }}</a>
                                          </li>
                                      @endforeach
                                      {{-- <li><a href="{{ route('courses.accounts-assistant') }}"> Accounting & Tax</a>
                                      </li>
                                      <li><a href="{{ route('courses.data-analytics-course') }}"> Business Data
                                              Analytics with AI</a></li>
                                      <li><a href="{{ route('courses.cloud-network') }}"> Cloud Network & System
                                              Support</a></li>
                                      <li><a href="{{ route('courses.cyber-security') }}"> Cyber Security</a></li>
                                      <li><a href="{{ route('courses.social-work') }}">Social Work & Community
                                              Services</a></li>
                                      <li><a href="{{ route('courses.aged-care') }}">Aged Care & Disability
                                              Support</a></li>
                                      <li><a href="{{ route('courses.civil-engineering') }}">Civil Engineering</a>
                                      </li> --}}
                                  </ul>
                              </div>
                          </div>
                      </li>
                      <li>
                          <a href="#" type="text" data-bs-toggle="collapse"
                              data-bs-target="#collapseExample1" aria-expanded="false"
                              aria-controls="collapseExample1">Tech Solutions <i
                                  class="wsmenu-arrow fa fa-angle-down"></i></a>
                          <div class="collapse" id="collapseExample1">
                              <div class="card card-body">
                                  <ul>
                                      <li><a href="{{ route('coming-soon') }}"> Domain & Hosting</a></li>
                                      <li><a href="{{ route('coming-soon') }}"> Digital Marketing</a></li>
                                      <li><a href="{{ route('coming-soon') }}"> Search Engine Optimization</a></li>
                                      <li><a href="{{ route('coming-soon') }}"> Social Media Marketing</a></li>
                                      <li><a href="{{ route('coming-soon') }}"> Cloud Computing Services</a></li>
                                      <li><a href="{{ route('coming-soon') }}"> Web Design & Development</a></li>
                                      <li><a href="{{ route('coming-soon') }}"> Mobile App Development</a></li>
                                      <li><a href="{{ route('coming-soon') }}"> Custom Software Development</a></li>
                                  </ul>
                              </div>
                          </div>
                      </li>
                      <li>
                          <a href="#" type="text" data-bs-toggle="collapse"
                              data-bs-target="#collapseExample2" aria-expanded="false"
                              aria-controls="collapseExample2">About Us <i
                                  class="wsmenu-arrow fa fa-angle-down"></i></a>
                          <div class="collapse" id="collapseExample2">
                              <div class="card card-body">
                                  <ul>
                                      <li><a href="{{ route('about-us') }}"> About Us</a></li>
                                      <li><a href="{{ route('blogs.index') }}"> Blogs</a></li>
                                      <li><a href="{{ route('faqs') }}"> FAQs</a></li>
                                      <li><a href="{{ route('teams') }}"> Our Team</a></li>
                                      <li><a href="{{ route('careers.index') }}">Career</a></li>
                                  </ul>
                              </div>
                          </div>
                      </li>
                      <li>
                          <a href="#" type="text" data-bs-toggle="collapse"
                              data-bs-target="#collapseExample3" aria-expanded="false"
                              aria-controls="collapseExample3">Contacts <i
                                  class="wsmenu-arrow fa fa-angle-down"></i></a>
                          <div class="collapse" id="collapseExample3">
                              {{-- <div class="card card-body">
                                  <ul>
                                      <li><a href="{{ route('contact', 'sydney') }}"> Sydney</a></li>
                                      <li><a href="{{ route('contact', 'canberra') }}"> Canberra</a></li>
                                      <li><a href="{{ route('contact', 'perth') }}"> Perth</a></li>
                                      <li><a href="{{ route('contact', 'nepaloffice') }}"> Nepal Office</a></li>
                                  </ul>
                              </div> --}}
                          </div>
                      </li>
                  </ul>
              </div>
              <div class="d-lg-none" style="float: inline-start; margin-top: 20px;">
                  <a href="http://www.linkedin.com/in/careconnecttech/" class="head_social" target="_blank"><i
                          class="fab fa-linkedin"></i> </a>
                  <a href="https://www.facebook.com/profile.php?id=61583521261937" class="head_social"
                      target="_blank"><i class="fab fa-facebook-f"></i> </a>
                  <a href="https://www.instagram.com/care.connecttech/" class="head_social" target="_blank"><i
                          class="fa-brands fa-square-instagram"></i> </a>
                  <a href="https://www.tiktok.com/@careconnecttech" class="head_social" target="_blank"><i
                          class="fab fa-tiktok"></i> </a>
              </div>
          </div>
      </div>

  </header>

  <!-- HEADER END -->
