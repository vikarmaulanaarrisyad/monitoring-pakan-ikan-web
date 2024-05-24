<x-modal data-backdrop="static" data-keyboard="false" size="modal-md">
    <x-slot name="title">
        Tambah
    </x-slot>

    @method('POST')

    <div class="row">
        <div class="col-md-12 col-12">
            <div class="form-group">
                <label for="title">Judul</label>
                <input type="text" class="form-control" name="title" id="title" autocomplete="off">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-12">
            <div class="form-group">
                <label for="content">Konten</label>
                <textarea name="content" id="content" class="form-control" cols="30" rows="10"></textarea>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="path_image">Gambar</label>
                <div class="custom-file">
                    <input type="file" name="path_image" class="custom-file-input" id="path_image"
                        onchange="preview('.preview-path_image', this.files[0])">
                    <label class="custom-file-label" for="path_image">Choose file</label>
                </div>
            </div>

        </div>
        <div class="col-md-6">
            <img src="" class="img-thumbnail preview-path_image"
                style="display: none; width: 80px; height: 100px;">
        </div>
    </div>

    <x-slot name="footer">
        <button type="button" onclick="submitForm(this.form)" class="btn btn-sm btn-outline-info" id="submitBtn">
            <span id="spinner-border" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            <i class="fas fa-save mr-1"></i>
            Simpan</button>
        <button type="button" data-dismiss="modal" class="btn btn-sm btn-outline-danger">
            <i class="fas fa-times"></i>
            Close
        </button>
    </x-slot>
</x-modal>
