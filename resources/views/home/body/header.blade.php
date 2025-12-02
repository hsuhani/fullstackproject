<header class="site-header lonyo-header-section light-bg sticky-menu" id="sticky-menu">
    <div class="container">
        <div class="row gx-3 align-items-center justify-content-between">

            <!-- Logo -->
            <div class="col-8 col-sm-auto">
                <div class="header-logo1">
                    <a href="{{ url('/') }}">
                        <img src="{{ asset('frontend/assets/images/logo/logo-dark.svg') }}" alt="logo">
                    </a>
                </div>
            </div>

            <!-- Menu -->
            <div class="col">
                <div class="lonyo-main-menu-item">
                    <nav class="main-menu menu-style1 d-none d-lg-block menu-left">
                        <ul>

                            <li>
                                <a href="{{ url('/') }}">Home</a>
                            </li>

                            <li class="menu-item-has-children">
                                <a href="#">About Us</a>
                                <ul class="sub-menu">
                                    <li><a href="{{ url('/company-profile') }}">Company Profile</a></li>
                                    <li><a href="{{ url('/team') }}">Team</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="{{ url('/services') }}">Our Service</a>
                            </li>

                            <li>
                                <a href="{{ url('/portfolio') }}">Portfolio</a>
                            </li>

                            <li>
                                <a href="{{ url('/blog') }}">Blog</a>
                            </li>

                            <li>
                                <a href="{{ url('/contact') }}">Contact</a>
                            </li>

                        </ul>
                    </nav>
                </div>
            </div>

            <!-- Right Side Buttons -->
              <div class="col-auto d-flex align-items-center">
                  <div class="lonyo-header-info-wraper2">
      @auth
      <div class="lonyo-header-info-content">
        <ul>
            <li><a href="{{ route('dashboard') }}">dashboard</a></li>
        </ul>
      </div>
      @else 
      <div class="lonyo-header-info-content">
        <ul>
            <li><a href="{{ route('login') }}">Log in</a></li>
        </ul>
        </div>
      @endauth
                    

                        
                    
                    <a class="lonyo-default-btn lonyo-header-btn" href="{{ url('/contact') }}">Book a demo</a>
                </div>

                <!-- Mobile Menu Trigger -->
                <div class="lonyo-header-menu">
                    <nav class="navbar site-navbar justify-content-between">
                        <button class="lonyo-menu-toggle d-inline-block d-lg-none">
                            <span></span>
                        </button>
                    </nav>
                </div>

            </div>

        </div>
    </div>
</header>
