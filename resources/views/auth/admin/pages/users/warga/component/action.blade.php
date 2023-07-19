<form id="deleteDoc" method="post">
    @csrf
    @method('DELETE')
    <a href="{{ route('kelola.warga.show', $row->id) }}" class="btn btn-sm mb-0 btn-info"><i class="fas fa-eye"></i></a>
    <a href="{{ route('kelola.warga.edit', $row->id) }}" class="btn btn-sm mb-0 btn-warning"><i
            class="fas fa-pencil-alt"></i></a>
    <button type="submit" class="btn btn-sm mb-0 btn-danger deleteBtn" data-id="{{ $row->id }}"><i
            class="fas fa-trash-alt"></i></button>
</form>
