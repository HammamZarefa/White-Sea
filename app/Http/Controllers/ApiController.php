<?php

namespace App\Http\Controllers;

use App\Models\AdminNotification;
use App\Models\Category;
use App\Models\GeneralSetting;
use App\Models\Order;
use App\Models\Service;
use App\Models\Shipment;
use App\Models\ShipmentItem;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Requests;

class ApiController extends Controller
{
    public function process(Request $request)
    {
        $rules = [
            'action' => 'required|string|in:status',
            'item_id' => 'required|integer'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator->errors()->getMessages());
        }
        $item = ShipmentItem::select('item_id', 'shipment', 'packages_number')->where('item_id', $request->item_id)->first();
        if (!$item) {
            return response()->json(['error' => 'Invalid Item Id']);
        }
        $shipment = Shipment::findorfail($item->shipment);
        $response['status'] = $shipment->status->name;
        $response['estimation'] = $shipment->estimation ;
        $response['item'] =$item;
        return response()->json($response);
    }

}
