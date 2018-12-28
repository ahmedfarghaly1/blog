  <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- User profile -->
                <div class="user-profile">
                    <!-- User profile image -->
                    <div class="profile-img"> <img src="{{isset(Auth::user()->image) && Auth::user()->image != null ? url(Auth::user()->image):url('images/users/profile.png')}}" alt="user" />
                        <!-- this is blinking heartbit-->
                        <div class="notify setpos"> <span class="heartbit"></span> <span class="point"></span> </div>
                    </div>
                    <!-- User profile text-->
                    <div class="profile-text">
                        <h5>{{ Auth::user()->name }}</h5>
                        <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"><i class="mdi mdi-settings"></i></a>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a>
                                       

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                        <div class="dropdown-menu animated flipInY">
                            <!-- text-->
                            <a href="{{url('/myprofile')}}" class="dropdown-item"><i class="ti-user"></i> حسابي </a>

                            <!-- text-->
                            <div class="dropdown-divider"></div>
                            <!-- text-->
                            <a href="" class="dropdown-item"><i class="ti-settings"></i> بيانات حسابي </a>
                            <!-- text-->
                            <div class="dropdown-divider"></div>
                            <!-- text-->
                            <a href="" class="dropdown-item"><i class="fa fa-power-off"></i> تسجيل الخروج </a>
                            <!-- text-->
                        </div>
                    </div>
                </div>
                <!-- End User profile text-->

                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>

                        
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Categories</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{route('category.create')}}">Add Category </a></li>
                                <li><a href="{{route('category.index')}}">Show Categories</a></li>
                            </ul>
                        </li>
                                    
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Posts</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{route('post.create')}}">Add Post </a></li>
                                <li><a href="{{route('post.index')}}">Show Posts</a></li>
                            </ul>
                        </li>

                        </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
