<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ItemsExport;
use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Shipment;
use App\Models\ShipmentItem;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title = 'الإشعارات';
        $empty_message = 'No Result Found';
        $items=Item::all();
        return view('admin.items.index',compact('items','empty_message','page_title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($shipment)
    {
        $page_title = 'إضافة إشعار';
        return view('admin.items.create',compact('page_title','shipment'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data= $request->except(['_token']);
        ShipmentItem::create($data);
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
        $item=ShipmentItem::findorfail($id);
        $page_title=$item->item_id;
        return view('admin.items.details',compact('item','page_title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item=ShipmentItem::findorfail($id);
        $page_title=$item->item_id;
        return view('admin.items.edit',compact('item','page_title'));
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
        $data= $request->except(['_token']);
        $item=ShipmentItem::findorfail($id);
        $item->update($data);
        $notify[] = ['success', 'Shipment Updated!'];
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

   public function shipmentItems($id)
   {
       $shipment=Shipment::findorfail($id);
       $empty_message = 'No Result Found';
       $page_title = $shipment->title . '  ' . $shipment->shipment_id;
       $items=ShipmentItem::where('shipment',$id)->paginate(getPaginate());
       return view('admin.items.index',compact('page_title','empty_message','items','shipment'));
   }

    public function search(Request $request,$shipment)
    {

        if ($request->search){
            $search = $request->search;
            $page_title = "Search results for {{$search}}";
            $items = ShipmentItem::where('shipment',$shipment)->where('sender_name', 'like', "%$search%")->orWhere('recipient_name', 'like', "%$search%")
                ->orWhere('item_id','like', "%$search%")->latest('id')->paginate(getPaginate());
        } else {
            $page_title = 'All Orders';
            $search = '';
            $items=ShipmentItem::where('shipment',$shipment)->paginate(getPaginate());
        }
//        $shipment=Shipment::findorfail($request->shipment);
        $empty_message = 'No Result Found';
        return view('admin.items.index',compact('page_title','empty_message','items','shipment'));
    }

    public function export($id)
    {
        return Excel::download(new itemsExport($id), 'items.xlsx');
    }
}
