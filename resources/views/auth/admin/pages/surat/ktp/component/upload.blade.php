<!-- Upload Modal-->
<div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Apakah surat sudah dibuat?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{ route('pengantar.ktp.upload', $data->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="ktp_id" id="ktp_id" value="{{ $data->id }}">
                <div class="modal-body">
                    <label for="spktp" class="form-label">Upload Surat<span class="text-danger">*</span></label>
                    <input class="form-control" type="file" id="spktp" name="spktp" required>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary shadow" type="button" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary shadow">Setuju</button>
                </div>
            </form>
        </div>
    </div>
</div>
