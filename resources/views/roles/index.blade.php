@extends('layouts.app')
@section('head')
<title>Roles</title>

@endsection
@section('styles')
<style>
table{
    width:50%;
    margin:auto;
    border-collapse:collapse;
}
table,th,td{
    border:1px solid black;
}
th,td{
    padding:10px;
  
}
th{
    background-color:#005bb5;
    color:white;
    text-align: center;
}
td{
    text-align: left;
}
tr:nth-child(even){
    background-color:#f2f2f2;
}
tr:hover{
    background-color:#f5f5f5;
}
h2{
    color:#005bb5;
    text-align:center;
}
.search{
    display:flex;
    justify-content:center;
    margin-bottom:20px;    
}
.search input{
    padding:10px;
    width:50%;
    margin-right:10px;
}
.search button{
    padding:10px;
    background-color:#005bb5;
    color:white;
    border:none;
}
.search button:hover{
    background-color:#004088;
}

.editButtton{
    background-color:#4CAF50;
    color:white;
    padding:5px 10px;
    text-align:center;
    text-decoration:none;
    display:inline-block;
    border-radius:5px;
}
.editButton:hover{
    background-color:#45a049;
    color:black;
}
.deleteButtton{
    background-color:#f44336;
    color:white;
    padding:5px 10px;
    text-align:center;
    text-decoration:none;
    display:inline-block;
    border-radius:5px;
}
.deleteButton:hover{
    background-color:#da190b;
    color:black;
}

.addStudentButton{
    padding:10px 20px;
    background-color:#005bb5;
    font-weigtht:bold;
    color:white;
    border:1px solid #005bb5;
    display:inline-block;
    border-radius:5px;
}
.addStudentButton:hover{
    background-color:#004080;
}
</style>
@endsection
@section('content')
<h2>Roles</h2>
<form action="{{ URL('role') }}" method="GET">
    <div class="search">
    <input type="text" placeholder="Search" id="search" name="search" value="{{ request('search') }}">
    <Button type="submit">Search</Button>
    <a href="{{ URL('role/add') }}" class="addStudentButton ms-3" title="Add Role"><i class="fa-solid fa-plus"></i></a>
</div>
</form>
<table>
    <thead>
        <tr>
        <th>ID</th>
        <th>Name</th>       
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
        @foreach($roles as $role)
            <tr>
                <td>{{ $role->id }}</td>
                <td>{{$role->name }}</td>
               
                <td class="text-center">
                    <a href="{{ URL('role/edit',$role->id) }}" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                    <form action="{{ route('role.delete', $role->id) }}" method="POST" onsubmit="return confirm('Are You Sure To delete this role?')" style="display:inline">
                        @csrf                      
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="bi bi-trash3-fill"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<div class="paginationDiv w-100">
    {{ $roles->
    appends(request()->query())
    ->links('pagination::bootstrap-5') }}
</div>

@endsection