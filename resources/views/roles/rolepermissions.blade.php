<x-layout>
<x-header>
   <title>Permission by Role Inserting</title>
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
                <h5 class="mb-0">Please  Choose Permission Role Insert!!!</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('role.updatePermission',$role) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Role Name</label>
                        <input type="text" disabled class="form-control" id="name" name="name" value="{{ $role->name }}">
                    </div>

                    {{-- <div>Assigned Permission : {{ print_r($assigned) }}</div> --}}
                    <div class="mb-3 w-75 m-auto p-4 bg-primary-subtle">
                        <h3 class="text-success text-center fw-bolder">Permissions & Feature</h3>
                        <div class="row justify-content-center">
                            @foreach($permissions as $permission)
                                <div class="col-md-3 py-1 rounded rounded-1 bg-light m-1">
                                  

                                    <input type="checkbox" name="permissions[]" value="{{ $permission->id }}"
                                    {{ in_array($permission->id, $assigned) ? 'checked' : '' }}>
                                        {{ $permission->name }} , {{ $permission->feature->name }}
                                </div>
                                {{-- {{ old('published', $post->published ?? 0) ? 'checked' : '' }} --}}
                            @endforeach
                        </div>
                    </div>
                    
                    <div class="text-center">
                        <button type="submit" class="btn btn-success fw-bold px-3 py-1">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
<x-slot:scripts>
  </x-slot:scripts>
</x-layout>