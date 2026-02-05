<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Student Profile</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f3f4f6;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden; /* prevents scroll */
        }

        .profile-card {
            width: 100%;
            max-width: 700px;
            height: 90vh; /* card occupies 90% of viewport height */
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
            overflow-y: auto; /* scroll inside card if content overflows */
            position: relative;
        }

        .profile-header {
            height: 120px;
            background-color: #2563eb;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }

        .profile-pic {
            width: 180px;
            height: 180px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid #fff;
            position: absolute;
            top: 60px;
            left: 50%;
            transform: translateX(-50%);
            background-color: #e5e7eb;
        }

        .profile-body {
            padding: 120px 30px 30px 30px;
        }

        .form-label {
            font-weight: 500;
        }

        .btn-custom {
            background-color: #10b981;
            color: #fff;
            border: none;
        }

        .btn-custom:hover {
            background-color: #059669;
        }

        /* Scrollbar style for card if needed */
        .profile-card::-webkit-scrollbar {
            width: 8px;
        }

        .profile-card::-webkit-scrollbar-thumb {
            background-color: rgba(0, 0, 0, 0.2);
            border-radius: 4px;
        }
    </style>
</head>

<body>

    <div class="profile-card">
        <!-- Header -->
        <div class="profile-header"></div>

        <!-- Profile Picture -->
        <div class="text-center">
            @if ($student->photo)
                <img src="{{ asset('uploads/' . $student->photo) }}" alt="Profile Picture" class="profile-pic">
            @else
                <img src="https://via.placeholder.com/180" alt="Profile Picture" class="profile-pic">
            @endif
        </div>

        <!-- Body/Form -->
        <div class="profile-body">
            <form method="POST" action="{{ url('update/' . $student->id) }}" enctype="multipart/form-data">
                @csrf

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ $student->name }}">
                    </div>
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                            value="{{ $student->email }}">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="course" class="form-label">Course</label>
                    <select class="form-select" id="course" name="course">
                        <option value="Mca" {{ $student->course == 'Mca' ? 'selected' : '' }}>Mca</option>
                        <option value="Bca" {{ $student->course == 'Bca' ? 'selected' : '' }}>Bca</option>
                        <option value="Bsc" {{ $student->course == 'Bsc' ? 'selected' : '' }}>Bsc</option>
                        <option value="Msc" {{ $student->course == 'Msc' ? 'selected' : '' }}>Msc</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="photo" class="form-label">Change Profile Photo</label>
                    <input type="file" class="form-control" id="photo" name="photo">
                </div>

                <div class="d-flex justify-content-center gap-3">
                    <button type="submit" class="btn btn-custom">Update Profile</button>
                    <a href="/" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
