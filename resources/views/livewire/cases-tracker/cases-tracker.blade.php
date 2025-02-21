<div>
    <div class="lg:grid grid-cols-3 sm:grid-col-1">
        {{-- primer columna --}}
        <div>
         @include('livewire.cases-tracker.firstColumn')
        </div>
        {{-- segunda columna --}}
        <div class="ml-6">
            @include('livewire.cases-tracker.secondColumn')
        </div>
        {{-- tercer columna --}}
        <div>
            @include('livewire.cases-tracker.thirdColumn')
        </div>
    </div>

           <hr>
        <div class="mb-3 mt-3">
            @include('livewire.cases-tracker.search')
        </div>

    <div>
        @include('livewire.cases-tracker.table')
    </div>
</div>
