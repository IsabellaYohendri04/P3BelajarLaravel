<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Files</title>

    <!-- Bootstrap 5 CDN -->
    <link 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
        rel="stylesheet">

</head>

<body class="bg-light py-5">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white text-center">
                        <h4 class="mb-0">Upload File or Images</h4>
                    </div>

                    <div class="card-body">

                        <form method="POST" action="{{ route('uploads.store') }}" enctype="multipart/form-data">
                            @csrf

                            <!-- Input File -->
                            <div class="row mb-3 align-items-center">
                                <label for="filename" class="col-md-4 col-form-label text-md-end fw-bold">
                                    File
                                </label>

                                <div class="col-md-6 d-flex align-items-center">
                                    <input 
                                        type="file" 
                                        class="form-control" 
                                        name="filename[]" 
                                        id="filename"
                                        multiple
                                    >

                                    <!-- Info jumlah file -->
                                    <span id="file-count" class="ms-2 text-muted"></span>
                                </div>
                            </div>

                            <!-- Tombol Upload -->
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary px-4">
                                        Upload
                                    </button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Script Hitung Jumlah File -->
    <script>
        document.getElementById('filename').addEventListener('change', function () {
            let count = this.files.length;
            document.getElementById('file-count').textContent =
                count > 0 ? `${count} file selected` : '';
        });
    </script>

</body>

</html>
