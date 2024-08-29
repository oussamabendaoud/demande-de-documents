<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Demandes de Documents')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Include additional CSS files here -->
        <!-- Font Awesome -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>
        <!-- MDB -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.3.2/mdb.min.css" rel="stylesheet"/>
        <!-- DataTable CSS  -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0-alpha3/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap5.min.css">
        <style>body {
            background-color: #fbfbfb;
          }
          @media (min-width: 991.98px) {
            main {
              padding-left: 240px;
            }
          }
          
          /* Sidebar */
          .sidebar {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            padding: 58px 0 0; /* Height of navbar */
            box-shadow: 0 2px 5px 0 rgb(0 0 0 / 5%), 0 2px 10px 0 rgb(0 0 0 / 5%);
            width: 240px;
            z-index: 600;
          }
          
          @media (max-width: 991.98px) {
            .sidebar {
              width: 100%;
            }
          }
          .sidebar .active {
            border-radius: 5px;
            box-shadow: 0 2px 5px 0 rgb(0 0 0 / 16%), 0 2px 10px 0 rgb(0 0 0 / 12%);
          }
          
          .sidebar-sticky {
            position: relative;
            top: 0;
            height: calc(100vh - 48px);
            padding-top: 0.5rem;
            overflow-x: hidden;
            overflow-y: auto; /* Scrollable contents if viewport is shorter than content. */
          }</style>
</head>
<body>

    <!-- Navigation Bar -->
    <!-- Sidebar -->
    <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
        <div class="position-sticky">
          <div class="list-group list-group-flush mx-3 mt-4">
            <a href="/service-communication" class="list-group-item list-group-item-action py-2 {{ Request::is('service-communication') ? 'active' : '' }}" data-mdb-ripple-init aria-current="true">
              <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Communication</span>
            </a>
            <a href="/service-scolarite" class="list-group-item list-group-item-action py-2 {{ Request::is('service-scolarite') ? 'active' : '' }}" data-mdb-ripple-init>
              <i class="fas fa-chart-area fa-fw me-3"></i><span>Scolarité </span>
            </a>
            <a href="/users" class="list-group-item list-group-item-action py-2 {{ Request::is('users') ? 'active' : '' }}" data-mdb-ripple-init><i
                class="fas fa-users fa-fw me-3"></i><span>Users</span></a>
           <!-- <a href="#" class="list-group-item list-group-item-action py-2" data-mdb-ripple-init><i
                class="fas fa-lock fa-fw me-3"></i><span>Password</span></a>
            <a href="#" class="list-group-item list-group-item-action py-2" data-mdb-ripple-init><i
                class="fas fa-chart-line fa-fw me-3"></i><span>Analytics</span></a>
            <a href="#" class="list-group-item list-group-item-action py-2" data-mdb-ripple-init>
              <i class="fas fa-chart-pie fa-fw me-3"></i><span>SEO</span>
            </a>
            <a href="#" class="list-group-item list-group-item-action py-2" data-mdb-ripple-init><i
                class="fas fa-chart-bar fa-fw me-3"></i><span>Orders</span></a>
            <a href="#" class="list-group-item list-group-item-action py-2" data-mdb-ripple-init><i
                class="fas fa-globe fa-fw me-3"></i><span>International</span></a>
            <a href="#" class="list-group-item list-group-item-action py-2" data-mdb-ripple-init><i
                class="fas fa-building fa-fw me-3"></i><span>Partners</span></a>
            <a href="#" class="list-group-item list-group-item-action py-2" data-mdb-ripple-init><i
                class="fas fa-calendar fa-fw me-3"></i><span>Calendar</span></a>
             -->
          </div>
        </div>
      </nav>
      <!-- Sidebar -->

         <!-- Navbar -->
<nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
    <!-- Container wrapper -->
    <div class="container-fluid">
      <!-- Toggle button -->
      <button class="navbar-toggler" type="button" data-mdb-collapse-init data-mdb-target="#sidebarMenu"
        aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Brand -->
      <a class="navbar-brand" href="#">
        <img src="{{ asset('img/Logo-SupMTI-s-2024.png') }}" height="40" alt="" loading="lazy" />
      </a>
      <!-- Search form -->
      <form class="d-none d-md-flex input-group w-auto my-auto">
        <input autocomplete="off" type="search" class="form-control rounded"
          placeholder='Search (ctrl + "/" to focus)' style="min-width: 225px" />
        <span class="input-group-text border-0"><i class="fas fa-search"></i></span>
      </form>

      <!-- Right links -->
      <ul class="navbar-nav ms-auto d-flex flex-row">
        <!-- Notification dropdown -->
        <li class="nav-item dropdown">
          <a class="nav-link me-3 me-lg-0 dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink"
            role="button" data-mdb-dropdown-init aria-expanded="false">
            <i class="fas fa-bell"></i>
            <span class="badge rounded-pill badge-notification bg-danger">1</span>
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="#">Some news</a></li>
            <li><a class="dropdown-item" href="#">Another news</a></li>
            <li>
              <a class="dropdown-item" href="#">Something else</a>
            </li>
          </ul>
        </li>



        <!-- Icon dropdown -->

        <!-- Avatar -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle hidden-arrow d-flex align-items-center" href="#"
            id="navbarDropdownMenuLink" role="button" data-mdb-dropdown-init aria-expanded="false">
            <img src="{{ asset('img/Logo-SupMTI-s-2024.png') }}" class="rounded-circle" height="30"
              alt="" loading="lazy" style="background: rgb(198, 176, 176)" />
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="#">My profile</a></li>
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><a class="dropdown-item" href="#">Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
    <!-- Container wrapper -->
  </nav>
  <!-- Navbar -->

    <!-- Main Content -->
    <div class="container mt-4">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="footer mt-auto py-3 bg-light">
        <div class="container">
            
        </div>
    </footer>

    <!-- JavaScript files -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.3.2/mdb.umd.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/responsive.bootstrap5.min.js"></script>
    <script>
      $("#example").DataTable({
        responsive: true,
      });
    </script>
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- Add any additional JavaScript files here -->
</body>
</html>
