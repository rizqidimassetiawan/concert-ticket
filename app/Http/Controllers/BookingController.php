<?php

namespace App\Http\Controllers;

use Throwable;
use App\Models\Band;
use App\Models\Visitors;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;

class BookingController extends Controller
{
    public function index()
    {
        $bands = Band::all();
        return view('guest.index',[
            'title' => 'Halaman Booking Tiket',
            'bands' => $bands,
        ]);
        
    }

    public function booking(Request $request)
    {
        $last = Visitors::all()->last();
        $validation = $request->validate([
            'name' => 'required',
            'band_id' => 'required',
            'event_time' => 'required',
            'class' => 'required',
            'province_id' => 'required',
            'regency_id' => 'required',
            'district_id' => 'required',
            'village_id' => 'required',
            'gender' => 'required',
            'religion' => 'required',
            'date_birth' => 'required',
        ]);
        $validation['no_ticket'] = fake()->regexify('[A-Z]{5}[0-4]{3}') . $last->id; 
        $validation['status'] = 0;
        Visitors::create($validation);
        $getData = Visitors::where('no_ticket',$validation['no_ticket'])->first();
        return redirect(route('success'))->with('data',$getData);

    }

    public function success(){
        $getData = session()->get('data');
        try{
            return view('cetak.bukti-regis',[
            'data' => $getData->id,
            ]);
        }catch(Throwable $e){
            return view('errors.404');
        }
    }

    public function print($id){
        $data = Visitors::find($id);
        $pdf = FacadePdf::loadView('cetak.print',['data' => $data]);
        $pdf->setPaper('A4','potrait');
        return $pdf->download('BuktiBookingTiket.pdf');
    }
}