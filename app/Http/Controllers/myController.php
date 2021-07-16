<?php

namespace App\Http\Controllers;

use App\Models\runner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Str;


class myController extends Controller
{
    public function index() {
        return view('index');
    }

    public function showInfoRunner(Request $request) {
        $this->validate($request, [
            'id' => 'required'
        ]);

        $id = $request['id'];

        try {
            $check_runner = DB::table('runners')
            ->where('runner_id', $request->id)
            ->get();

            if(count($check_runner) == 0) {
                return back()->withError('ไม่พบข้อมูลนักวิ่งรหัสประจำตัวนักวิ่งนี้ กรุณาตรวจสอบใหม่')->withInput();
            }
            
            $firstname = $check_runner[0]->Firstname;
            $lastname = $check_runner[0]->Lastname;
            $age = $check_runner[0]->Age;
            $distance = $check_runner[0]->Distance;

        }catch(\Exception $exception) {
            return back()->withErrors($exception->getMessage())->withInput();
        }

        $success = true;

        return view('index', compact('success',$success,'id','firstname','lastname','age','distance'));
    }

    public function register() {
        return view('register_runner');
    }

    public function insertDistance() {
        return view('insert_distance');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'fname' => 'required',
            'lname' => 'required',
            'age' => 'required|numeric|between:1,120'
        ]);

        try {
            $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $randomString = '';
            for ($i = 0; $i <3; $i++) {
                $randomString .= $characters[rand(0, strlen($characters))];
            }
            $randomInt = random_int(100, 999);
            $id = $randomString.(string)$randomInt;

            runner::create([
                'runner_id' => $id,
                'Firstname' => $request['fname'],
                'Lastname'  => $request['lname'],
                'Age'       => $request['age'],
                'Distance'  => 0
            ]);
        }
        catch(\Exception $exception) {
            return back()->withErrors($exception->getMessage())->withInput();
        }

        $success = true;

        return view('register_complete', compact('success',$success,'id'));

    }


    public function updateDistance(Request $request) {
        $this->validate($request, [
            'id' => 'required',
            'distance' => 'required'
        ]);

        $id = $request['id'];

        try {
            $check_runner = DB::table('runners')
            ->where('runner_id', $request->id)
            ->get();

            if(count($check_runner) == 0) {
                return back()->withError('ไม่พบรหัสประจำตัวนักวิ่งของคุณ กรุณาตรวจสอบใหม่')->withInput();
            }

            else if($request->distance > 10) {
                return back()->withError('สะสมระยะทางได้ครั้งละไม่เกิน 10 กิโลเมตร')->withInput();
            }

            $collectDistance = $check_runner[0]->Distance + $request['distance'];

            DB::table('runners')
            ->where('runner_id', $id)
            ->update([
                'Distance' => $collectDistance,
                'updated_at' => now()
            ]);
            

        }catch(\Exception $exception) {
            return back()->withErrors($exception->getMessage())->withInput();
        }

        $success = true;

        return view('insert_distance', compact('success',$success,'id','collectDistance'));
    }

    public function showRank() {

        $rank_runner = runner::orderBy('distance','desc')
                ->take(10)
                ->get();

        return view('rank_runner', compact('rank_runner'));
    }

    public function showTopRank() {

        $rank_runner  = DB::table('runners')
            ->where('Distance','>',42.195)
            ->limit(10)
            ->orderBy('Distance')
            ->get();

        return view('rank_runner', compact('rank_runner'));
    }
}
