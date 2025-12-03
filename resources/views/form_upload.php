<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
            <div class="card shadow-sm border-0">
                
                <div class="card-header bg-primary text-white text-center py-3">
                    <h5 class="mb-0">Upload File atau Gambar</h5>
                </div>

                <div class="card-body p-4">

                    <form method="POST" action="{{ route('uploads.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Pilih File</label>
                            <input type="file" class="form-control" name="filename[]" required multiple>
                            <small class="text-muted">Anda dapat memilih lebih dari satu file.</small>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">
                                Upload
                            </button>
                        </div>

                    </form>

                </div>

            </div>
        </div>
    </div>
</div>
