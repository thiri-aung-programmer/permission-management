<x-layout>
<x-header>
    <title>Feature Editing</title>
</x-header>
<x-slot:style> 
    #h5Div{
         background: #005bb5;
    }
</x-slot:style>
    <section>
        <div class="card shadow-lg">
            <div class="card-header text-white" id="h5Div">
                <h5 class="mb-0">Feature Edit</h5>
            </div>
            <div class="card-body">
                <form action="{{ URL('feature/update',$feature->id) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required value="{{$feature->name}}">
                    </div>
                    
                    <button type="submit" class="btn btn-danger fw-bold px-3 py-1">Update</button>
                </form>
            </div>
        </div>
    </section>
<x-slot:scripts>
  </x-slot:scripts>
</x-layout>