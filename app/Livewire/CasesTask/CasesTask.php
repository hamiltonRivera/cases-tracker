<?php

namespace App\Livewire\CasesTask;

use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;
use Livewire\WithPagination;
use App\Models\Task;
class CasesTask extends Component
{
    use WithPagination;

    public $search = '';
    public $admin, $date, $case_number, $comment, $task_status, $selected_id, $priority;
    public $start_date, $end_date;

    public $status = [
        'Pending', 'Done'
    ];

    public $priorities = [
        'First',
        'Important',
        'Most Important'
    ];

    public function render()
    {
        $cases = Task::orderBy('date', 'asc')
        ->orderBy('priority', 'asc')
        ->orderByRaw("FIELD(task_status, 'Pending')")
        ->whereAny(['admin', 'date', 'case_number', 'task_status', 'comment', 'priority'], 'like', '%' . $this->search . '%')->paginate(8);
        return view('livewire.cases-task.cases-task', compact('cases'));
    }

    public function refresh()
    {
        return redirect('/task');
    }

    public function store()
    {
        $this->validate([
            'admin' => 'required|string',
            'date' => 'required|date',
            'case_number' => 'required|numeric',
            'comment' => 'required|string',
            'task_status' => 'required|string',
            'priority' => 'required|string'
        ]);

        $case = new Task();
        $case->admin = ucwords(strtolower($this->admin));
        $case->date = $this->date;
        $case->case_number = $this->case_number;
        $case->comment = ucfirst(strtolower($this->comment));
        $case->task_status = "Pending";
        $case->priority = $this->priority;
        $case->save();
        Alert::success('Task', 'Task registered successfully');
        $this->refresh();

    }

    public function edit($id)
    {
        $record = Task::findOrFail($id);
        $this->selected_id = $id;
        $this->admin = $record->admin;
        $this->date = $record->date;
        $this->case_number = $record->case_number;
        $this->comment = $record->comment;
        $this->task_status = $record->task_status;
        $this->priority = $record->priority;
    }

    public function update()
    {
        $this->validate([
            'admin' => 'required|string',
            'date' => 'required|date',
            'case_number' => 'required|numeric',
            'comment' => 'required|string',
            'task_status' => 'required|string',
            'priority' => 'required|string'
        ]);

        if($this->selected_id)
        {
            $record = Task::findOrFail($this->selected_id);
            $record->update([
                'admin' => ucwords(strtolower($this->admin)),
                'case_number' => $this->case_number,
                'comment' => ucfirst(strtolower($this->comment)),
                'task_status' => $this->task_status,
                'date' => $this->date,
                'priority' => $this->priority
            ]);

            Alert::success('Task', 'Task updated successfully');
            $this->refresh();
        }
    }

    public function destroy($id)
    {
        Task::destroy($id);
        Alert::warning('Case', 'You have deleted the record');
        $this->refresh();
    }

    public function customDestroy()
    {
        if($this->start_date == null || $this->end_date == null)
        {
            session()->flash('Field', '*One or two fields are empties');
            return false;
        }else{
            $recordToDelete = Task::whereBetween('date',[$this->start_date, $this->end_date])->get();
            Task::destroy($recordToDelete);
            Alert::warning('Cases', 'You have deleted records within the specified time interval');
            $this->refresh();
        }
    }
}
