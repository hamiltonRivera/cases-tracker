{{-- primer fila --}}
<div>
    <label for="">Delete within a time frame</label>
</div>
{{-- segunda fila --}}
<div class="mb-3">
    <div class="relative max-w-sm">
        <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
          <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
          </svg>
        </div>
        <input datepicker type="date" wire:model="start_date" class="searching" placeholder="Select date">
        @error('start_date')
        <p class="error">{{ $message }}</p>
        @enderror
      </div>
</div>

{{-- tercer fila --}}
<div class="mb-3">
    <div class="relative max-w-sm">
        <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
          <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
          </svg>
        </div>
        <input datepicker type="date" wire:model="end_date" class="searching" placeholder="Select date">
        @error('end_date')
        <p class="error">{{ $message }}</p>
        @enderror
      </div>
</div>

{{-- tercer fila --}}
<div>
<button class="rose-bottom" wire:click="customDestroy()"><i class="fa-solid fa-bomb"></i> Delete within a time frame</button>
</div>

@if (session()->has('Field'))

                  <div class="bg-yellow-100 rounded-lg py-5 px-6 mb-3 text-base text-yellow-700 inline-flex items-center w-full" style="width: 80%">

                      {{ session('Field') }}

                  </div>

        @endif
