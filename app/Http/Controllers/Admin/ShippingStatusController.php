<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ShipmentStatus;
use Illuminate\Http\Request;

class ShippingStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title = 'Shipping Status';
        $empty_message = 'No Result Found';
        $status = ShipmentStatus::all();
        return view('admin.status.index', compact('status', 'page_title', 'empty_message'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $status = new ShipmentStatus();
        $status->name = $request->name;

        if ($status->save()) {
            return redirect()->route('admin.status.index')->with('success', 'Data added successfully');
        } else {
            return redirect()->route('admin.status.index')->with('error', 'Data failed to add');

        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ShipmentStatus $status)
    {
        $status->name = $request->name;

        if ($status->update()) {
            return redirect()->route('admin.status.index')->with('success', 'Data updated successfully');
        } else {
            return redirect()->route('admin.status.index')->with('error', 'Data failed to update');

        }
    }

    public function changeStatus(ShipmentStatus $status)
    {
        $status->is_active = ($status->is_active ? 0 : 1);
        $status->save();
        $notify[] = ['success', 'Status updated!'];
        return back()->withNotify($notify);
    }
}
