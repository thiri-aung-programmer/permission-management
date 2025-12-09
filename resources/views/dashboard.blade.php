<x-layout>
    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
        <h3 class="text-center">You are already Login !!!!</h3>
    </div>
@endif
</x-layout>
