<?php

namespace App\Livewire\CasesTracker;

use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;
use Livewire\WithPagination;
use App\Models\CaseTracker;

class CasesTracker extends Component
{
    use WithPagination;

    public $search = '';
    public $date, $count_per_day, $selected_id;
    public $goal = 58, $remaining, $total_closed_cases;
    public $start_date, $end_date;
    public function render()
    {
        $cases = CaseTracker::orderBy('id', 'asc')
            ->where('date', 'like', '%' . $this->search . '%')->paginate(10);

        $this->total_closed_cases = CaseTracker::sum('count_per_day');
        $this->remaining = $this->goal - $this->total_closed_cases;
        return view('livewire.cases-tracker.cases-tracker', compact('cases'));
    }

    public function refresh()
    {
        return redirect('/dashboard');
    }

    public function store()
    {
        $this->validate([
            'date' => 'required|date',
            'count_per_day' => 'required|numeric'
        ]);

        $case = new CaseTracker();
        $case->date = $this->date;
        $case->count_per_day = $this->count_per_day;
        $case->save();
        Alert::success('Case', 'Case registered successfully');
        $this->refresh();
    }

    public function edit($id)
    {
        $record = CaseTracker::findOrFail($id);
        $this->selected_id = $id;
        $this->date = $record->date;
        $this->count_per_day = $record->count_per_day;
    }

    public function update()
    {
        if ($this->selected_id) {
            $record = CaseTracker::findOrFail($this->selected_id);
            $record->update([
                'date' => $this->date,
                'count_per_day' => $this->count_per_day
            ]);

            Alert::success('Case', 'Case updated successfully');
            $this->refresh();
        }
    }

    public function destroy($id)
    {
        CaseTracker::destroy($id);
        Alert::warning('Case', 'You have deleted the record');
        $this->refresh();
    }

    public function customDestroy()

    {
        if ($this->start_date == null || $this->end_date == null) {
            session()->flash('Field', '*One or two fields are empties');
            return false;
        } else {

        // Obtener los registros dentro del rango de fechas
        $recordsToDelete = CaseTracker::whereBetween('date', [$this->start_date, $this->end_date])->get();
         CaseTracker::destroy($recordsToDelete);
        // Mostrar un mensaje de confirmación
        Alert::warning('Cases', 'You have deleted records within the specified time interval');
        $this->refresh();
        }
    }

    public function remaining()
    {
        $this->remaining = $this->goal - $this->total_closed_cases;
    }
}
