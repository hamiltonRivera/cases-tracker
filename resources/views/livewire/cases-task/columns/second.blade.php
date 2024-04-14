{{-- primer fila --}}
<div class="mb-3">
 <label for="">Comment</label>
<textarea id="message" wire:model='comment' rows="4" class="text-area" placeholder="Write here..."></textarea>
@error('comment')
<p class="error">{{ $message }}</p>
@enderror
</div>

{{-- segunda fila --}}
<div class="mb-3">
<label for="">Status</label>
 <select wire:model="task_status" class="select-formularios form-select" aria-label="Default select example">
    <option selected>Select an option</option>
    @foreach ($status as $item)
    <option value="{{ $item }}">{{ $item }}</option>
    @endforeach
 </select>
 @error('task_status')
<p class="error">{{ $message }}</p>
@enderror
</div>

{{-- tercer fila --}}
<div class="mb-3">
    <label for="">Priority</label>
    <select wire:model="priority" class="select-formularios form-select" aria-label="Default select example">
        <option selected>Select an option</option>
        @foreach ($priorities as $priority)
        <option value="{{ $priority }}">{{ $priority }}</option>
        @endforeach
     </select>
     @error('priority')
    <p class="error">{{ $message }}</p>
    @enderror
</div>
