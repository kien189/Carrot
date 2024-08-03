<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Oder_detail;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class InvoiceOrderController extends Controller
{
    public function invoice($id)
    {
        $order_detail = Oder_detail::find($id);
        // dd($detailOrder);

        // return view('Fe.Invoice.invoice1',compact('detailOrder','orders'));
        $pdf = Pdf::loadView('Fe.Mail.invoice1', compact('order_detail'));
        return $pdf->download('invoice.pdf');
    }

}
