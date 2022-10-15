<?php

namespace App\Http\Controllers;

use App\Models\Visitors;
use Illuminate\Http\Request;

use function PHPSTORM_META\map;

class VisitorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Visitors  $visitors
     * @return \Illuminate\Http\Response
     */
    public function show(Visitors $visitors)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Visitors  $visitors
     * @return \Illuminate\Http\Response
     */
    public function edit(Visitors $visitor)
    {
        return view('admin.panel.visitor.edit',[
            'visitor' => $visitor,
            'province_selected' => $visitor->province,
            'regency_selected' => $visitor->regency,
            'district_selected' => $visitor->district,
            'village_selected' => $visitor->village,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Visitors  $visitors
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $visitor = Visitors::find($id);
        $validation = $request->validate([
            'name' => 'required',
            'event_time' => 'required',
            'class' => 'required',
            'religion' => 'required',
            'gender' => 'required',
            'date_birth' => 'required',
            'province_id' => 'required',
            'regency_id' => 'required',
            'district_id' => 'required',
            'village_id' => 'required',
        ]); 
        $visitor->update($validation);
        return redirect(route('dashboard'))->with('toast_success', 'Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Visitors  $visitors
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Visitors::find($id);
        $user->delete();
        return back()->with('success', 'Data berhasil dihapus');
    }
}