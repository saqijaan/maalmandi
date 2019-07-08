<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu">
            @php
                $homeRouts = ['admin.home'];
            @endphp
            <li class="{{ in_array( Request::route()->getName(),$homeRouts )? 'active':'' }}">
                <a href="{{ route('admin.home') }}">
                <i class="fa fa-wrench"></i>
                <span class="title">Dashboard</span>
                </a>
            </li>

            {{-- User Routes --}}
            @php
                $userRoutes = ['user.index','user.edit','user.create'];
            @endphp
            <li class="{{ in_array( Request::route()->getName(),$userRoutes )? 'active':'' }}">
                <a href="{{ route('user.index') }}">
                <i class="fa fa-gears"></i>
                <span class="title">Users</span>
                </a>
            </li>

            {{-- City Routes --}}
            @php
                $cityRoutes = ['city.index','city.edit','city.create'];
            @endphp
            <li class="{{ in_array( Request::route()->getName(),$cityRoutes )? 'active':'' }}">
                <a href="{{ route('city.index') }}">
                <i class="fa fa-gears"></i>
                <span class="title">Cities</span>
                </a>
            </li>

            {{-- Category Routes --}}
            @php
                $categoryRoutes = ['category.index','category.edit','category.create'];
            @endphp
            <li class="{{ in_array( Request::route()->getName(),$categoryRoutes )? 'active':'' }}">
                <a href="{{ route('category.index') }}">
                <i class="fa fa-gears"></i>
                <span class="title">Categories</span>
                </a>
            </li>

            {{-- Posts Routes --}}
            @php
                $postRoutes = ['post.index','post.edit','post.create'];
            @endphp
            <li class="{{ in_array( Request::route()->getName(),$postRoutes )? 'active':'' }}">
                <a href="{{ route('post.index') }}">
                <i class="fa fa-gears"></i>
                <span class="title">Posts</span>
                </a>
            </li>

            {{-- Profile Routes --}}
            @php
                $profileRoutes = ['profile.index','profile.edit','profile.create'];
            @endphp
            <li class="{{ in_array( Request::route()->getName(),$profileRoutes )? 'active':'' }}">
                <a href="{{ route('profile.index') }}">
                <i class="fa fa-key"></i>
                <span class="title">Profile</span>
                </a>
            </li>
            <li>
                <a href="#" onclick="$('#logout').submit()">
                    <i class="fa fa-arrow-left"></i>
                    <span class="title">Logout</span>
                </a>
                <form action="{{ route('logout') }}" id="logout" method="POST">
                    @csrf
                </form>
            </li>
        </ul>
    </section>
</aside>