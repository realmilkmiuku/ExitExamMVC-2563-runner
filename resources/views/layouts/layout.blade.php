<!DOCTYPE html>
<html lang="en">
  <!-- Title -->
  <title>@yield('title')</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- Template -->
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Kanit">
  
  <!-- CSS -->
  <style>
    body,h1,h2,h3,h4,h5 {
      font-family: 'Kanit', serif;
    }

    body {
      font-size:18px;
    }


    .w3-half img{margin-bottom:-6px;margin-top:16px;opacity:0.8;cursor:pointer}
    .w3-half img:hover{opacity:1}

    .w3-red, .w3-hover-red:hover {
      color: #fff!important;
      background-color: #f44336!important;
    }

      a {
        color: #252422;
        text-decoration: none;
      }

      a:focus, a:hover {
        color: #f44336;
        background-color: transparent;
        text-decoration: underline;
      }

      .nav-pills>li.active>a, .nav-pills>li.active>a:focus, .nav-pills>li.active>a:hover {
        color: #fff;
        background-color: #282828;
      }

      /* Set Button */
      .btn-primary {
        color: #fff;
        background-color: #3688f4;
        border-color: #3688f4;
      }

      .btn-primary:hover, .btn-primary:focus, .btn-primary:active, .btn-primary.active, .open>.dropdown-toggle.btn-primary {
        color: #fff;
        background-color: #282828;
        border-color: #282828; /*set the color you want here*/
      }
      
      .btn-link {
        font-weight: 400;
        font-size: large;
        color: #f88980;
        border-radius: 0;
      }

      .btn-link:hover, .btn-link:focus, .btn-link:active, .btn-link.active, .open>.dropdown-toggle.btn-link {
        color: #4f4f4f;
      }

      .wrap-table100 {
        width: 100%;
      }

/*//////////////////////////////////////////////////////////////////
[ Table ]*/
.table100 {
  background-color: #fff;
}

table {
  width: 100%;
}

th {
  border-bottom:4px solid #d9d9d9;
}

th, td {
  text-align-last: center;
  font-weight: unset;
}

tr:hover td {
  background:#fafafa;
  color:#FFFFFF;
  border-top: 1px solid #d9d9d9;
  border-bottom: 1px solid #d9d9d9;
}

.table100 th {
  padding-top: 21px;
  padding-bottom: 21px;
}

.table100 td {
  padding-top: 16px;
  padding-bottom: 16px;
}


/*==================================================================
[ Fix col ]*/
.table100 {
  width: 100%;
  position: relative;
}

.table100-nextcols table{
  table-layout: fixed;
}

.shadow-table100-firstcol {
  box-shadow: 8px 0px 10px 0px rgba(0, 0, 0, 0.05);
  -moz-box-shadow: 8px 0px 10px 0px rgba(0, 0, 0, 0.05);
  -webkit-box-shadow: 8px 0px 10px 0px rgba(0, 0, 0, 0.05);
  -o-box-shadow: 8px 0px 10px 0px rgba(0, 0, 0, 0.05);
  -ms-box-shadow: 8px 0px 10px 0px rgba(0, 0, 0, 0.05);
}

.table100-firstcol table {
  background-color: transparent;
}

/*==================================================================
[ Ver1 ]*/

.table100.ver1 th {
  font-size: 18px;
  color: black;
  font-weight: bold;
  text-transform: uppercase;
  background-color: #e6e6e6;
}

.table100.ver1 td {
  font-size: 16px;
  color: #282828;
  font-weight: lighter;
}

.table100.ver1 tr {
  border-bottom: 1px solid #f2f2f2;
}

  </style>
<body>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-red w3-collapse w3-top w3-large w3-padding" style="z-index:3;width:300px;font-weight:bold;" id="mySidebar"><br>
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-button w3-hide-large w3-display-topleft" style="width:100%;font-size:22px">Close Menu</a>
  <div class="w3-container">
    <h3 class="w3-padding-64"><b>ExitExam MVC <br>อาทิตย์บ่าย ข้อ2<br>3/2563</b> </h3>
  </div>
  <div class="w3-bar-block">
  <div class="row content">

    <!-- Menu -->
    <div class="col-sm-12 sidenav">
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
  </div>
</nav>

<!-- Top menu on small screens -->
<header class="w3-container w3-top w3-hide-large w3-red w3-xlarge w3-padding">
  <a href="javascript:void(0)" class="w3-button w3-red w3-margin-right" onclick="w3_open()">☰</a>
  <span>ExitExam MVC 3/2563</span>
</header>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:340px;margin-right:40px">

  <!-- Header -->
  <div class="w3-container w3-padding-16" style="margin-top:15px;padding-right:5px"><p class="w3-right">60050214 พัชรธัญ สุทธิชาติ </p></div>

  <div class="w3-container" style="margin-top:80px" id="showcase">
    <h1 class="w3-xxxlarge w3-text-red"><b>@yield('header', 'Input Teams')</b></h1>
    <hr style="width:50px;border:5px solid red" class="w3-round">
  </div>
  
 
  <!-- Content -->
    <p>@yield('text')</p>
 
  </div>
  

<!-- End page content -->
</div>

</body>
</html>
