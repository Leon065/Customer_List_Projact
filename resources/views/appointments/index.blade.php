<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Appointments</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: #f3f4f6;
      font-family: Arial, sans-serif;
    }
    .card {
      border-radius: 12px;
      box-shadow: 0 2px 12px rgba(0,0,0,0.08);
      margin: 2rem auto;
      padding: 1rem 2rem;
    }
    h2 {
      font-weight: bold;
      margin-bottom: 1rem;
    }
    .btn-primary {
      background: #0d6efd;
      border: none;
    }
    .btn-primary:hover {
      background: #0b5ed7;
    }
    table thead {
      background: #e9f3ff;
    }
    table thead th {
      border: none;
      font-weight: 600;
    }
    table tbody tr:hover {
      background: #f8f9fa;
    }
    .btn-sm {
      padding: 4px 10px;
      font-size: 0.85rem;
      border-radius: 6px;
    }
    .btn-info {
      background: #0d6efd;
      border: none;
    }
    .btn-info:hover {
      background: #0b5ed7;
    }
    .btn-secondary {
      background: #6c757d;
      border: none;
    }
    .btn-secondary:hover {
      background: #565e64;
    }
    .btn-danger {
      background: #dc3545;
      border: none;
    }
    .btn-danger:hover {
      background: #bb2d3b;
    }
    .pagination {
      justify-content: center;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="card">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Appointment List</h2>
        <a href="{{ route('appointments.create') }}" class="btn btn-primary">Add New</a>
      </div>

      <div class="table-responsive">
        <table class="table table-bordered align-middle">
          <thead>
            <tr>
              <th>ID</th>
              <th>Customer</th>
              <th>Service</th>
              <th>Date</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($appointments as $appointment)
              <tr>
                <td>{{ $appointment->id }}</td>
                <td>{{ $appointment->customer->name }}</td>
                <td>{{ $appointment->service->name }}</td>
                <td>{{ \Carbon\Carbon::parse($appointment->appointment_time)->format('M d, Y h:i A') }}</td>
                <td>
                  @php
                    $statusColors = [
                      'pending' => 'warning',
                      'confirmed' => 'success',
                      'cancelled' => 'danger',
                      'completed' => 'primary'
                    ];
                    $status = strtolower($appointment->status);
                    $badge = $statusColors[$status] ?? 'secondary';
                  @endphp
                  <span class="badge bg-{{ $badge }}">{{ ucfirst($appointment->status) }}</span>
                </td>
                <td>
                  <a href="{{ route('appointments.show', $appointment->id) }}" class="btn btn-info btn-sm">View</a>
                  <a href="{{ route('appointments.edit', $appointment->id) }}" class="btn btn-secondary btn-sm">Edit</a>
                  <form id="delete-form-{{ $appointment->id }}" action="{{ route('appointments.destroy', $appointment->id) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete({{ $appointment->id }})">Delete</button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      {{ $appointments->links('pagination::bootstrap-5') }}
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    function confirmDelete(id) {
      Swal.fire({
        title: "Are you sure?",
        text: "This action cannot be undone!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#dc3545",
        cancelButtonColor: "#0d6efd",
        confirmButtonText: "Yes, delete it!"
      }).then((result) => {
        if (result.isConfirmed) {
          document.getElementById("delete-form-" + id).submit();
        }
      });
    }
  </script>
</body>
</html>
