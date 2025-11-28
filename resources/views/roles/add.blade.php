@extends('layouts.app')
@section('head')
<title>Role Inserting</title>

@endsection


@section('content')
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>    
                @foreach ( $errors->all() as $error )
                    <li>{{ $error }}</li>
                
                @endforeach
            </ul>
        </div>
    @endif    
    <section>
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Please Role Insert!!!</h5>
            </div>
            <div class="card-body">
                <form action="{{ URL('role/create') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                    </div>
                    
                   
                    
                    <button type="submit" class="btn btn-success fw-bold px-3 py-1">Submit</button>
                </form>
            </div>
        </div>
    </section>
@endsection