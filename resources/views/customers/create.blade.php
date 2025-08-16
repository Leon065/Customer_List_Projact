<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Customer</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <h1>Create Customer</h1>
    <form action="{{ route('customers.store') }}" method="post">
      @csrf
      <label for="name">Name</label>
      <input type="text" name="name" class="form-control" id="">

      <label for="phone">Phone</label>
      <input type="text" name="phone" class="form-control" id="">

      <label for="email">Email</label>
      <input type="text" name="email" class="form-control" id="">

      <input type="submit" class="btn btn-primary" value="Add New">
    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>

</html>
