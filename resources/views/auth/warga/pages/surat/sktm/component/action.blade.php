<form id="deleteDoc" method="post">
    @csrf
    @method('DELETE')
    <a href="{{ route('surat.sktm.show', $row->id) }}" class="btn btn-sm mb-0 btn-info"><i class="fas fa-eye"></i></a>
    @if ($row->status === 'belumditentukan')
        <button type="submit" class="btn btn-sm mb-0 btn-danger deleteBtn" data-id="{{ $row->id }}"><i
                class="fas fa-trash-alt"></i></button>
    @endif
    @if ($row->status === 'selesai')
        <a href="{{ route('surat.sktm.download', $row->spsktm) }}" class="btn btn-sm mb-0 btn-success"><i
                class="fas fa-download"></i></a>
    @endif
</form>
