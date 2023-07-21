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
                    <div class="mb-3">
                        <label for="tanggal_dibuat" class="form-label">Tanggal dibuat</label>
                        <input type="date" class="form-control" id="tanggal_dibuat" name="tanggal_dibuat">
                    </div>
                    <label for="spktp" class="form-label">Upload Surat<span class="text-danger">*</span></label>
                    <input class="form-control" type="file" id="spktp" name="spktp"
                        aria-describedby="spktpHelp" required>
                    <div id="spktpHelp" class="form-text">File upload max 2MB dan berekstensi jpg/jpeg/png/pdf.</div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary shadow" type="button" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary shadow">Setuju</button>
                </div>
            </form>
        </div>
    </div>
</div>
