
{{-- Form အပိုင်း --}}
        <form  wire:submit.prevent="store"
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