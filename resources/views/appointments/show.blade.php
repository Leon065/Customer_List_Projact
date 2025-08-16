<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Show Appointment</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
    xintegrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>

<body>
  <div class="container mt-4">
    <h1>Show Appointment</h1>
    <div class="mb-3">
        <label for="customer_name" class="form-label">Customer Name</label>
        <input type="text" class="form-control" value="{{ $appointment->customer->name }}" readonly>
    </div>
    <div class="mb-3">
        <label for="service_name" class="form-label">Service Type</label>
        <input type="text" class="form-control" value="{{ $appointment->service->name }}" readonly>
    </div>
    <div class="mb-3">
        <label for="appointment_time" class="form-label">Appointment Time</label>
        <input type="text" class="form-control" value="{{ $appointment->appointment_time }}" readonly>
    </div>
    <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <input type="text" class="form-control" value="{{ $appointment->status }}" readonly>
    </div>
    <a href="{{ route('appointments.index') }}" class="btn btn-primary">Back to Appointments</a>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
    xintegrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>

</html>
