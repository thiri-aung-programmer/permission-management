@extends('layouts.app')
@section('head')

<title>Role Edit</title>

@endsection

@section('styles')
.h5background{
      background: #005bb5;
}
@endsection

@section('content')
    <section>
        <div class="card shadow-lg">
            <div class="card-header h5background text-white">
                <h5 class="mb-0">Role Edit</h5>
            </div>
            <div class="card-body">
                <form action="{{ URL('role/update',$role->id) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required value="{{$role->name}}">
                    </div>
                    
                    <button type="submit" class="btn btn-danger fw-bold px-3 py-1">Update</button>
                </form>
            </div>
        </div>
    </section>
@endsection