@extends('layouts.layout') <!-- เรียกใช้ layouts.layout -->
@section('title', 'หน้าหลัก') <!-- กำหนด title tab-->
@section('header', 'วิ่งไร่พัทลุง') <!-- กำหนด Header -->
@section('text')

    <!-- ส่ง request ไปยัง co-controller  ที่  route url('distance/updated') -->
     <!-- route url('distance/updated') ส่ง request ไปยัง myController แล้วส่ง respon กลับมาที่ alert -->
<form action="{{ url('search')}}" method="POST"  class="needs-validation" novalidate>
    {{ csrf_field() }}

    <!-- alert การกรอกข้อมูลไม่สมบูรณ์ หรือไม่ถูกต้อง -->
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- alert error ตาม controller -->
    @if(session('error'))
        <div class="alert alert-danger"> {{session('error')}} </div>
    @endif

    <!-- alert found info runner -->
    @if(!empty($success))
        <div class="alert alert-success">ลงทะเบียนเข้าร่วมโครงการวิ่งไร่พัทลุงแล้ว 🎉 
            <br></br>
            รหัสประจำตัวนักวิ่ง  : {{ $id }}
            <br>ชื่อ นามสกุล   : {{ $firstname}} {{ $lastname }}
            <br>อายุ         : {{ $age }} 
            <br>ระยะทางการวิ่งสะสม : {{ $distance }} กิโลเมตร
        </div>
    @endif

    <br>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="search_id"> ตรวจสอบข้อมูลนักวิ่ง </label>
            <input type="text" class="form-control" name="id" id="id" placeholder="ระบุไอดี " require>
        </div>

        <div class="col-md-3">
        <label style="color:white"> . </label>
            <button type="submit" class="btn btn-primary btn-block"> ค้นหา </button>
        </div>

        <div class="col-md-12">
        
        <h4><span class="tab2"> - เลือกเมนู "ลงทะเบียน" เพื่อเข้าร่วมการโครงการ </span> </h4>
        <h4><span class="tab2"> - เลือกเมนู "สะสมข้อมูลการวิ่ง" เพื่อสะสมระยะทางการวิ่งลุ้นรับรางวัล</span></h4>  
        </div>

       
       
    </div>


    
</form>
@endsection

