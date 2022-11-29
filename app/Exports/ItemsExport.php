<?php

namespace App\Exports;


use App\Models\ShipmentItem;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ItemsExport implements FromCollection, WithHeadings , WithEvents ,WithStyles
{
    protected $id;

    function __construct($id)
    {
        $this->id = $id;
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $event->sheet->getDelegate()->setRightToLeft(true);
            },
        ];
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
       $items=ShipmentItem::select('item_id','sender_name','sender_phone',
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
           'delivery_method')->where('shipment',$this->id)->get();

        return $items;
    }

    public function headings(): array
    {
        return [
            'رقم الإشعار',
            'اسم المرسل',
            'رقم المرسل',
            'اسم المستلم',
            'رقم المستلم',
            'الوجهة',
            'محتويات الشحن',
            'عدد الطرود',
            'واصل',
            'نقص',
            'تم التوزيع',
            'الباقي للتوزيع',
            'اسم الموزع',
            'تاريخ التوزيع',
            'تاريخ الإرسال',
            'ملاحظات الإرسال',
            'الكلفة',
            'دفعة اولى',
            'الدفعة الاخيرة',
            'الباقي',
            'ملاحظات',
            'حالة الشحن',
            'طريقة التوصيل'

        ];

    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true]],

            // Styling an entire column.
//            'C'  => ['Width' => 500],
        ];
    }
}


//return [
//    'item_id',
//    'sender_name',
//    'sender_phone',
//    'recipient_name',
//    'recipient_phone',
//    'destination',
//    'packages_content',
//    'packages_number',
//    'received_packages',
//    'lost_packages',
//    'delivered_packages',
//    'remaining_packages',
//    'delivered_by',
//    'delivered_date',
//    'sending_date',
//    'sending_notes',
//    'cost',
//    'down_payment',
//    'second_installment',
//    'remaining_amount',
//    'notes',
//    'status',
//    'delivery_method'
//
//];