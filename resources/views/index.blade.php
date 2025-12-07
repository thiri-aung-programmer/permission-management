<x-welcome headertitle="Welcome">
    <form action="/login" method="post" class="form mt-2 p-5 bg-dark-subtle w-50 m-auto text-center rounded rounded-2 shadow">
                <h1 class="text-center text-light bg-danger w-100 m-auto mt-3 p-2 rounded">Please Login First!!!</h1>
                <div class="row p-2">
                    <input type="text" name="email" id="" class="form-control mb-2" placeholder="abc@gmail.com" require>
                    <input type="password" name="password" id="" class="form-control mb-2" placeholder="*******" require>

                    

                    <input type="submit" value="Login" class="btn btn-danger">
                </div>
            </form>
                        <?php if(isset($error)){
                            echo $error;
                        }
                        ?>
</x-welcome>