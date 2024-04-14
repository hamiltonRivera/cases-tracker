{{-- primer fila --}}
<div class="mb-3">
 <label for="">Date</label>
 <div class="relative max-w-sm">
    <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
      <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
        <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
      </svg>
    </div>
    <input datepicker type="date" wire:model="date" class="searching" placeholder="Select date" required>
  </div>
  @error('date')
        <p class="error">{{ $message }}</p>
@enderror
</div>

{{-- segunda fila --}}
<div class="mb-3">
 <label for="">Admin case</label>
 <input type="text" wire:model='admin' placeholder="Admin:" class="short-inputs-form" required>
 @error('admin')
 <p class="error">{{ $message }}</p>
@enderror
</div>

{{-- tercer fila --}}
<div>
    <label for="">Case #</label>
    <input type="number" wire:model='case_number' class="short-inputs-form" required placeholder="Case Number:">
    @error('case_number')
    <p class="error">{{ $message }}</p>
    @enderror
</div>
