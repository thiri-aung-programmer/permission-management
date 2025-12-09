<x-layout>
<x-header>
    <title>Admin Users</title>
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

     <h2 class="h2title">Admin-users</h2>
    <form action="{{ route('admin-user.view') }}" method="GET">
        <div class="search">
            <input type="text" placeholder="Search" id="search" name="search" value="{{ request('search') }}">
            <Button type="submit" class="btn">Search</Button>
            <a href="{{ route('admin-user.add') }}" class="addStudentButton ms-3" title="Add Admin-user"><i class="fa-solid fa-plus"></i></a>
        </div>
    </form>
    <div class="m-auto w-75">
        <table class="table table-striped table-bordered">
            <thead class="table-dark text-center">
                <tr>
                    <th>ID</th>
                    <th>Name</th> 
                    <th>User Name</th>         
                    <th>Email</th>   
                    <th>Phone</th>
                    <th>Address</th>  
                    <th>Gender</th>  
                    <th>Role</th>        
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                 @foreach($adminusers as $adminuser)
                <tr>
                    <td class="text-center">{{ $adminuser->id }}</td>
                    <td>{{$adminuser->name }}</td>
                    <td>{{$adminuser->username }}</td>
                    <td>{{$adminuser->email }}</td>
                    <td>{{$adminuser->phone }}</td>
                    <td>{{$adminuser->address }}</td>
                    <td>{{$adminuser->gender }}</td>
                    <td>{{$adminuser->role->name ?? 'No Role' }}</td>
               
                    <td class="text-center">
                        <a href="{{ route('admin-user.edit',$adminuser->id) }}" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                            <form action="{{ route('admin-user.delete', $adminuser->id) }}" method="POST" onsubmit="return confirm('Are You Sure To delete this user?')" style="display:inline">
                                 @csrf                      
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="bi bi-trash3-fill"></i></button>
                            </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="paginationDiv w-100">
         {{ $adminusers->
            appends(request()->query())
            ->links('pagination::bootstrap-5') }}
    </div>

    <x-slot:scripts>
    </x-slot:scripts>
</x-layout>