<!DOCTYPE html>
<html lang="en">
<head>

  <!-- ตั้งชื่อ title -->
  <title>@yield('title')</title> 

  <!-- api Template -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Prompt&display=swap" rel="stylesheet">
  <!-- set up theme -->
  <style>
    
    body {
      font-family: 'Prompt', sans-serif;
      height: 125%;
  
    }
    .navbar-inverse .navbar-brand {
      color: #eb5e28;
    }
   
    .navbar-inverse {
      background-color: #252422;
      border-color: #252422;
    }

    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }

    p {
      color:white;
      margin-top: 15px;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {
      height: 600px;
      background-color: white;
    }

    /* Set Nav bar */
    .sidenav {
      padding-top: 20px;
      background-color: #f9f9f9;
      height: 125%;
    }

    a {
      color: #252422;
      text-decoration: none;
    }

    a:focus, a:hover {
      color: #eb5e28;
      background-color: transparent;
      text-decoration: underline;
    }

    .nav-pills>li.active>a, .nav-pills>li.active>a:focus, .nav-pills>li.active>a:hover {
      color: #fff;
      background-color: #403d39;
    }

    .tab2 {
            display: inline-block;
            margin-left: 40px;
        }

    /* Set Button */

    .btn-primary {
      color: #fff;
      background-color: #d35424;
      border-color: #d35424;
    }

    .btn-primary:hover, .btn-primary:focus, .btn-primary:active, .btn-primary.active, .open>.dropdown-toggle.btn-primary {
      color: #fff;
      background-color: #403d39;
      border-color: #403d39; /*set the color you want here*/
    }
    
    .btn-link {
      font-weight: 400;
      color: #f18e68;
      border-radius: 0;
    }

    .btn-link:hover, .btn-link:focus, .btn-link:active, .btn-link.active, .open>.dropdown-toggle.btn-link {
      color: #a4411c;
    }

    /* Set black background color, white text and some padding */
    footer {
      background-color: #f9f9f9;
      /* color: white; */
      padding: 25px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media only screen and (max-width: 768px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {
        height:auto;
        background-color: white;
      } 
    }
  </style>
</head>
<body>
<!-- header -->
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    
      <div class="col-sm-6"> 
        <a class="navbar-brand" href="/">Exit Exam MVC 2/2563 [วิ่งไร่พัทลุง]</a>
      </div>

      <div class="col-sm-6 text-right"> 
        <p> 60050214 พัชรธัญ  สุทธิชาติ</p>
      </div>
      
   
  </div>
</nav>

<!-- Menu [Left] -->
<div class="container-fluid text-center">    
  <div class="row content">
    <!-- Menu -->
    <div class="col-sm-2 sidenav">
        <ul class="nav nav-pills nav-stacked ">
            <li class="{{ Request::path() ==  'home' ? 'active' : ''  }}">
              <a href="{{ route('home') }}">หน้าหลัก</a></li>

            <li class="{{ Request::path() ==  'register' ? 'active' : ''  }}">
              <a href="{{ URL::to('register') }}">ลงทะเบียน</a></li>

            <li class="{{ Request::path() ==  'distance'  ? 'active' : ''  }}">
              <a href="{{ URL::to('distance') }}">สะสมข้อมูลการวิ่ง</a></li>

            <li class="{{ Request::path() ==  'rank' ? 'active' : ''  }}">
              <a href="{{ URL::to('rank') }}">จัดอันดับนักวิ่ง</a></li>

        </ul>

        <!-- Request::path() ==  '/' ? 'active ปุ่มสีฟ้า เช็คว่าอยู่ url ไหน' : ''   กำหนดชื่อ url เหมือน route ถ้าเป็น จริงให้ active ไม่จริงค่าว่าง
       a href ลิงก์  url สัมพันธ์กะ route ข้องกะ =njvsohk-->

    </div>
    <!-- content [Center] -->
    <div class="col-sm-9 text-left"> 
      <h1>@yield('header', 'Input Teams')</h1>  <!-- Template หน้าเว็บ ในการกำหนดหัวข้อ -->
      <hr>
    @yield('text')  <!-- Template หน้าเว็บ ในการใส่เนื้อหา -->
    </div>
    <!-- [Right] -->
    
  </div>
</div>

 <!-- footer -->
<footer class="container-fluidc text-center">
  <p> </p>
</footer>

</body>
</html>