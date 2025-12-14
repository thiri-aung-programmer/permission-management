<x-layout>
<x-header>
    <title>Role Inserting</title>
</x-header>
<x-slot:style>    
   

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
    padding:20px;
    background-color:#005bb5;
    font-weight:bold;
    color:white;
    border:1px solid #005bb5;
    display:inline-block;
    border-radius:5px;
}
.addStudentButton:hover{
    background-color:#004080;
}
.h2title{
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
    padding:10px 20px;
    background-color:#005bb5;
    color:white;
    border:none;
}
.search button:hover{
    background-color:#004088;
}
</x-slot:style>
{{-- {{ print_r($permissionbyrole) }} --}}
    {{-- {{ dd($permissionbyrole ) }} --}}
    <h2 class="h2title">Permission By Roles</h2>
<form action="{{ URL('role') }}" method="GET">
    <div class="search">
    <input type="text" placeholder="Search" id="search" name="search" value="{{ request('search') }}">
    <Button type="submit" class="btn">Search</Button>
    @can('createPermission', Auth::user())
    <a href="{{ URL('role/add') }}" class="addStudentButton ms-3" title="Add Role"><i class="fa-solid fa-plus"></i></a>
    @endcan
</div>
</form>
<div class="m-auto w-50">
    <table class="table table-striped table-bordered">
    <thead class="table-dark text-center">
        <tr>
        <th>ID</th>
        <th>Role Name</th>       
        <th>Permission Name</th>
        <th>Feature Name</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>

       
             @foreach ($permissionbyrole as $item)
            <tr>
                <td>{{ $item['id'] }}</td>
                <td>{{ $item['role']['name'] }}</td>
                <td>{{ $item['permission']['name'] }}</td>
                <td>{{ $item['permission']['feature']['name'] }}</td>
            
                <td class="text-center">
                    {{-- <a href="{{ URL('role/edit',$item['id']) }}" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                    <form action="{{ route('role.delete', $item['id']) }}" method="POST" onsubmit="return confirm('Are You Sure To delete this role?')" style="display:inline">
                        @csrf                      
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="bi bi-trash3-fill"></i></button>
                    </form> --}}
                     {{-- <a href="{{ route('role.permissions',$item['id']) }}" class="btn btn-primary"><i class="fa-solid fa-key"></i></a> --}}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>
<div class="paginationDiv w-100">
    {{-- {{ $permissionbyrole->
    appends(request()->query())
    ->links('pagination::bootstrap-5') }} --}}
</div>


    <x-slot:scripts>
    </x-slot:scripts>
</x-layout>