<x-layout>
<x-header>
    <title>Permissions</title>
</x-header>
<x-slot:style>    
{{-- <style> --}}
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
{{-- </style> --}}
</x-slot:style>

     <h2 class="h2title">Permissions</h2>
    <form action="{{ route('permission.index') }}" method="GET">
        <div class="search">
            <input type="text" placeholder="Search" id="search" name="search" value="{{ request('search') }}">
            <Button type="submit" class="btn">Search</Button>
            @can('createPermission', Auth::user())
            <a href="{{ route('permission.create') }}" class="addStudentButton ms-3" title="Add Permission"><i class="fa-solid fa-plus"></i></a>
            @endcan
        </div>
    </form>
    <div class="m-auto w-75">
        <table class="table table-striped table-bordered">
            <thead class="table-dark text-center">
                <tr>
                    <th>ID</th>
                    <th>Name</th> 
                    <th>Feature Name</th>      
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                 @foreach($permissions as $permission)
                <tr>
                    <td class="text-center">{{ $permission->id }}</td>
                    <td>{{$permission->name }}</td>                   
                    <td>{{$permission->feature->name ?? 'No Feature' }}</td>
               
                    <td class="text-center">
                        @can('updatePermission', Auth::user())
                        <a href="{{ route('permission.edit',$permission->id) }}" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                        @endcan
                        @can('deletePermission', Auth::user())
                            <form action="{{ route('permission.destroy', $permission->id) }}" method="POST" onsubmit="return confirm('Are You Sure To delete this permission?')" style="display:inline">
                                 @csrf                      
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="bi bi-trash3-fill"></i></button>
                            </form>
                        @endcan
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="paginationDiv w-100">
         {{ $permissions->
            appends(request()->query())
            ->links('pagination::bootstrap-5') }}
    </div>

    <x-slot:scripts>
    </x-slot:scripts>
</x-layout>