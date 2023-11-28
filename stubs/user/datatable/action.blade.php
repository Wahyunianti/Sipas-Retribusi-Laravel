<div class="btn-group" role="group">
    {{-- @if (auth()->id() === $model->id) --}}

    <div class="mx-1">
        <button type="button" data-id="{{ $model->id }}" class="btn btn-success btn-sm user-edit"
            data-bs-toggle="modal" data-bs-target="#editUserModal">
            <i class="bi bi-pencil-square"></i>
        </button>
    </div>

    <div class="mx-1">
        <form action="{{ route('pengguna.destroy', $model->id) }}" method="POST">
            @csrf @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm delete-notification">
                <i class="bi bi-trash-fill"></i>
            </button>
        </form>
    </div>
    {{-- @endif --}}
</div>