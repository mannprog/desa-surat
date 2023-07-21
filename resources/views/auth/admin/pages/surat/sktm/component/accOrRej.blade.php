<!-- Accept Modal-->
<div class="modal fade" id="accModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Apakah yakin untuk menyetujui?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Pilih tombol "Setuju" dibawah jika kamu yakin untuk menyetujui permohonan.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary shadow" type="button" data-dismiss="modal">Batal</button>
                <form action="{{ route('pengantar.sktm.accept', $data->id) }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-primary shadow">Setuju</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Reject Modal-->
<div class="modal fade" id="rejModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Apakah yakin untuk menolak?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Pilih tombol "Tolak" dibawah jika kamu yakin untuk menolak permohonan.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary shadow" type="button" data-dismiss="modal">Batal</button>
                <form action="{{ route('pengantar.sktm.reject', $data->id) }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-danger shadow">Tolak</button>
                </form>
            </div>
        </div>
    </div>
</div>
