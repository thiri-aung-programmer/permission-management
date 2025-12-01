<x-layout>
<x-header>
    <title>Admin User Inserting</title>
</x-header>
<x-slot:style> 
    #h5Div{
         background: #005bb5;
    }
</x-slot:style>


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
            <div class="card-header text-white" id="h5Div">
                <h5 class="mb-0">Please Feature Insert!!!</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin-user.create') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">UserName</label>
                        <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="address" class="form-control" id="address" name="address" value="{{ old('address') }}">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Password</label>
                        <input type="password" class="form-control" id="pswd" name="pswd" value="{{ old('pswd') }}">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="pswd_confirmation" name="pswd_confirmation" value="{{ old('pswd_confirmation') }}">
                    </div>


                    <div class="mb-3">
                        <label  class="form-label">Is_Active</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="is_active" id="active" value="1"
                                {{ old('is_active')=='1'?'checked':'' }}>
                                <label class="form-check-label" for="active" >Active</label>
                            </div>
                        </div>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="is_active" id="un_active" value="0"
                                {{ old('is_active')=='0'?'checked':'' }}>
                                <label class="form-check-label" for="un_active" >Un_active</label>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Gender</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="male" value="1"
                                {{ old('gender')=='1'?'checked':'' }}>
                                <label class="form-check-label" for="male" >Male</label>
                            </div>
                        </div>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="female" value="0"
                                {{ old('gender')=='0'?'checked':'' }}>
                                <label class="form-check-label" for="female" >Female</label>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Role</label>
                        <div> 
                            <select class="form-select" name="role_id" id="role_id" aria-label="Role">
                                @foreach ($roles as $role)
                                     <option value="{{$role->id}}"
                                         {{ old('role_id')==$role->id?'selected':'' }}>
                                         {{$role->name}}</option>
                                @endforeach
                           
                           
                            </select>
                        </div>
                        
                    </div>
                    
                    <button type="submit" class="btn btn-success fw-bold px-3 py-1">Submit</button>
                </form>
            </div>
        </div>
    </section>
  <x-slot:scripts>
  </x-slot:scripts>
</x-layout>