<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Upload File or Images') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('uploads.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row align-items-center">
                            <label for="filename" class="col-md-4 col-form-label text-md-right">
                                {{ __('File') }}
                            </label>

                            <div class="col-md-6 d-flex align-items-center">
                                <input 
                                    type="file" 
                                    class="form-control" 
                                    name="filename[]" 
                                    id="filename"
                                    multiple
                                >

                                <!-- Tempat teks jumlah file -->
                                <span id="file-count" class="ml-2 text-muted"></span>
                            </div>
                        </div>

                        <div class="form-group row mb-0 mt-3">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Upload') }}
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('filename').addEventListener('change', function() {
        let count = this.files.length;
        document.getElementById('file-count').textContent = count > 0 ? `${count} files` : '';
    });
</script>
