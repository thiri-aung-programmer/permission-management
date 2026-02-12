<div>
    <h3 class="subtitle my-3">Various Beautiful Pots</h3>
    <div>


        <form action="" wire:submit.prevent="{{ $isEdit ? 'update' : 'store' }}"
            class="form p-4 w-75 m-auto bg-warning-subtle opacity-75 rounded rounded-5 shadow-lg">
            <h4 class="fw-bold text-center text-primary p-2 w-full">Manage Pots</h4>
            <div class="row gap-1 mb-2">
                <div class="col-md-4 col-10">
                    <label for="">Name</label>
                </div>
                <div class="col-md-7 col-10">
                    <input type="text" wire:model="name" class="form-control">
                </div>
            </div>

            <div class="row gap-1 mb-2">
                <div class="col-md-4 col-10">
                    <label for="">Images</label>
                </div>
                <div class="col-md-7 col-10">
                    <input type="file" wire:model="images" class="form-control">
                </div>
                @error('images')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="row gap-1 mb-2">
                <div class="col-md-4 col-10">
                    <label for="">Code</label>
                </div>
                <div class="col-md-7 col-10">
                    <input type="text" wire:model="code" class="form-control">
                </div>
            </div>

            <div class="row gap-1 mb-2">
                <div class="col-md-4 col-10">
                    <label for="">Color</label>
                </div>
                <div class="col-md-7 col-10">
                    {{-- <input type="text" wire:model="color" class="form-control"> --}}
                    <select id="color_id" wire:model="color_id" class="form-control">
                             <option value="">-- Select Color --</option>
                         @forelse ($colors as $color)
                             <option value="{{ $color->id }}">{{$color->name}}</option>
                         @empty
                            <option value="">-- No Record --</option>
                        @endforelse
                        {{-- <option value="Medium">Medium</option>
                        <option value="Large">Large</option>
                        <option value="Extra Large">Extra Large</option> --}}
                    </select>
                </div>
            </div>

            <div class="row gap-1 mb-2">
                <div class="col-md-4 col-10">
                    <label for="">Size</label>
                </div>
                <div class="col-md-7 col-10">
                    {{-- <input type="text" wire:model="size" class="form-control"> --}}
                    <select id="size_id" wire:model="size_id" class="form-control">
                            <option value="">-- Select Size --</option>
                         @forelse ($sizes as $size)
                            <option value="{{ $size->id }}">{{$size->name}}</option>
                         @empty
                            <option value="">-- No Record --</option>
                        @endforelse
                        {{-- <option value="Medium">Medium</option>
                        <option value="Large">Large</option>
                        <option value="Extra Large">Extra Large</option> --}}
                    </select>
                </div>
            </div>

            <div class="row gap-1 mb-2">
                <div class="col-md-4 col-10">
                    <label for="">Materials</label>
                </div>
                <div class="col-md-7 col-10">
                    {{-- <input type="text" wire:model="material" class="form-control"> --}}
                     <select id="material_id" wire:model="material_id" class="form-control">
                            <option value="">-- Select Material --</option>
                         @forelse ($materials as $material)
                            <option value="{{ $material->id }}">{{$material->name}}</option>
                        @empty
                            <option value="">-- No Record --</option>
                        @endforelse
                        {{-- <option value="Medium">Medium</option>
                        <option value="Large">Large</option>
                        <option value="Extra Large">Extra Large</option> --}}
                    </select>
                </div>
            </div>

            <div class="row gap-1 mb-2">
                <div class="col-md-4 col-10">
                    <label for="">Prices</label>
                </div>
                <div class="col-md-7 col-10">
                    <input type="text" wire:model="price" class="form-control">
                </div>
            </div>

            <div class="row gap-1 mb-2">
                <div class="col-md-4 col-10">
                    <label for="">Stock</label>
                </div>
                <div class="col-md-7 col-10">
                    <input type="text" wire:model="stock" class="form-control">
                </div>
            </div>

            <div class="text-center py-4">
                <input type="submit" class="btn btn-primary px-3 py-2 me-3" value="{{ $isEdit ? 'Update' : 'Insert' }}">
                <input type="reset" class="btn btn-danger px-3 py-2" value="Cancel">

            </div>
        </form>
    </div>
    @if (session()->has('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif
    <div class="row my-2 potrow">
        {{-- @dd($pots) --}}
        @forelse ($pots as $pot)
            <div class="col-md-3">
                <div class="card potcard">
                    <div class="bg pt-1">
                        <table class="w-[85%] m-auto">
                            <tr>
                                <th colspan="2" class="text-center">{{ $pot->name }} | {{ $pot->code }}</th>
                            </tr>
                            <tr>
                                <td>Size : </td>
                                <td>{{ $pot->size->name }}</td>
                            </tr>
                            <tr>
                                <td>Color : </td>
                                <td>{{ $pot->color->name }}</td>
                            </tr>
                            <tr>
                                <td>Material : </td>
                                <td>{{ $pot->material->name }}</td>
                            </tr>
                            <tr>
                                <td>Price : </td>
                                <td>{{ $pot->price }} Ks</td>
                            </tr>
                            <tr>
                                <td>Instock : </td>
                                <td>{{ $pot->stock }}</td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <div class="text-center">
                                        <button wire:click="edit({{ $pot->id }})"
                                            class="me-2 px-2 py-1 bg-blue-600 hover:bg-blue-700 text-white rounded rounded-3"
                                            title="Edit"><i class="bi bi-pencil-square"></i></button>
                                        <button wire:click="delete({{ $pot->id }})"
                                            onclick="return confirm('Are You Sure To Delete This Post?')"
                                            class="px-2 py-1 bg-red-500 hover:bg-red-600 text-white rounded rounded-3"
                                            title="Delete"><i class="bi bi-trash-fill"></i></button>
                                    </div>
                                </td>
                            </tr>
                        </table>

                    </div>
                    {{-- <img src="images/{{$pot->images}}" class="img-fluid" alt=""> --}}
                    <img src="{{ asset('storage/' . $pot->images) }}" class="img-fluid image" alt="No Img Selected">
                </div>
            </div>
        @empty
            <div>No Record Found</div>
        @endforelse
    </div>
</div>
