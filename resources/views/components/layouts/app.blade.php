
@vite(['resources/js/app.js', 'resources/css/app.css'])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Page Title' }}</title>
     @livewireStyles
    <link rel="icon" type="image/x-icon" href="images/logo.png">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/potstyle.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <!-- header အစ  -->
       <header>
        <div class="left">
        <img src="images/logo.png" class="logo" alt="">
        <div class="logotext">
            <h4>Beauty Blooms</h4>
            <h5>Florish Service Co.Ltd, Myanmar</h5>
        </div>
        <div class="linkgp">
                <a href="index.php">Home</a>
                <a href="indoors.php">Indoor Plants</a>
                <a href="pots.php">Pots</a>
                <a href="packages.php">Packages</a>
                <a href="admin.php">Data</a>
            </div>
        </div>
        <div class="right">
            <img src="images/hangingpots2.png" alt="" class="pot pot1">
            <img src="images/hangingpots.png" alt="" class="pot pot2">
            
        </div>
        <img src="images/bottom.png" alt="">
       
       </header>
    <!-- header အဆုံး -->
    <!-- section အစ -->
    <section class="container">
    <div class="row my-2">
            <div class="col-md-3 col-10 my-2 offset-md-0 offset-1 cover_card offset-md-1">
                <div class="card">
                   
                    <img src="images/sun.png" class="img-fluid card-img-top"alt="">
                    <div class="card-body">
                    <p>During photosynthesis, plants trap light energy with their leaves. Plants use the energy of the sun to change water and carbon dioxide into a sugar called glucose. Glucose is used by plants for energy and to make other substances like cellulose and starch.</p>
                    </div>                
                </div>
            </div>

            <div class="col-md-3 col-10 my-2 offset-md-0 offset-1 cover_card offset-md-1">
                <div class="card">
                    <img src="images/soil.png" class="img-fluid card-img-top"alt="">
                    <div class="card-body">
                    <p>During photosynthesis, plants trap light energy with their leaves. Plants use the energy of the sun to change water and carbon dioxide into a sugar called glucose. Glucose is used by plants for energy and to make other substances like cellulose and starch.</p>
                    </div>
                    
                </div>
            </div>

            <div class="col-md-3 col-10 my-2 offset-md-0 offset-1 cover_card offset-md-1">
                <div class="card">
                    <img src="images/drop.png" class="img-fluid card-img-top"alt="">
                    <div class="card-body">
                    <p>During photosynthesis, plants trap light energy with their leaves. Plants use the energy of the sun to change water and carbon dioxide into a sugar called glucose. Glucose is used by plants for energy and to make other substances like cellulose and starch.</p>
                    </div>
                    
                </div>
            </div>

            <!-- <div class="col-md-3 col-5 cover_card">
                <div class="card">
                    <img src="images/heart.png" class="img-fluid card-img-top"alt="">
                    <div class="card-body">
                    <p>During photosynthesis, plants trap light energy with their leaves. Plants use the energy of the sun to change water and carbon dioxide into a sugar called glucose. Glucose is used by plants for energy and to make other substances like cellulose and starch.</p>
                    </div>
                </div>
            </div> -->


        </div>
        {{ $slot }}
         @livewireScripts
        {{-- <h3 class="subtitle my-3">Various Beautiful Pots</h3>
        <div class="row my-2 potrow">
            <div class="col-md-3">
                <div class="card potcard">
                <div class="bg">
                    <table>
                        <tr>
                            
                            <th colspan="2" class="text-center">PA00001</th>
                        </tr>                        
                        <tr>
                            <td>Size : </td>
                            <td>sm,m,l,xl</td>
                        </tr>
                        <tr>
                            <td>Color : </td>
                            <td>Red,Green,Blue,Purple</td>
                        </tr>                       
                        <tr>
                            <td>Material : </td>
                            <td>Plastic</td>
                        </tr>
                        <tr>
                            <td>Price : </td>
                            <td>.................Ks</td>
                        </tr>
                        <tr>
                            <td>Instock : </td>
                            <td>100</td>
                        </tr>
                    </table>
                    
                </div>
                    <img src="images/pot1.png" class="img-fluid" alt="">
                </div>
            </div>           
            
        </div> --}}
        <!-- <img src="images/sectioncover.jpg" alt=""> -->
    </section>
    <!-- section အဆုံး -->
    <!-- footer အစ  -->
    <footer>
    <div class="btngp">
        <a href="#"><img src="images/leave.png" alt=""><i class="fa-brands fa-facebook"></i></a>
        <a href="#"><img src="images/leave.png" alt=""><i class="fa-brands fa-twitter"></i></a>
        <a href="#"><img src="images/leave.png" alt=""><i class="fa-solid fa-circle-info"></i></a>
        <a href="#"><img src="images/leave.png" alt=""><i class="fa-brands fa-github"></i></a>        
    </div>
    <span class="footertext">Thank You For Your Visit !!!</span>
    </footer>
    <!-- footer အဆုံး -->
</body>
</html>
