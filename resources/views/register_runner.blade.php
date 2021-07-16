@extends('layouts.layout') <!-- เรียกใช้ layouts.layout -->
@section('title', 'ลงทะเบียน') <!-- กำหนด title tab-->
@section('header', 'ลงทะเบียนงานวิ่งไร่พัทลุง') <!-- กำหนด Header -->
@section('text')
<form action="{{ url('register/creted')}}" method="POST"  class="needs-validation" novalidate>
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

        <!-- parts 1 -->
        <div class="form-group col-md-12">
            <label for="input_fname"> ชื่อ </label>
            <input type="text" class="form-control" name="fname" id="fname" placeholder="ระบุชื่อ " require>
        </div>

        <div class="form-group col-md-12">
            <label for="input_lname"> นามสกุล </label>
            <input type="text" class="form-control" name="lname" id="lname" placeholder="ระบุนามสกุล" require>
        </div>

        <div class="form-group col-md-12">
            <label for="input_age"> อายุ </label>
            <input type="text" class="form-control" name="age" id="age" placeholder="ระบุอายุ" require>
        </div>
    </div>

    <!-- parts 2 -->
        <div class="col-md-4">
            <button type="submit" class="btn btn-primary btn-block"> ลงทะเบียน </button>
        </div>
         
</form>

@endsection