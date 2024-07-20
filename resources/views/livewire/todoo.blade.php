<!-- Main Content -->
<div class="container mt-3">
    @if ($errors->any())
        <div class="pt-3">
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
    @if (session()->has('message'))
        <div class="pt-3">
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        </div>
    @endif
    @if (session()->has('error'))
        <div class="pt-3">
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        </div>
    @endif

    <!-- TODO Form -->
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <form>
            <div class="mb-3 row">
                <label for="task" class="col-sm-2 col-form-label">Task</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" wire:model="task">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                    @if ($updateData == false)
                        <button type="button" class="btn btn-primary" wire:click="store">SIMPAN</button>
                    @else
                        <button type="button" class="btn btn-primary" wire:click="update">UPDATE</button>
                    @endif
                    <button type="button" class="btn btn-secondary" wire:click="clear">CLEAR</button>
                </div>
            </div>
        </form>
    </div>

    <!-- TODO List -->
    <div class=" table-responsive my-3 p-3 bg-body rounded shadow-sm">
        <h1>TODO</h1>
        {{ $dataTodoos->links() }}
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="col-md-1">No</th>
                    <th class="col-md-2">Task</th>
                    <th class="col-md-1">Completed</th>
                    <th class="col-md-2">Approval Status</th>
                    <th class="col-md-2">Rejection Reason</th>
                    <th class="col-md-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataTodoos as $key => $value)
                <tr>
                    <td>{{ $dataTodoos->firstItem() + $key }}</td>
                    <td>{{ $value->task }}</td>
                    <td>
                        <input type="checkbox" wire:click="toggleCompleted({{ $value->id }})" {{ $value->completed ? 'checked' : '' }}>
                    </td>
                    <td>{{ $value->approval_status }}</td>
                    <td>{{ $value->rejection_reason }}</td>
                    <td>
                        @if ($value->approval_status != 'Rejected')
                            <button wire:click="edit({{ $value->id }})" class="btn btn-warning btn-sm">Edit</button>
                            <button wire:click="approve({{ $value->id }})" class="btn btn-success btn-sm">Approve</button>
                        @else
                            <button wire:click="delete({{ $value->id }})" class="btn btn-danger btn-sm">Delete</button>
                        @endif
                        <button onclick="rejectTask({{ $value->id }})" class="btn btn-danger btn-sm">Reject</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $dataTodoos->links() }}
    </div>
</div>
</div>

<script>
function rejectTask(id) {
    let reason = prompt("Please enter the rejection reason:");
    if (reason) {
        @this.call('reject', id, reason);
    }
}

document.addEventListener('livewire:load', function () {
    Livewire.on('todoUpdated', () => {
        alert('Todo has been updated.');
    });
});
</script>