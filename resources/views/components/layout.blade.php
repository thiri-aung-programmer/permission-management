<!DOCTYPE html>
<html lang="en">
     <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<head>
    {{ $header ?? '' }}
    {{ $style ?? '' }}
</head>

<body>
    <nav>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Contact Us</a></li>
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
        </main>
    </div>

    <footer>
        <p>&copy;2025 My Website. All rights reserved</p>
    </footer>

    {{ $scripts ?? '' }}

</body>
</html>
