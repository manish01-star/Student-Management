<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Student Management Dashboard</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />

    <style>
        body {
            min-height: 100vh;
            display: flex;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f3f4f6;
        }

        /* Sidebar */
        .sidebar {
            width: 220px;
            background-color: #1f2937;
            color: #fff;
            min-height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            padding: 1rem 0;
        }

        .sidebar h3 {
            text-align: center;
            margin-bottom: 2rem;
            font-weight: bold;
            color: #f3f4f6;
        }

        .sidebar a {
            display: block;
            padding: 0.8rem 1.2rem;
            color: #e5e7eb;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 0.5rem;
            transition: 0.3s;
        }

        .sidebar a:hover {
            background-color: #3b82f6;
            color: #fff;
        }

        /* Content */
        .content {
            margin-left: 220px;
            width: calc(100% - 220px);
            padding: 2rem;
        }

        /* Navbar */
        .navbar-custom {
            background-color: #2563eb;
            color: #fff;
        }

        .card-header-custom {
            background-color: #2563eb;
            color: #fff;
        }

        .btn-custom {
            background-color: #10b981;
            color: #fff;
            border: none;
        }

        .btn-custom:hover {
            background-color: #059669;
        }

        /* Student photo styling */
        .student-photo {
            width: 70px;
            height: 70px;
            object-fit: cover;
            border-radius: 50%;
            border: 2px solid #2563eb;
            background-color: #fff;
        }

        /* Table adjustments */
        table.table tbody td {
            vertical-align: middle;
            background-color: #fff;
        }

        table.table-striped tbody tr:nth-of-type(odd) td {
            background-color: #f9f9f9;
        }

        table.table-hover tbody tr:hover td {
            background-color: #e2e8f0;
        }

        /* Action buttons container */
        .actions-btns {
            background-color: transparent !important;
            display: flex;
            justify-content: center;
            gap: 0.5rem;
        }

        /* Remove margin from buttons/forms inside actions */
        .actions-btns form,
        .actions-btns a {
            margin: 0;
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h3>Dashboard</h3>
        <a href="/">All Students</a>
        <a href="add">+ Add Student</a>
    </div>

    <!-- Main Content -->
    <div class="content">
        <!-- Top Navbar -->
        <nav class="navbar navbar-custom mb-4 shadow-sm rounded">
            <div class="container-fluid">
                <span class="navbar-brand mb-0 h5">Student Management Portal</span>
            </div>
        </nav>

        <!-- Summary Cards -->
        <div class="row mb-4">
            <div class="col-md-4 mb-3">
                <div class="card shadow-sm p-3 text-center">
                    <h6>Total Students</h6>
                    <h3>{{ $student->count() }}</h3>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card shadow-sm p-3 text-center">
                    <h6>Courses Offered</h6>
                    <h3>{{ $student->unique('course')->count() }}</h3>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card shadow-sm p-3 text-center">
                    <h6>Actions</h6>
                    <h3>CRUD Ready</h3>
                </div>
            </div>
        </div>

        <!-- Student Table Card -->
        <div class="card shadow">
            <div class="card-header card-header-custom d-flex justify-content-between align-items-center">
                <h5 class="mb-0">All Students</h5>
                <a href="add" class="btn btn-custom btn-sm">+ Add Student</a>
            </div>

            <div class="card-body p-0">
                <table class="table table-striped table-hover text-center align-middle mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>Photo</th>
                            <th>ID</th>
                            <th>Student Name</th>
                            <th>Email</th>
                            <th>Course</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($student as $item)
                            <tr>
                                <td>
                                    @if ($item->photo)
                                        <img src="{{ asset('uploads/' . $item->photo) }}" alt="Photo"
                                            class="student-photo" />
                                    @else
                                        <span class="text-muted">No Photo</span>
                                    @endif
                                </td>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->course }}</td>
                                <td>
                                    <div style="display: flex; gap: 0.5rem; justify-content: center;">
                                        <a href="{{ url('edit/' . $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ url('delete/' . $item->id) }}" method="POST"
                                            style="margin: 0;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Are you sure you want to delete this student?')">Delete</button>
                                        </form>
                                    </div>
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">No students found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
