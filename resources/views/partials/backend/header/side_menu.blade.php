<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">
    <div class="media user-profile mt-2 mb-2">
        <img src="{{ Gravatar::src(auth()->user()->email) }}" class="avatar-sm rounded-circle mr-2" alt="Shreyu" />
        <img src="{{ Gravatar::src(auth()->user()->email) }}" class="avatar-xs rounded-circle mr-2" alt="Shreyu" />
        @php
            // dump(auth()->user()->posts())
        @endphp
        <div class="media-body">
            <h6 class="pro-user-name mt-0 mb-0">
                {{ auth()->user()->name }}
            </h6>
            <span class="pro-user-desc">{{ auth()->user()->role_name() }}</span>
        </div>
        <div class="dropdown align-self-center profile-dropdown-menu">
            <a class="dropdown-toggle mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                aria-expanded="false">
                <span data-feather="chevron-down"></span>
            </a>
            <div class="dropdown-menu profile-dropdown">
                <a href="pages-profile.html" class="dropdown-item notify-item">
                    <i data-feather="user" class="icon-dual icon-xs mr-2"></i>
                    <span>My Account</span>
                </a>

                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i data-feather="settings" class="icon-dual icon-xs mr-2"></i>
                    <span>Settings</span>
                </a>

                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i data-feather="help-circle" class="icon-dual icon-xs mr-2"></i>
                    <span>Support</span>
                </a>

                <a href="pages-lock-screen.html" class="dropdown-item notify-item">
                    <i data-feather="lock" class="icon-dual icon-xs mr-2"></i>
                    <span>Lock Screen</span>
                </a>

                <div class="dropdown-divider"></div>

                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i data-feather="log-out" class="icon-dual icon-xs mr-2"></i>
                    <span>Logout</span>
                </a>
            </div>
        </div>
    </div>
    <div class="sidebar-content">
        <!--- Sidemenu -->
        <div id="sidebar-menu" class="slimscroll-menu">
            <ul class="metismenu" id="menu-bar">

                @if ( auth()->user()->is_admin() )
                    <li>
                        <a href="{{ route('settings.index') }}">
                            <i data-feather="settings"></i>
                            <span> Settings </span>
                        </a>
                    </li>
                @endif

                <li>
                    <a href="{{ route('profile.index') }}">
                        <i data-feather="image"></i>
                        <span> Profile </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('dashboard') }}">
                        <i data-feather="pie-chart"></i>
                        <span> Dashboard </span>
                    </a>
                </li>

                @if ( auth()->user()->is_admin() )

                    <li>
                        <a href="{{ route('settings.index') }}">
                            <i data-feather="settings"></i>
                            <span> Settings </span>
                        </a>
                    </li>

                    <li>
                        <a href="javascript: void(0);">
                            <i class="uil uil-briefcase"></i>
                            <span> Site </span>
                            <span class="menu-arrow"></span>
                        </a>

                        <ul class="nav-second-level" aria-expanded="false">

                            {{-- Slider --}}
                            <li>
                                <a href="{{ route('slider.index') }}">
                                    <i class="uil uil-suitcase-alt"></i>
                                    <span class="ml-2">Slider</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li>
                                        <a href="{{ route('slider.index') }}">
                                            <i class="uil uil-suitcase-alt"></i>
                                            <span class="ml-2">All Slides</span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="{{ route('slider.create') }}">
                                            <i class="uil uil-wall"></i>
                                            <span class="ml-2">Add new Slide</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>


                            {{-- Portfolio --}}
                            <li>
                                <a href="{{ route('portfolio.index') }}">
                                    <i class="uil uil-suitcase-alt"></i>
                                    <span class="ml-2">Portfolio</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li>
                                        <a href="{{ route('portfolio.index') }}">
                                            <i class="uil uil-suitcase-alt"></i>
                                            <span class="ml-2">All Portfolios</span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="{{ route('portfolio.create') }}">
                                            <i class="uil uil-wall"></i>
                                            <span class="ml-2">Add new Portfolio</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            {{-- Services --}}
                            <li>
                                <a href="{{ route('service.index') }}">
                                    <i class="uil uil-suitcase-alt"></i>
                                    <span class="ml-2">Services</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li>
                                        <a href="{{ route('service.index') }}">
                                            <i class="uil uil-suitcase-alt"></i>
                                            <span class="ml-2">All Services</span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="{{ route('service.create') }}">
                                            <i class="uil uil-wall"></i>
                                            <span class="ml-2">Add new Service</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            {{-- Testimonial --}}
                            <li>
                                <a href="{{ route('testimonial.index') }}">
                                    <i class="uil uil-suitcase-alt"></i>
                                    <span class="ml-2">Testimonial</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li>
                                        <a href="{{ route('testimonial.index') }}">
                                            <i class="uil uil-suitcase-alt"></i>
                                            <span class="ml-2">All Testimonials</span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="{{ route('testimonial.create') }}">
                                            <i class="uil uil-wall"></i>
                                            <span class="ml-2">Add new Testimonial</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            {{-- Team --}}
                            <li>
                                <a href="{{ route('team.index') }}">
                                    <i class="uil uil-suitcase-alt"></i>
                                    <span class="ml-2">Team Members</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li>
                                        <a href="{{ route('team.index') }}">
                                            <i class="uil uil-suitcase-alt"></i>
                                            <span class="ml-2">All Team Members</span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="{{ route('team.create') }}">
                                            <i class="uil uil-wall"></i>
                                            <span class="ml-2">Add new Team Member</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                @endif

                {{-- Posts --}}
                @if ( auth()->user()->has_post_roles() ) 
                <li>
                    <a href="javascript: void(0);">
                        <i class="uil uil-comment-edit"></i>
                        <span> Post </span>
                        <span class="menu-arrow"></span>
                    </a>

                    <ul class="nav-second-level" aria-expanded="false">
                        @if ( auth()->user()->can_view_posts() )
                        <li>
                            <a href="{{ route('post.index') }}">
                                <i class="uil uil-suitcase-alt"></i>
                                <span class="ml-2">All Posts</span>
                            </a>
                        </li>
                        @endif
                        @if(auth()->user()->can_create_posts())
                        <li>
                            <a href="{{ route('post.create') }}">
                                <i class="uil uil-wall"></i>
                                <span class="ml-2">Add new Post</span>
                            </a>
                        </li>
                        @endif

                    </ul>
                </li>
                @endif

                {{-- Categories --}}
                @if ( auth()->user()->has_category_roles() )
                    <li>
                        <a href="javascript: void(0);">
                            <i class="uil uil-briefcase"></i>
                            <span> Category </span>
                            <span class="menu-arrow"></span>
                        </a>

                        <ul class="nav-second-level" aria-expanded="false">

                            @if( auth()->user()->can_view_categories() )
                                <li>
                                    <a href="{{ route('category.index') }}">
                                        <i class="uil uil-suitcase-alt"></i>
                                        <span class="ml-2">All Categories</span>
                                    </a>
                                </li>
                            @endif

                            @if(auth()->user()->can_create_category())
                                <li>
                                    <a href="{{ route('category.create') }}">
                                        <i class="uil uil-wall"></i>
                                        <span class="ml-2">Add new Category</span>
                                    </a>
                                </li>
                            @endif

                        </ul>
                    </li>
                @endif

                {{-- Tags --}}
                @if ( auth()->user()->has_tag_roles() )
                    <li>
                        <a href="javascript: void(0);">
                            <i class="uil uil-expand-arrows-alt"></i>
                            <span> Tag </span>
                            <span class="menu-arrow"></span>
                        </a>

                        <ul class="nav-second-level" aria-expanded="false">
                            @if( auth()->user()->can_view_tags() )
                            <li>
                                <a href="{{ route('tag.index') }}">
                                    <i class="uil uil-suitcase-alt"></i>
                                    <span class="ml-2">All Tags</span>
                                </a>
                            </li>
                            @endif

                            @if( auth()->user()->can_create_tag() )
                            <li>
                                <a href="{{ route('tag.create') }}">
                                    <i class="uil uil-wall"></i>
                                    <span class="ml-2">Add new Tag</span>
                                </a>
                            </li>
                            @endif
                        </ul>
                    </li>
                @endif

                @if ( auth()->user()->is_admin() )
                <li>
                    <a href="javascript: void(0);">
                        <i class="uil uil-users-alt"></i>
                        <span> User </span>
                        <span class="menu-arrow"></span>
                    </a>

                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="{{ route('user.index') }}">
                                <i class="uil uil-suitcase-alt"></i>
                                <span class="ml-2">All Users</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('user.admins') }}">
                                <i class="uil uil-user-plus"></i>
                                <span>Admin only</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('user.create') }}">
                                <i class="uil uil-wall"></i>
                                <span class="ml-2">Add new User</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:void(0);">
                        <i class="uil uil-receipt-alt"></i>
                        <span> Role </span>
                        <span class="menu-arrow"></span>
                    </a>

                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="{{ route('role.index') }}">
                                <i class="uil uil-suitcase-alt"></i>
                                <span class="ml-2">All Roles</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('role.create') }}">
                                <i class="uil uil-wall"></i>
                                <span class="ml-2">Add new Role</span>
                            </a>
                        </li>
                    </ul>
                </li>
                
                <li>
                    <a href="javascript:void(0);">
                        <i class="uil uil-envelope-send"></i>
                        <span> Send Msg </span>
                    </a>
                </li>
                @endif

                <li>
                    <a href="javascript:void(0);">
                        <i class="uil uil-comment-alt-message"></i>
                        <span> Comment </span>
                    </a>
                </li>

                @if (Route::has('logout'))
                <li>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <i data-feather="log-out"></i>
                            <span> Logout </span>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </a>
                </li>
                @endif
            </ul>
        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>
    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->
