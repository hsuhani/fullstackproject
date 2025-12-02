  <div class="lonyo-menu-wrapper">
    <div class="lonyo-menu-area text-center">
      <div class="lonyo-menu-mobile-top">
        <div class="mobile-logo">
          <a href="index.html">
            <img src="assets/images/logo/logo-dark.svg" alt="logo">
          </a>
        </div>
        <button class="lonyo-menu-toggle mobile">
          <i class="ri-close-line"></i>
        </button>
      </div>
      <div class="lonyo-mobile-menu">
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
      </div>
      <div class="lonyo-mobile-menu-btn">
        <a class="lonyo-default-btn sm-size" href="contact-us.html" data-text="Get in Touch"><span class="btn-wraper">Get in Touch</span></a>
        <a class="lonyo-default-btn sm-size" href="contact-us.html" data-text="Get in Touch"><span class="btn-wraper">Get in Touch</span></a>
      </div>
    </div>
  </div>