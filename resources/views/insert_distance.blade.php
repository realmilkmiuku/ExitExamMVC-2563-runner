@extends('layouts.layout') <!-- เรียกใช้ layouts.layout -->
@section('title', 'สะสมข้อมูลการวิ่ง') <!-- กำหนด title tab-->
@section('header', 'สะสมข้อมูลระยะทางในการวิ่ง') <!-- กำหนด Header -->
@section('text') <!-- กำหนด content -->

    <!-- ส่ง request ไปยัง co-controller  ที่  route url('distance/updated') -->
     <!-- route url('distance/updated') ส่ง request ไปยัง myController แล้วส่ง respon กลับมาที่ alert -->
    <form action="{{ url('distance/updated')}}" method="POST"  class="needs-validation" novalidate>
    {{ csrf_field() }}

    <div class="form-row">
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

    <!-- alert complete enter distance -->
    @if(!empty($success))
        <div class="alert alert-success">บันทึกข้อมูลสะสมการวิ่งแล้ว 🎉 
            <br>รหัสประจำตัวนักวิ่ง   : {{$id}}
            <br>ระยะทางการวิ่งสะสม : {{$collectDistance}} กิโลเมตร</div>
    @endif

        <!-- parts 1 -->
        <div class="form-group col-md-12">
            <label for="input_runner_id"> ID นักวิ่ง </label>
            <input type="text" class="form-control" name="id" id="id" placeholder="ระบุ ID ของคุณ เช่น AAA111" require>
        </div>

       
        <div class="form-group col-md-12">
            <label for="input_distance"> ระยะทาง </label>
            <input type="text" class="form-control" name="distance" id="distance" placeholder="ระบุระยะทาง เช่น 0.5" require>
            <div class = "invalid-feedback">
                <h6>ระบุระยะทางเป็นตัวเลขทศนิยมได้ และกำหนดการสะสมไม่เกิน 10 กิโลเมตร/ครั้ง  </h6>
            </div>
        </div>
            
        
    </div>
        <!-- parts 2 -->
        <div class="col-md-4">
            <button type="submit" class="btn btn-primary btn-block"> บันทึกข้อมูล </button>
        </div>
    
</form>


@endsection

    