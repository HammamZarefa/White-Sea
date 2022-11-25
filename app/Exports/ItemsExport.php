<?php

namespace App\Exports;


use App\Models\ShipmentItem;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ItemsExport implements FromCollection, WithHeadings
{
    protected $id;

    function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
       $items=ShipmentItem::where('shipment',$this->id)->get();

        return $items;
    }

    public function headings(): array
    {
        return [
            'Id',
            'shipment',
            'item_id',
            'sender_name',
            'sender_phone',
            'recipient_name',
            'recipient_phone',
            'destination',
            'packages_content',
            'packages_number',
            'received_packages',
            'lost_packages',
            'delivered_packages',
            'remaining_packages',
            'delivered_by',
            'delivered_date',
            'sending_date',
            'sending_notes',
            'cost',
            'down_payment',
            'second_installment',
            'remaining_amount',
            'notes',
            'status',
            'delivery_method'

        ];
    }
}

