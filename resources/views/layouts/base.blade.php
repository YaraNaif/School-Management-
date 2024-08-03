<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <title>School management</title>
    <style>
        *{
            font-family: cairo;
            color:white
        }

    </style>
</head>
<body dir="{{(session()->get('locale')=='ar' ? 'rtl' : 'ltr')}}">
    <Header>
          <!-- Navbar -->
          <!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
    <!-- Container wrapper -->
    <div class="container-fluid">
        <!-- Navbar brand -->
        <a class="navbar-brand" href="#">School management in Taif City</a>

        <!-- Icons -->


         <!-- dropdwon acc  -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <i class="fas fa-user mx-1"></i> Welcome  {{ Auth::user()->name }}! </a>
                <!-- Dropdown menu -->
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li>
                        <a class="dropdown-item" href="#">My account</a>
                    </li>

                    <li>
                        <a class="dropdown-item" href="{{route('logout')}}">Log out</a>
                    </li>
                </ul>
            </li>
        </ul>
        
    </div>

    <!-- Container wrapper -->
</nav>
<!-- Navbar -->
          <!-- Navbar --> 
    </Header>

    <main>
    
          <div class="row">
            <div class="col-auto col-sm-3 col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <span class="fs-5 d-none d-sm-inline">Menu</span>
                    </a>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                        <li class="nav-item">
                            <a href="{{route('index')}}" class="nav-link align-middle px-0">
                            <i class="bi bi-house-door-fill"></i> <span class="ms-1 d-none d-sm-inline">Home</span>
                            </a>
                        </li>
                        <li>
                                <!-- new function for read and search here -->
                        <a href="{{route('get-schools')}}" class="nav-link align-middle px-0">


                        <i class="bi bi-building-fill"></i> <span class="ms-1 d-none d-sm-inline">schools</span> </a>
                          
                        </li>
                        <li>
                            <!-- i used the function in products details for search only -->
                            <a href="{{route('school-details')}}" class="nav-link px-0 align-middle">
                            <i class="bi bi-building-fill-add"></i> <span class="ms-1 d-none d-sm-inline">schools Details</span></a>
                        </li>
                        
                    </ul>
                    <hr>
                    
                    <div class="dropdown pb-4">
    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="bi bi-person-square"></i>
        <span class="d-none d-sm-inline mx-1">{{ Auth::user()->name }}</span>
    </a>
</div>

               
                </div>
           
            </div>
            <div class="col-auto col-sm-8 col-md-8 col-xl-6 px-sm-6 px-0">
                @yield('content')
            </div>
         </div>
    </main>

   <footer>
            
   </footer>

</body>
</html>