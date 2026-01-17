<div>
    <h3 class="subtitle my-3">Various Beautiful Pots</h3>

    <!-- # this is form -->

    <!-- # this will be conditional render -->
    @if ($isEditing)
        Editing
        <livewire:flower-pots.pot-edit />
    @else
        Creating
        <livewire:flower-pots.pot-create />
    @endif

    @if(session()->has('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif


    <!-- # this is list -->
    <livewire:flower-pots.pot-list />
</div>