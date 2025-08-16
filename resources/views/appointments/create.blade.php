<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Appointment</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
    xintegrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>

<body>
  <div class="container mt-4">
    <h1>Create Appointment</h1>
    <form action="{{ route('appointments.store') }}" method="post">
      @csrf
      <div class="mb-3">
        <label for="customer_id" class="form-label">Customer</label>
        <select name="customer_id" class="form-control" id="customer_id">
          @foreach($customers as $customer)
            <option value="{{ $customer->id }}">{{ $customer->name }}</option>
          @endforeach
        </select>
      </div>

      <div class="mb-3">
        <label for="service_id" class="form-label">Service</label>
        <select name="service_id" class="form-control" id="service_id">
          @foreach($services as $service)
            <option value="{{ $service->id }}">{{ $service->name }} - ${{ number_format($service->price, 2) }}</option>
          @endforeach
        </select>
      </div>

      <div class="mb-3">
        <label for="appointment_time" class="form-label">Appointment Time</label>
        <input type="datetime-local" name="appointment_time" class="form-control" id="appointment_time" required>
      </div>

      <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <select name="status" class="form-control" id="status">
          <option value="pending">Pending</option>
          <option value="confirmed">Confirmed</option>
          <option value="cancelled">Cancelled</option>
        </select>
      </div>

      <button type="submit" class="btn btn-primary">Add New Appointment</button>
    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
    xintegrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>

</html>
