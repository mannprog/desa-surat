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
            <form action="{{ route('pengantar.kk.upload', $data->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="kk_id" id="kk_id" value="{{ $data->id }}">
                <div class="modal-body">
                    <label for="spkk" class="form-label">Upload Surat<span class="text-danger">*</span></label>
                    <input class="form-control" type="file" id="spkk" name="spkk" aria-describedby="spkkHelp"
                        required>
                    <div id="spkkHelp" class="form-text">File upload max 2MB dan berekstensi jpg/jpeg/png/pdf.</div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary shadow" type="button" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary shadow">Setuju</button>
                </div>
            </form>
        </div>
    </div>
</div>
