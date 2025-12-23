@vite(['resources/js/app.js', 'resources/css/app.css'])
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PicoSBS | HomePage</title>   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    
    
</head>
<body class="">
    <div class="min-h-screen flex flex-col">
        <div class="relative">
            <img src="../images/pico_logo.png" alt="" class="z-0 w-[70px] animate-circle-reveal duration-200 rotate-45  absolute      top-12          left-5">
            <img src="../images/pico_logo.png" alt="" class="z-0 w-[70px] animate-display-off duration-200 rotate-12  absolute      top-12          left-[25%]">
            <img src="../images/pico_logo.png" alt="" class="z-0 w-[70px] animate-turnaround duration-200 rotate-[30%]  absolute   top-12          left-[75%]">
            <img src="../images/pico_logo.png" alt="" class="z-0 w-[70px] animate-circle-reveal duration-200 -rotate-45  absolute     top-48          left-[85%]">

            <img src="../images/pico_logo.png" alt="" class="z-0 w-[70px] animate-turnaround duration-200 -rotate-45  absolute      top-80          left-40">
            <img src="../images/pico_logo.png" alt="" class="z-0 w-[70px] animate-circle-reveal duration-200 rotate-[-28%] absolute   top-72          left-[35%]">
            <img src="../images/pico_logo.png" alt="" class="z-0 w-[70px] animate-display-off duration-200 rotate-90  absolute      top-96          left-[75%]">
            <img src="../images/pico_logo.png" alt="" class="z-0 w-[70px] animate-turnaround duration-200 rotate-90  absolute      top-32          left-[60%]">

            <img src="../images/pico_logo.png" alt="" class="z-0 w-[70px] animate-circle-reveal duration-200 rotate-45  absolute      bottom-8          left-5">
            <img src="../images/pico_logo.png" alt="" class="z-0 w-[70px] animate-display-off duration-200 rotate-12 absolute       bottom-8          left-[25%]">
            <img src="../images/pico_logo.png" alt="" class="z-0 w-[70px] animate-turnaround duration-200 rotate-[-22%]  absolute      bottom-8          left-[45%]">
            <img src="../images/pico_logo.png" alt="" class="z-0 w-[70px] animate-display-off duration-200 rotate-90  absolute      bottom-8          left-[85%]">
        </div>
        <div class="text-center w-[90%] grid place-items-center m-auto relative">
            <button id="openBtn" class="z-0 py-3 rounded-full font-bold bg-blue-900 text-gray-50  border-4 border-spacing-10 shadow-2xl shadow-blue-600 hover:border-black hover:bg-gray-300 hover:text-gray-950 transition-all duration-300 px-[50px]">
                Login
            </button>
            <div class="w-1/3 bg-gray-50 p-6 rounded-lg shadow-lg absolute hidden z-50" id="mymodal">
                <div class="flex justify-end cursor-pointer" id="closebtn">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8 text-gray-500 bg-gray-50  fw-bold  w-10 h-10 p-2 rounded-full shadow-xl">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                </div>
                
                <form action="/login" method="post" class="p-4">
                    @csrf
                    <div class="flex flex-col space-y-4">
                        <input type="email" name="email" id="email" placeholder="example@gmail.com" require class="mb-2 rounded-full px-3 py-2 form-control border-none bg-white shadow-lg outline-none">
                        <input type="password" name="password" id="password" placeholder="ooooooooooo" require class="py-2 px-3 rounded-full form-control border-none bg-white shadow-lg outline-none">
                    </div>
                    <div class="flex gap-4 justify-end mt-3">
                    <input type="submit" value="Login" class="btn btn-primary rounded-full">
                    {{-- <button class="btn btn-primary rounded-full" id="btnConfirm">Confirm</button> --}}
                    <button class="btn btn-danger rounded-full" id="btnCancel">Cancel</button>
                    </div>
                </form>
                
            </div>
        </div>

          @if ($errors->any())
                    <div class="alert alert-danger items-center w-50 m-auto">
                        <ul class="list-unstyled w-75 m-auto fw-bold">
                           
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
         @endif
    </div>
    
    <script>
        openBtn.addEventListener("click",()=>{
            mymodal.classList.remove("hidden");
        });
        closebtn.addEventListener("click",()=>{
            mymodal.classList.add("hidden");
        });
       btnConfirm.addEventListener("click",()=>{
            mymodal.classList.add("hidden");
        });
        btnCancel.addEventListener("click",()=>{
            mymodal.classList.add("hidden");
        });
    </script>
</body>
</html>