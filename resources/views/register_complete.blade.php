@extends('layouts.layout') <!-- เรียกใช้ layouts.layout -->
@section('title', 'ลงทะเบียน') <!-- กำหนด title tab-->
@section('header', 'ลงทะเบียนงานวิ่งไร่พัทลุง') <!-- กำหนด Header -->
@section('text')

    <!-- alert complete enter distance -->
    @if(!empty($success))
        <div class="alert alert-success">ลงทะเบียนวิ่งไร่พัทลุงสำเร็จ 🎉 
            <h4> <span class="tab2"> รหัสของคุณคือ {{ $id }} </span> </h4>
    @endif

@endsection

