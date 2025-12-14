
    {{ $header ?? '' }}
     <style>
        *{
            padding:0;
            margin: 0;
            max-width: 100vw;
        }
        body{
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            padding:0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            max-width: 100%;
        }
        nav{
            max-width: 100%;
            margin:0;
            padding:0;
            /* background: green; */
        }
        nav ul{
            list-style-type: none;
            padding: 0;
            min-height: 100%;
            margin:0;
            background: #005bb5;
            overflow: hidden;
            display:flex;
            justify-content: center;
        }
        nav ul li{
            padding: 14px 20px;
        }
        nav ul li a{
            color:white;
            text-decoration: none;
        }
        .main-container{
            display: flex;
            flex:1;
            padding:0;
            margin:0;
            /* background: rgb(248, 148, 148); */
        }
        .sidebar{
            width:100px;
            background:#f4f4f4;
            padding:5px;
            margin:0;
        }
        .main-content{
            flex:1;
            padding:10px;
            margin:0;
        }
        footer{
            background: #004080;
            color:white;
            text-align: center;
            padding:10px;
            position: relative;
            bottom: 0;
            max-width: 100%;
        }
         {{ $style ?? '' }}
    </style>
   
</head>

<body>
    <nav class="w-100 text-center m-auto align-content-center py-0">
        <ul class="d-flex justify-content-center align-items-center" style="height: 100%;">

             <li class="{{ request()->routeIs('admin-user.view') ? 'active' : '' }}"><a href="{{route('admin-user.view') }}">Admin-users</a></li>
            {{-- @can('is-admin') --}}
            @can('viewRole', Auth::user())
                <li class="{{ request()->routeIs('role.view') ? 'active' : '' }}"><a href="{{route('role.view') }}">Roles</a></li>
            @endcan

            @can('viewFeature', Auth::user())
                 <li class="{{ request()->routeIs('feature.view') ? 'active' : '' }}"><a href="{{route('feature.view')}}">Features</a></li>
            @endcan

            {{-- @can('is-admin') --}}
            @can('viewPermission', Auth::user())
                 <li  class="{{ request()->routeIs('permission.view') ? 'active' : '' }}"><a href="{{ route('permission.index') }}">Permissions_Features</a></li>
            @endcan                  
            @can('viewPermission', Auth::user())
                <li class="{{ request()->routeIs('role.viewPermissionRole') ? 'active' : '' }}"><a href="{{route('role.viewPermissionRole')}}">Permissions By Roles</a></li>
            @endcan
                <li>
                    {{-- login logout  --}}

                    <div class="navbar-end gap-2 bg-primary-subtle text-center rounded-2 fw-bolder d-flex m-auto justify-content-center align-items-center p-2" style="height: 100%;">
                        @auth
                            <div class="w-75">
                                <span class="text-sm d-inline-block w-100"><i class="bi bi-person-circle p-2"></i>{{ auth()->user()->name }}</span>
                                <span class="text-sm d-inline-block w-100 text-primary shadow-orange-950">{{ auth()->user()->role->name }}</span>
                            </div>
                            <form method="POST" action="/logout" class="d-inline-block">
                                @csrf
                                <button type="submit" class="btn btn-ghost btn-sm fw-bold"><span class="py-1 px-1 rounded-circle text-center bg-white me-1"><i class="fa-solid fa-right-from-bracket"></i></span>Logout</button>
                            </form>
                        @else
                            <a href="/login" class="btn btn-ghost btn-sm">Sign In</a>
                            {{-- <a href="{{ route('register') }}" class="btn btn-primary btn-sm">Sign Up</a> --}}
                        @endauth
                    </div>
                    {{-- login logout  --}}
                </li>
        </ul>
       
    </nav>

    <div class="main-container">
        <aside class="sidebar">
            <h4>SideBar</h4>
            <ul>
                <li><a href="#">Link 1</a></li>
                <li><a href="#">Link 2</a></li>
                <li><a href="#">Link 3</a></li>
            </ul>
        </aside>

        <main class="main-content">
            {{ $slot }}
                {{-- {{ $body ?? '' }} --}}
        </main>
    </div>

    <footer>
        <p>&copy;2025 My Website. All rights reserved</p>
    </footer>

    {{ $scripts ?? '' }}

</body>
</html>
