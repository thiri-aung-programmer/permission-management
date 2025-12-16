<x-layout-edit>
<x-header>
   <title>Role Edit</title>
</x-header>
<x-slot:style> 
    #h5Div{
         background: #005bb5;
    }
</x-slot:style>
    <section>
        <div class="card shadow-lg">
            <div class="card-header  text-white" id="h5Div">
                <h5 class="mb-0">Role Edit</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('role.update',$role) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required value="{{$role->name}}">
                    </div>
                    
                    <button type="submit" class="btn btn-danger fw-bold px-3 py-1">Update</button>
                    <a href="#" class="btn btn-danger fw-bold px-3 py-1 ms-2" onclick="history.back()">Cancel</a>
                </form>
            </div>
        </div>
    </section>
<x-slot:scripts>
  </x-slot:scripts>
</x-layout-edit>