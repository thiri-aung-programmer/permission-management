<x-layout>
<x-header>
    <title>Dashboard</title>
</x-header>
<x-slot:style>   
</x-slot:style>
    @if (session('loggedIn'))
    <div class="alert alert-danger">
       
        <h3 class="text-center"> {{ session('loggedIn') }}</h3>
    </div>
@endif
</x-layout>
