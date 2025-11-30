
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
    <nav>
        <ul>
             <li><a href="{{route('admin-user.index') }}">Admin-users</a></li>
            <li><a href="{{route('role.index') }}">Roles</a></li>
            <li><a href="{{route('feature.index')}}">Features</a></li>
            <li><a href="#">Permissions_Features</a></li>
            <li><a href="#">Permissions By Roles</a></li>
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
