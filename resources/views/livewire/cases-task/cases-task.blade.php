<div>
   <div class="lg:grid grid-cols-3 sm:grid-col-1 ml-3 mt-4">
     {{-- primer columna --}}
     <div>
       @include('livewire.cases-task.columns.first')
     </div>

     {{-- segunda columna --}}
     <div>
        @include('livewire.cases-task.columns.second')
     </div>

     {{-- tercer columna --}}
     <div>
        @include('livewire.cases-task.columns.third')
     </div>
   </div>
   <br>
     <hr>
   <div class="mb-3 mt-3">
     @include('livewire.cases-task.search')
   </div>

   <div>
    @include('livewire.cases-task.table')
   </div>
</div>
