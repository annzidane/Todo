<?php

namespace App\Livewire;
use App\Models\Todoo as ModelsTodoo;

use Livewire\Component;
use Livewire\WithPagination;

class Todoo extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $task, $completed = false, $approval_status = 'Pending', $rejection_reason, $todoId;
    public $updateData = false;

    protected $rules = [
        'task' => 'required',
    ];

    public function store()
    {
        $this->validate();

        ModelsTodoo::create([
            'task' => $this->task,
            'completed' => false,
            'approval_status' => 'Pending',
            'rejection_reason' => null,
        ]);

        session()->flash('message', 'Task created successfully.');

        $this->clear();
    }

    public function update()
    {
        $this->validate();

        $todo = ModelsTodoo::find($this->todoId);
        $todo->update([
            'task' => $this->task,
            'completed' => $this->completed,
            'approval_status' => $this->approval_status,
            'rejection_reason' => $this->rejection_reason,
        ]);

        session()->flash('message', 'Task updated successfully.');

        $this->clear();
    }

    public function edit($id)
    {
        $todo = ModelsTodoo::find($id);
        if ($todo->approval_status == 'Rejected') {
            session()->flash('error', 'Rejected tasks cannot be edited.');
            return;
        }

        $this->task = $todo->task;
        $this->completed = $todo->completed;
        $this->approval_status = $todo->approval_status;
        $this->rejection_reason = $todo->rejection_reason;
        $this->todoId = $todo->id;
        $this->updateData = true;
    }

    public function clear()
    {
        $this->task = '';
        $this->completed = false;
        $this->approval_status = 'Pending';
        $this->rejection_reason = '';
        $this->todoId = null;
        $this->updateData = false;
    }

    public function approve($id)
    {
        $todo = ModelsTodoo::find($id);
        if ($todo->approval_status == 'Rejected') {
            session()->flash('error', 'Rejected tasks cannot be approved.');
            return;
        }

        $todo->update([
            'approval_status' => 'Approved',
        ]);
    }

    public function reject($id, $reason)
    {
        $todo = ModelsTodoo::find($id);
        $todo->update([
            'approval_status' => 'Rejected',
            'rejection_reason' => $reason,
        ]);
    }

    public function delete($id)
    {
        $todo = ModelsTodoo::find($id);
        $todo->delete();
        session()->flash('message', 'Task deleted successfully.');
    }

    public function toggleCompleted($id)
    {
        $todo = ModelsTodoo::find($id);
        $todo->update([
            'completed' => !$todo->completed,
        ]);
    }

    public function render()
    {
        $data = ModelsTodoo::orderBy('task', 'asc')->paginate(2);
        return view('livewire.todoo',['dataTodoos' => $data]);
    }
}
