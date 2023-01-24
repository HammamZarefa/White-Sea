<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ItemsExport;
use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Shipment;
use App\Models\ShipmentItem;
use App\Models\ShipmentStatus;
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
        $items=ShipmentItem::where('is_active',1)->get();
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
        $status=ShipmentStatus::where('is_active',1)->get();
        return view('admin.items.create',compact('page_title','shipment','status'));
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
        $notify[] = ['success', 'Shipment added!'];
        if(ShipmentItem::create($data))
        return back()->withNotify($notify);
        else return back()->withNotify('error');
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
        $status=ShipmentStatus::where('is_active',1)->get();
        $page_title=$item->item_id;
        return view('admin.items.edit',compact('item','page_title','status'));
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
        $item=ShipmentItem::findorfail($id);
        $item->is_active=false;
        $item->save();
        $notify[] = ['success', 'Item Deleted'];
        return back()->withNotify($notify);
    }

   public function shipmentItems($id)
   {
       $shipment=Shipment::findorfail($id);
       $empty_message = 'No Result Found';
       $page_title = $shipment->title . '  ' . $shipment->shipment_id;
       $items=ShipmentItem::where('shipment',$id)->where('is_active',1)->with('status')->paginate(getPaginate());
       $status=ShipmentStatus::where('is_active',1)->get();
       return view('admin.items.index',compact('page_title','empty_message','items','shipment','status'));
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
        $status=ShipmentStatus::where('is_active',1)->get();
        $empty_message = 'No Result Found';
        return view('admin.items.index',compact('page_title','empty_message','items','shipment','status'));
    }

    public function export($id)
    {
        return Excel::download(new itemsExport($id), 'items.xlsx');
    }

    public function printItem($id)
    {
        $page_title='Print Item';
        $item=ShipmentItem::findorfail($id);
        $contents=explode('،',$item->packages_content );
        return view('admin.items.print',compact('item','page_title','contents'));
    }
}
