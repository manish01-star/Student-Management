<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student - Student Management Portal</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Add New Student</h4>
                <a href="/" class="btn btn-light btn-sm">Back</a>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Student Name</label>
                        <input type="text" class="form-control" name="name" id="name"
                            placeholder="Enter student name">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="email"
                            placeholder="Enter student email">
                    </div>

                    <div class="mb-3">
                        <label for="course" class="form-label">Course</label>
                        <select class="form-select" name="course" id="course">
                            <option selected>Select course</option>
                            <option value="Bca">Bca</option>
                            <option value="Mca">Mca</option>
                            <option value="Bsc">Bsc</option>
                            <option value="Msc">Msc</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="photo" class="form-label">Student Photo</label>
                        <input type="file" name="photo" id="photo" class="form-control">
                    </div>


                    <button type="submit" class="btn btn-success">Add Student</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
