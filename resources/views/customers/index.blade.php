<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <style>
        body {
            background: #f8fafc;
            min-height: 100vh;
        }
        .card {
            margin-top: 40px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
            border-radius: 12px;
        }
        .table thead th {
            border-top: none;
            background: #e3f2fd;
            font-weight: 600;
        }
        .table-hover tbody tr:hover {
            background: #f1f8ff;
            transition: background 0.2s;
        }
        .btn {
            border-radius: 6px;
        }
        .btn-primary {
            background: #1976d2;
            border-color: #1976d2;
        }
        .btn-primary:hover {
            background: #1565c0;
            border-color: #1565c0;
        }
        .btn-danger {
            background: #e53935;
            border-color: #e53935;
        }
        .btn-danger:hover {
            background: #b71c1c;
            border-color: #b71c1c;
        }
        .pagination {
            justify-content: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card p-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2 class="mb-0">Customer List</h2>
                <a href="{{ route('customers.create') }}" class="btn btn-primary">Add New</a>
            </div>
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr>
                            <th>CID</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customers as $c)
                            <tr>
                                <td>{{ $c->id }}</td>
                                <td>{{ $c->name }}</td>
                                <td>{{ $c->phone }}</td>
                                <td>{{ $c->email }}</td>
                                <td>
                                    <a href="{{ route('customers.show', $c->id) }}" class="btn btn-sm btn-primary me-1">View</a>
                                    <a href="{{ route('customers.edit', $c->id) }}" class="btn btn-sm btn-secondary me-1">Edit</a>
                                    <form id="delete-form-{{ $c->id }}" method="POST"
                                        action="{{ route('customers.destroy', $c->id) }}" style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-sm btn-danger"
                                            onclick="confirmDelete({{ $c->id }})">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div>
                {{ $customers->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmDelete(itemId) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#e53935',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Confirm Delete'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + itemId).submit();
                }
            });
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>

</html>
