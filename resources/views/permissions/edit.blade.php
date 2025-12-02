<x-layout>
<x-header>
    <title>Permission Editing</title>
</x-header>
<x-slot:style> 
    #h5Div{
         background: #005bb5;
    }
</x-slot:style>
    <section>
        <div class="card shadow-lg">
            <div class="card-header text-white" id="h5Div">
                <h5 class="mb-0">Admin_User Edit</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('permission.update',$permission->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required value="{{$permission->name}}">
                    </div>

                   

                    <div class="mb-3">
                        <label  class="form-label">Feature</label>
                        <div> 
                            <select class="form-select" name="feature_id" id="feature_id" aria-label="feature">
                                @foreach ($features as $feature)
                                     <option value="{{$feature->id}}"
                                         {{ $feature->id==$permission->feature->id?'selected':'' }}>
                                         {{$feature->name}}</option>
                                @endforeach
                           
                           
                            </select>
                        </div>
                        
                    </div>
                    
                    <button type="submit" class="btn btn-danger fw-bold px-3 py-1">Update</button>
                </form>
            </div>
        </div>
    </section>
<x-slot:scripts>
  </x-slot:scripts>
</x-layout>