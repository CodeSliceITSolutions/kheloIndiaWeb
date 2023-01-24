<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LuckyThree;
use App\Models\LuckyThreePlus;
use App\Models\MaxThreePlus;
use Auth;

class LuckyDrawController extends Controller
{
    public function index() {
        $LuckyThreeLastResult = LuckyThree::orderBy('draw_date','DESC')->first();
        $LuckyThreePlusLastResult = LuckyThreePlus::orderBy('draw_date','DESC')->first();
        $MaxThreePlusLastResult = MaxThreePlus::orderBy('draw_date','DESC')->first();
        return view('website.welcome')->with([
            "LuckyThreeLastResult" => $LuckyThreeLastResult,
            "LuckyThreePlusLastResult" => $LuckyThreePlusLastResult,
            "MaxThreePlusLastResult" => $MaxThreePlusLastResult
        ]);
    }
    public function viewAdminDashboard() {
        return view('admin.dashboard');
    }
    
    public function viewAdminDrawLucky3() {
        $data = LuckyThree::viewLuckyThree();
        return view('admin.draw-lucky3')->with(['data' => $data]);
    }
    
    public function viewAdminDrawLucky3Plus() {
        $data = LuckyThreePlus::viewLuckyThreePlus();
        return view('admin.draw-lucky3-plus')->with(['data' => $data]);
    }
    
    public function viewAdminDrawMax3Plus() {
        $data = MaxThreePlus::viewMaxThreePlus();
        return view('admin.draw-max3-plus')->with(['data' => $data]);
    }

    public function viewAdminDrawLucky3Save(Request $request) {
        $request->validate([
            'draw_id' => ['required', 'string', 'max:15'],
            'draw_title' => ['required', 'string', 'max:60'],
            'draw_date' => ['required'],
            'draw_time' => ['required'],
            'draw_result' => ['required', 'string', 'max:60']
        ]);

        $data = [
            'draw_id' => $request->draw_id,
            'draw_title' => $request->draw_title,
            'draw_date' => $request->draw_date,
            'draw_time' => $request->draw_time,
            'draw_result' => $request->draw_result,
            'created_by' => Auth::user()->id,
            'updated_by' => Auth::user()->id
        ];

        LuckyThree::addLuckyThree($data);

        return redirect()->back()->with('success', 'Lucky draw added successfully.');
    }

    public function viewAdminDrawLucky3PlusSave(Request $request) {
        $request->validate([
            'draw_id' => ['required', 'string', 'max:15'],
            'draw_title' => ['required', 'string', 'max:60'],
            'draw_date' => ['required'],
            'draw_time' => ['required'],
            'draw_result' => ['required', 'string', 'max:60']
        ]);

        $data = [
            'draw_id' => $request->draw_id,
            'draw_title' => $request->draw_title,
            'draw_date' => $request->draw_date,
            'draw_time' => $request->draw_time,
            'draw_result' => $request->draw_result,
            'created_by' => Auth::user()->id,
            'updated_by' => Auth::user()->id
        ];

        LuckyThreePlus::addLuckyThreePlus($data);

        return redirect()->back()->with('success', 'Lucky draw added successfully.');
    }

    public function viewAdminDrawMax3PlusSave(Request $request) {
        $request->validate([
            'draw_id' => ['required', 'string', 'max:15'],
            'draw_title' => ['required', 'string', 'max:60'],
            'draw_date' => ['required'],
            'draw_time' => ['required'],
            'draw_result' => ['required', 'string', 'max:60']
        ]);

        $data = [
            'draw_id' => $request->draw_id,
            'draw_title' => $request->draw_title,
            'draw_date' => $request->draw_date,
            'draw_time' => $request->draw_time,
            'draw_result' => $request->draw_result,
            'created_by' => Auth::user()->id,
            'updated_by' => Auth::user()->id
        ];

        MaxThreePlus::addMaxThreePlus($data);

        return redirect()->back()->with('success', 'Max three draw added successfully.');
    }

    public function viewDashboard() {
        return view('dashboard');
    }
    
    public function viewDrawLucky3() {
        $data = LuckyThree::viewLuckyThree();
        $lastDrawDate = LuckyThree::orderBy('draw_date','DESC')->first();
        return view('website.draw-lucky3')->with(['data' => $data, "lastDrawDate" => $lastDrawDate]);
    }
    
    public function viewDrawLucky3Plus() {
        $data = LuckyThreePlus::viewLuckyThreePlus();
        $lastDrawDate = LuckyThreePlus::orderBy('draw_date','DESC')->first();
        return view('website.draw-lucky3-plus')->with(['data' => $data, "lastDrawDate" => $lastDrawDate]);
    }
    
    public function viewDrawMax3Plus() {
        $data = MaxThreePlus::viewMaxThreePlus();
        $lastDrawDate = MaxThreePlus::orderBy('draw_date','DESC')->first();
        return view('website.draw-max3-plus')->with(['data' => $data, "lastDrawDate" => $lastDrawDate]);
    }

    public function deleteLuckyThree($id) {
        LuckyThree::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Record deleted successful');
    }

    public function deleteLuckyThreePlus($id) {
        LuckyThreePlus::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Record deleted successful');
    }

    public function deleteMaxThreePlus($id) {
        MaxThreePlus::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Record deleted successful');
    }
}
