{{-- primer fila --}}
<div class="mb-3">
 <label for="">Goal</label>
 <input type="number" wire:model.lazy="goal" class="short-inputs-form" value="{{ $goal }}" disabled>
</div>
{{-- segunda fila --}}
<div class="mb-3">
<label for="">total closed cases</label>
<input type="number" wire:model.lazy="total_closed_cases" class="short-inputs-form" value="{{ $total_closed_cases }}" disabled>
</div>

{{-- tercer fila --}}
<div>
 <label for="">Remaining</label>
 <input type="number" wire:model="remaining" class="short-inputs-form" value="{{ $remaining }}" disabled>
</div>

{{-- cuarta fila  --}}
@if ($show_tp)
<div>
    <label for="">TP</label>
    <input type="number" wire:model="tp" class="short-inputs-form" value="{{ $tp }}" disabled>
</div>
@endif
