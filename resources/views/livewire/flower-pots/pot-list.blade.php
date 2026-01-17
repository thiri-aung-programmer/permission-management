<div class="row my-2 potrow">
    {{-- @dd($pots) --}}
    @forelse ($pots as $pot)

        <div class="col-md-3">
            <div class="card potcard">
                <div class="bg pt-1">

                    <table class="w-[85%] m-auto">
                        <tr>
                            <th colspan="2" class="text-center">{{ $pot->name }} | {{$pot->code}}</th>
                        </tr>
                        <tr>
                            <td>Size : </td>
                            <td>{{$pot->size}}</td>
                        </tr>
                        <tr>
                            <td>Color : </td>
                            <td>{{$pot->color}}</td>
                        </tr>
                        <tr>
                            <td>Material : </td>
                            <td>{{$pot->material}}</td>
                        </tr>
                        <tr>
                            <td>Price : </td>
                            <td>{{$pot->price}} Ks</td>
                        </tr>
                        <tr>
                            <td>Instock : </td>
                            <td>{{$pot->stock}}</td>
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

                <img src="{{ asset('storage/' . $pot->images) }}" class="img-fluid" alt="">
            </div>
        </div>
    @empty
        <div>No Record Found</div>

    @endforelse
</div>