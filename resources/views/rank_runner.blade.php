@extends('layouts.layout') <!-- เรียกใช้ layouts.layout -->
@section('title', 'จัดอันดับนักวิ่ง') <!-- กำหนด title tab-->
@section('header', 'จัดอันดับนักวิ่ง') <!-- กำหนด Header -->
@section('text') <!-- กำหนด Content -->

@php
    $i = 0;
@endphp
<!-- parts 1 -->
    
    
        <a href="{{ URL::to('toprank') }}" type="button" class="btn btn-link">ดู 10 อันดับแรกที่มีสิทธิ์ได้รับเหรียญของงาน (ระยะทางสะสม 42.195 ขึ้นไป)</a></li>
    
<br>
<!-- parts 2 ตารางจัดอันดับนักวิ่งทั้งหมด -->
<br>
<table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">อันดับ</th>
            <th scope="col">รหัสประจำตัวนักวิ่ง</th>
            <th scope="col">ชื่อ</th>
            <th scope="col">นามสกุล</th>
            <th scope="col">ระยะทางในการวิ่ง</th>
            <th scope="col">วันที่อัปเดตข้อมูล</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($rank_runner as $data)
            @php
                $i++;
            @endphp

            <tr>
                <th scope="row">{{ $i }}</th>
                <td>{{$data->runner_id}}</td>
                <td>{{$data->Firstname}}</td>
                <td>{{$data->Lastname}}</td>
                <td>{{$data->Distance}}</td>
                <td>{{$data->updated_at}}</td>
            </tr>
        @endforeach    
    </tbody>
</table>


         

@endsection