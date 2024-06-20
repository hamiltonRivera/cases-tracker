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
    public $goal = 77, $remaining, $total_closed_cases;
    public $start_date, $end_date, $tp = 0, $show_tp = false;
    public function render()
    {
        $cases = CaseTracker::orderBy('id', 'asc')
            ->where('date', 'like', '%' . $this->search . '%')->paginate(6);

        $this->total_closed_cases = CaseTracker::sum('count_per_day');
        $this->remaining = $this->goal - $this->total_closed_cases;
        $this->date = now();

        if($this->total_closed_cases > $this->goal)
        {
            $this->show_tp = true;
            $this->remaining = 0;
            $this->tp = $this->total_closed_cases - $this->goal;
        }
        return view('livewire.cases-tracker.cases-tracker', compact('cases'));
    }

    public function refresh()
    {
        return redirect('/dashboard');
    }

    public function store()
    {
        $this->validate([
            'date' => 'required|date|unique:case_trackers,date,except,id',
            'count_per_day' => 'required|numeric'
        ]);

        $case = new CaseTracker();
        $case->date = $this->date;
        $case->count_per_day = $this->count_per_day;
        $case->save();
        $this->updatingTp();
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


            $this->updatingTp();
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

    public function updatingTp()
    {
        if($this->total_closed_cases > $this->goal)
        {
            $this->show_tp = true;
            $this->remaining = 0;
            $this->tp = $this->total_closed_cases - $this->goal;
        }
    }
}
