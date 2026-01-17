<div>

    <form wire:submit.prevent="update"
        class="form p-4 w-75 m-auto bg-warning-subtle opacity-75 rounded rounded-5 shadow-lg">
        <h4 class="fw-bold text-center text-primary p-2 w-full">Manage Pots</h4>

        @if ($images)
            <img src="{{ $images->temporaryUrl() }}">
        @endif

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
                <label for="color">Color</label>
            </div>
            <div class="col-md-7 col-10">
                <select wire:model="color_id" id="color" class="form-select">
                    <option value="">Select Color</option>
                    @foreach($colors as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row gap-1 mb-2">
            <div class="col-md-4 col-10">
                <label for="size">Size</label>
            </div>
            <div class="col-md-7 col-10">
                <select wire:model="size_id" id="size" class="form-select">
                    <option value="">Select Size</option>
                    @foreach($sizes as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row gap-1 mb-2">
            <div class="col-md-4 col-10">
                <label for="material">Materials</label>
            </div>
            <div class="col-md-7 col-10">
                <select wire:model="material_id" id="material" class="form-select">
                    <option value="">Select Material</option>
                    @foreach($materials as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
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
            <input type="submit" class="btn btn-primary px-3 py-2 me-3" value="Submit">
            <input type="reset" class="btn btn-danger px-3 py-2" value="Cancel">

        </div>
    </form>
</div>