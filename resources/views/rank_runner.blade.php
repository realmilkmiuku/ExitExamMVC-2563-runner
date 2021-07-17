@extends('layouts.layout') <!-- เรียกใช้ layouts.layout -->
@section('title', 'จัดอันดับนักวิ่ง') <!-- กำหนด title tab-->
@section('header', 'จัดอันดับนักวิ่ง') <!-- กำหนด Header -->
@section('text') <!-- กำหนด Content -->

@php
    $i = 0;
@endphp
<!-- parts 1 -->
    
    
        <a href="{{ URL::to('toprank') }}" type="button" class="btn btn-link"> >> 🏆 ดู 10 อันดับแรกที่มีสิทธิ์ได้รับเหรียญของงาน (ระยะทางสะสม 42.195 ขึ้นไป) 🏃‍♀️ << </a></li>
 
<!-- parts 2 ตารางจัดอันดับนักวิ่งทั้งหมด -->
<!-- กรณี กดลิงก์ดู 10 อันดับ จะแสดงข้อมูลตามเงื่อนไข -->
<br>

<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100 ver1">
					
					
					<div class="wrap-table100-nextcols js-pscroll">
						<div class="table100-nextcols">
							<table>
								<thead>
									<tr class="row100 head">
										<th>อันดับ</th>
										<th>รหัสประจำตัวนักวิ่ง</th>
										<th>ชื่อ</th>
										<th>นามสกุล</th>
										<th>ระยะทางในการวิ่ง</th>
										<th>วันที่อัปเดตข้อมูล</th>
									</tr>
								</thead>
								<tbody>
                                @foreach ($rank_runner as $data)
                                    @php
                                        $i++;
                                    @endphp
									<tr class="row100 body">
										<td>{{ $i }}</td>
                                        <td>{{$data->runner_id}}</td>
                                        <td>{{$data->Firstname}}</td>
                                        <td>{{$data->Lastname}}</td>
                                        <td>{{$data->Distance}}</td>
                                        <td>{{$data->updated_at}}</td>
									</tr>
									</tr>
                                    @endforeach  
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>



         

@endsection