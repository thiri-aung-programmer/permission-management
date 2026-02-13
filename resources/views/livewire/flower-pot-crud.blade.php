<div>
    <h3 class="subtitle my-3">Various Beautiful Pots</h3>

    <div>

        {{-- Form အပိုင်း --}}
        @if($isEdit)
        {{-- edit အပိုင်း  --}}
            <livewire:flower-pots.pot-edit />
              
        @else
        {{-- cre‌ate အပိုင်း --}}
            <livewire:flower-pots.pot-create />
           
        @endif
    </div>
    @if (session()->has('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif
    {{-- List အပိုင်း --}}
    <livewire:flower-pots.pot-list />
</div>
