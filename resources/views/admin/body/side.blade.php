<!-- Left Sidebar Start -->
<div class="app-sidebar-menu">
    <div class="h-100" data-simplebar>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <div class="logo-box">
                <a href="index.html" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{asset('backend/assets/images/logo-sm.png')}}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{asset('backend/assets/images/logo-light.png')}}" alt="" height="24">
                    </span>
                </a>
                <a href="index.html" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{asset('backend/assets/images/logo-sm.png')}}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{asset('backend/assets/images/logo-dark.png')}}" alt="" height="24">
                    </span>
                </a>
            </div>

            <ul id="side-menu">

                <li class="menu-title">Menu</li>
                <li>
                    <a href="{{route('dashboard')}}" class="tp-link">
                        <i data-feather="home"></i>
                        <span> Dashboard </span>
                    </a>
                </li>


                
                <!-- <li>
                    <a href="landing.html" target="_blank">
                        <i data-feather="globe"></i>
                        <span> Landing </span>
                    </a>
                </li> -->

                <li class="menu-title">Pages</li>

                <li>
                    <a href="#sidebarAuth" data-bs-toggle="collapse">
                        <i data-feather="users"></i>
                        <span> REVIEW SETUP </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarAuth">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{route('all.review')}}" class="tp-link">ALL REVIEW</a>
                            </li>
                            <li>
                                <a href="{{route('add.review')}}" class="tp-link">ADD REVIEW</a>
                            </li>
                            
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarError" data-bs-toggle="collapse">
                        <i data-feather="alert-octagon"></i>
                        <span> Error Pages </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarError">
                        <ul class="nav-second-level">
                            <li>
                                <a href="error-404.html" class="tp-link">Error 404</a>
                            </li>
                            <li>
                                <a href="error-500.html" class="tp-link">Error 500</a>
                            </li>
                            
                        </ul>
                    </div>
                </li>

                

                <li class="menu-title mt-2">General</li>

                <li>
                    <a href="#sidebarBaseui" data-bs-toggle="collapse">
                        <i data-feather="package"></i>
                        <span> Components </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarBaseui">
                        <ul class="nav-second-level">
                            <li>
                                <a href="ui-accordions.html" class="tp-link">Accordions</a>
                            </li>
                            <li>
                                <a href="ui-alerts.html" class="tp-link">Alerts</a>
                            </li>
                            <li>
                                <a href="ui-badges.html" class="tp-link">Badges</a>
                            </li>
                            <li>
                                <a href="ui-breadcrumb.html" class="tp-link">Breadcrumb</a>
                            </li>
                            <li>
                                <a href="ui-buttons.html" class="tp-link">Buttons</a>
                            </li>
                            <li>
                                <a href="ui-cards.html" class="tp-link">Cards</a>
                            </li>
                            <li>
                                <a href="ui-collapse.html" class="tp-link">Collapse</a>
                            </li>
                            <li>
                                <a href="ui-dropdowns.html" class="tp-link">Dropdowns</a>
                            </li>
                            <li>
                                <a href="ui-video.html" class="tp-link">Embed Video</a>
                            </li>
                            <li>
                                <a href="ui-grid.html" class="tp-link">Grid</a>
                            </li>
                            <li>
                                <a href="ui-images.html" class="tp-link">Images</a>
                            </li>
                            <li>
                                <a href="ui-list.html" class="tp-link">List Group</a>
                            </li>
                            
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="widgets.html" class="tp-link">
                        <i data-feather="aperture"></i>
                        <span> Widgets </span>
                    </a>
                </li>

                <li>
                    <a href="#sidebarAdvancedUI" data-bs-toggle="collapse">
                        <i data-feather="cpu"></i>
                        <span> Extended UI </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarAdvancedUI">
                        <ul class="nav-second-level">
                            <li>
                                <a href="extended-carousel.html" class="tp-link">Carousel</a>
                            </li>
                            <li>
                                <a href="extended-notifications.html" class="tp-link">Notifications</a>
                            </li>
                            <li>
                                <a href="extended-offcanvas.html" class="tp-link">Offcanvas</a>
                            </li>
                            <li>
                                <a href="extended-range-slider.html" class="tp-link">Range Slider</a>
                            </li>
                        </ul>
                    </div>
                

            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
</div>
<!-- Left Sidebar End -->