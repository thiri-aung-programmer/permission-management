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
                <form action="{{ route('permission.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                    </div>
                   

                    <div class="mb-3">
                        <label  class="form-label">Feature</label>
                        <div> 
                            <select class="form-select" name="feature_id" id="feature_id" aria-label="Feature">
                                @foreach ($features as $feature)
                                     <option value="{{$feature->id}}"
                                         {{ old('feature_id')==$feature->id?'selected':'' }}>
                                         {{$feature->name}}</option>
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