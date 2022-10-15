<?php

namespace App\Http\Controllers;

use App\Models\Visitors;
use Illuminate\Http\Request;
use Illuminate\Support\Js;

class UniversalController extends Controller
{
    
    public function dashboard()
    {
        $visitors = Visitors::all();
        $countAll = Visitors::all()->count();
        $countPending = Visitors::where('status',1)->count();
        $countHadir = Visitors::where('status',0)->count();
        $hadir = Visitors::where('status',1)->get();
        $pending = Visitors::where('status',0)->get();
        return view('admin.panel.dashboard',[
            'visitors' => $visitors->load('band'),
            'countAll' => $countAll,
            'countPending' => $countPending,
            'countHadir' => $countHadir,
            'hadirs' => $hadir,
            'pending' => $pending,
        ]);
    }

    public function checkIn()
    {
        // dd(Request('search'));

        return view('admin.panel.checkin.index');
    }

    public function search()
    {
        $data = Visitors::where('no_ticket',request('search'))->first();
        return response()->json([
            'data' => $data
        ]);
    }

    public function verify($id)
    {
        $data = Visitors::find($id);
        $data->status = 1;
        $data->update();
        return back()->with('toast_success', 'Konfirmasi Berhasil Dilakukan');
    }
}