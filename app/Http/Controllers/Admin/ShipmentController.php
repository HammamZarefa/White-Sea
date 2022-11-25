<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Shipment;
use Illuminate\Http\Request;

class ShipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title = 'الشحنات';
        $empty_message = 'No Result Found';
        $shipments=Shipment::all();
        return view('admin.shipments.index',compact('shipments','empty_message','page_title'));
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
        \request()->validate([
            'title' => 'required|string|max:70|unique:shipments,title',
            'open' => 'required',
            'sending' => 'required',
        ]);
        $request = \request();
        $shipment = new Shipment();
        $shipment->title = $request->title;
        $shipment->open_date=$request->open;
        $shipment->sending_date=$request->sending;
        $shipment->note=$request->note;
        $shipment->shipment_id=Now()->format('YmdHis');
        $shipment->status=1;
        $shipment->save();
        $notify[] = ['success', 'Shipment added!'];
        return back()->withNotify($notify);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        \request()->validate([
            'title' => 'required|string|max:70|unique:shipments,title',
            'open' => 'required',
            'sending' => 'required',
        ]);
        $shipment = Shipment::findorfail($id);
        $shipment->title = $request->title;
        $shipment->open_date=$request->open;
        $shipment->sending_date=$request->sending;
        $shipment->note=$request->note;
        $shipment->shipment_id=Now()->format('YmdHis');
        $shipment->status=1;
        $shipment->save();
        $notify[] = ['success', 'Shipment added!'];
        return back()->withNotify($notify);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function status($id)
    {
        $cat = Shipment::findOrFail($id);
        $cat->status = ($cat->status ? 0 : 1);
        $cat->save();

        $notify[] = ['success', 'Status updated!'];
        return back()->withNotify($notify);
    }
}
