<?php

namespace App\Http\Controllers;

use App\Models\runner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Str;


class myController extends Controller
{
    //request จาก route get home  
    public function index() {
        return view('index');
    }

    //request จาก route post home ในกรณีผู้ใช้กดค้นหาข้อมูลนักวิ่ง 
    public function showInfoRunner(Request $request) {
        //รับ request id มาจากหน้า home 
        $this->validate($request, [
            'id' => 'required'
        ]);

        $id = $request['id'];

        //ตรวจสอบข้อมูลนักวิ่งบน DB แล้วเก็บไว้ในตัวแปล
        try {
            $check_runner = DB::table('runners')
            ->where('runner_id', $request->id)
            ->get();

            //กรณีระบุ IDไม่ครบหรือผิดพลาด จะส่ง messege error กลับไป 
            if(count($check_runner) == 0) {
                return back()->withError('ไม่พบข้อมูลนักวิ่งรหัสประจำตัวนักวิ่งนี้ กรุณาตรวจสอบใหม่')->withInput();
            }
            
            //ดึงข้อมูลจาก DB มาเก็บไว้ในตัวแปล
            $firstname = $check_runner[0]->Firstname;
            $lastname = $check_runner[0]->Lastname;
            $age = $check_runner[0]->Age;
            $distance = $check_runner[0]->Distance;

        //กรณีพบข้อผิดพลาด
        }catch(\Exception $exception) {
            return back()->withErrors($exception->getMessage())->withInput();
        }

        //ดึงข้อมูลจาก DB สำเร็จให้ส่งค่าแจ้งเตือนกลับไป พร้อมกับข้อมูลนักวิ่ง
        $success = true;

        return view('index', compact('success',$success,'id','firstname','lastname','age','distance'));
    }

    //request จาก route get register
    public function register() {
        return view('register_runner');
    }

    //request จาก route post register/created ในกรณีผู้ใช้กดลงทะเบียนข้อมูลนักวิ่ง  
    public function store(Request $request) {
        //รับ request ข้อมูล มาจากหน้า register 
        $this->validate($request, [
            'fname' => 'required',
            'lname' => 'required',
            'age' => 'required|numeric|between:1,120'
        ]);

        //random ID ตามเงื่อนไขตัวอักษรภาษาอังกฤษ 3 ตัวตามด้วยตัวเลข 3 ตัว
        try {
            $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $randomString = '';
            for ($i = 0; $i <3; $i++) {
                $randomString .= $characters[rand(0, strlen($characters))];
            }
            $randomInt = random_int(100, 999);

            //เมื่อ random ตัวอักษรและตัวเลขเสร็จนำมาต่อกัน แล้วเก็บไว้ในตัวแปล id
            $id = $randomString.(string)$randomInt;

            runner::create([
                'runner_id' => $id,
                'Firstname' => $request['fname'],
                'Lastname'  => $request['lname'],
                'Age'       => $request['age'],
                'Distance'  => 0
            ]);

        //กรณีพบข้อผิดพลาด
        }catch(\Exception $exception) {
            return back()->withErrors($exception->getMessage())->withInput();
        }

        //เพิ่มข้อมูลนักวิ่งลง DB สำเร็จให้ส่งค่าแจ้งเตือนกลับไป พร้อมกับแจ้งไอดีนักวิ่ง
        $success = true;

        return view('register_complete', compact('success',$success,'id'));

    }

    //request จาก route get distance
    public function insertDistance() {
        return view('insert_distance');
    }

    //request จาก route post distance/updated ในกรณีผู้ใช้บันทึกข้อมูลการสะสมระยะทางการวิ่ง   
    public function updateDistance(Request $request) {
        $this->validate($request, [
            //รับ request ข้อมูล มาจากหน้า distance 
            'id' => 'required',
            'distance' => 'required'
        ]);

        $id = $request['id'];

        try {
            //ตรวจสอบ ID นักวิ่ง 
            $check_runner = DB::table('runners')
            ->where('runner_id', $request->id)
            ->get();

            //กรณีระบุ IDไม่ครบหรือผิดพลาด จะส่ง messege error กลับไป 
            if(count($check_runner) == 0) {
                return back()->withError('ไม่พบรหัสประจำตัวนักวิ่งของคุณ กรุณาตรวจสอบใหม่')->withInput();
            }

            //กรณีระบุระยะทางเกิน 10 กิโลเมตร จะส่ง messege error กลับไป 
            else if($request->distance > 10) {
                return back()->withError('สะสมระยะทางได้ครั้งละไม่เกิน 10 กิโลเมตร')->withInput();
            }

            //นำระยะทางสะสมบน DB + ระยะทางที่ถูกเพิ่มเข้ามาจากหน้า layout = $collectDistance
            $collectDistance = $check_runner[0]->Distance + $request['distance'];

            //อัปเดตข้อมูล
            DB::table('runners')
            ->where('runner_id', $id)
            ->update([
                'Distance' => $collectDistance,
                'updated_at' => now()
            ]);
            
        //กรณีพบข้อผิดพลาด  
        }catch(\Exception $exception) {
            return back()->withErrors($exception->getMessage())->withInput();
        }

        //อัปเดต DB สำเร็จให้ส่งค่าแจ้งเตือนกลับไป พร้อมกับแจ้งไอดีนักวิ่ง และระยะทางสะสมปัจจุบัน
        $success = true;

        return view('insert_distance', compact('success',$success,'id','collectDistance'));
    }

    //request จาก route get rank ดึงข้อมูลนักวิ่งมาแสดงทั้งหมด
    public function showRank() {
        $rank_runner = runner::orderBy('distance','desc')
                ->get();

        return view('rank_runner', compact('rank_runner'));
    }

    //request จาก route get toprank กรณีผู้ใช้คลิกลิงก์ดูนักวิ่ง 10 อันดับแรก ที่มีระยะทางสะสมมากกว่า 42.125 ขึ้นไป 
    //ดึงข้อมูลนักวิ่งที่เป็นไปตามเงื่อนไขมาแสดง
    public function showTopRank() {

        $rank_runner  = DB::table('runners')
            ->where('Distance','>',42.195)
            ->limit(10)
            ->orderBy('Distance')
            ->get();
        return view('rank_runner', compact('rank_runner'));
    }
}
