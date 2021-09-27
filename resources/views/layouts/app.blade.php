<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Payroll</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>
<body>
  <div class="d-flex">
    <nav id="navbar" class="border">
      <ul class="nav vh-100 p-5 flex-column bg-white">
        <h1 class="h3 pt-3 p-3 border-bottom text-center">Payroll</h1>
        <li class="nav-item">
          <a id="employees-page" href="/employee" class="nav-link text-dark"><i class="bi bi-person"></i> Employees</a>
        </li>
        <li class="nav-item">
          <a id="timecard-page" href="/timecard" class="nav-link text-dark"><i class="bi bi-clock"></i> Timecard</a>
        </li>
        <li class="nav-item">
          <a id="sell-page" href="/sell" class="nav-link text-dark"><i class="bi bi-cart"></i> Sell</a>
        </li>
        <li class="nav-item">
          <a id="service-page" href="/service" class="nav-link text-dark"><i class="bi bi-briefcase"></i> Service</a>
        </li>
        <li class="nav-item">
          <a id="schedule-page" href="/schedule" class="nav-link text-dark"><i class="bi bi-calendar"></i> Schedules</a>
        </li>
        <li class="nav-item">
          <a id="payroll-page" href="/payroll" class="nav-link text-dark"><i class="bi bi-wallet2"></i> Payroll</a>
        </li>
      </ul>
    </nav>

    <main class="w-75 d-flex-column justify-content-center p-5 mx-auto">
      @yield('content')
    </main>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>