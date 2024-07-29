<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="admin, dashboard, ecommerce, panel" />
    <meta name="description" content="Carrot - Admin.">
    <meta name="author" content="ashishmaraviya">
    <title>Carrot - Admin.</title>
</head>

<body style="font-family: Arial, sans-serif;">
    <main class="wrapper sb-default" style="max-width: 800px; margin: auto;">
        <div class="cr-main-content container">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="cr-card cr-invoice max-width-1170"
                            style="border: 1px solid #ddd; padding: 20px; margin-bottom: 20px;">
                            <table class="cr-card-header" style="width: 100%">
                                <tr>
                                    <td style="width: 50%">
                                        <h4 class="cr-card-title" style="font-size: 24px; margin: 0;">Invoice</h4>
                                    </td>
                                    <td style="width: 50% ; float: right" class="header-tools">
                                        <button class="cr-btn-primary m-r-5"
                                            style="background-color: #007bff; color: white; border: none; padding: 10px 20px; cursor: pointer; margin-right: 5px;">Xác
                                            nhận đơn hàng</button>
                                        <button class="cr-btn-secondary"
                                            style="background-color: #6c757d; color: white; border: none; padding: 10px 20px; cursor: pointer;">Print</button>
                                    </td>
                                </tr>
                            </table>
                            <div class="cr-card-content card-default" style="padding: 20px;">
                                <div class="invoice-wrapper" style="margin: 20px 0;">
                                    <table style="width: 100%; border-collapse: collapse;">
                                        <tr>
                                            <td style="width: 25%; padding: 10px;">
                                                <img src="https://i.imgur.com/3ZXarfi.png" alt="logo"
                                                    style="max-width: 100%;">
                                                <address style="margin-top: 10px;">
                                                    321, Porigo alto, new st george church, Nr. Jogas garden, USA.
                                                </address>
                                            </td>
                                            <td style="width: 25%; padding: 10px;">
                                                <p style="font-weight: bold; margin-bottom: 5px;">From</p>
                                                <address>
                                                    <span>Carrot</span>
                                                    <br> 47 Elita Squre, VIP Chowk,
                                                    <br> <span>Email:</span> example@gmail.com
                                                    <br> <span>Phone:</span> +91 5264 251 325
                                                </address>
                                            </td>
                                            <td style="width: 25%; padding: 10px;">
                                                <p style="font-weight: bold; margin-bottom: 5px;">To</p>
                                                <address>
                                                    <span>{{ $order_detail->customers->name }}</span>
                                                    <br> {{ $order_detail->customers->address }}
                                                    <br> <span>Email</span>: {{ $order_detail->customers->email }}
                                                    <br> <span>Phone:</span>{{ $order_detail->customers->phone }}
                                                </address>
                                            </td>
                                            <td style="width: 25%; padding: 10px;">
                                                <p style="font-weight: bold; margin-bottom: 5px;">Details</p>
                                                <address>
                                                    <span>Invoice ID:</span>
                                                    <span>#{{ $order_detail->shipment_detail->shipment_detail }}</span>
                                                    @if ($order_detail->shipment_detail->payment_id == 1)
                                                        <br><span>Payment :</span> Payment on delivery
                                                    @elseif($order_detail->shipment_detail->payment_id == 4)
                                                        <br><span>Payment :</span> Payment on delivery
                                                    @endif
                                                    <br><span>Payment :</span> VnPay
                                                </address>
                                            </td>
                                        </tr>
                                    </table>

                                    <table class="cr-chart-header" style="width: 100%">
                                        <tr>
                                            <td style="width: 33%" class="block">
                                                <h6>Invoice</h6>
                                                <h5>#{{ $order_detail->shipment_detail->shipment_detail }}</h5>
                                            </td>
                                            <td style="width: 33%" class="block">
                                                <h6>Amount</h6>
                                                <h5>{{ number_format($order_detail->totalPrice) }} đ</h5>
                                            </td>

                                            <td style="width: 33%" class="block">
                                                <h6>Date</h6>
                                                <h5>{{ $order_detail->created_at->format('d-m-y') }}</h5>
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="table-responsive tbl-800" style="margin-bottom: 20px;">
                                        <table class="table-invoice table-striped"
                                            style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
                                            <thead>
                                                <tr>
                                                    <th style="border: 1px solid #ddd; padding: 10px;">#</th>
                                                    <th style="border: 1px solid #ddd; padding: 10px;">Image</th>
                                                    <th style="border: 1px solid #ddd; padding: 10px;">Item</th>
                                                    <th style="border: 1px solid #ddd; padding: 10px;">Description</th>
                                                    <th style="border: 1px solid #ddd; padding: 10px;">Quantity</th>
                                                    <th style="border: 1px solid #ddd; padding: 10px;">Unit Cost</th>
                                                    <th style="border: 1px solid #ddd; padding: 10px;">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($order_detail->orders as $value)
                                                    <tr>
                                                        <td style="border: 1px solid #ddd; padding: 10px;">
                                                            {{ $loop->index + 1 }}</td>
                                                        <td style="border: 1px solid #ddd; padding: 10px;"><img
                                                                class="invoice-item-img"
                                                                src="data:image/jpeg;base64,/9j/4AAQSkZJRg..."
                                                                alt="product-image" style="max-width: 100%;"></td>
                                                        <td style="border: 1px solid #ddd; padding: 10px;">
                                                            {{ $value->products->name }}</td>
                                                        <td style="border: 1px solid #ddd; padding: 10px;">Half Sleeve
                                                            men T-shirt with cap in Dark Blue Color.</td>
                                                        <td style="border: 1px solid #ddd; padding: 10px;">
                                                            {{ $value->quantity }}</td>
                                                        <td style="border: 1px solid #ddd; padding: 10px;">
                                                            {{ number_format($value->variants->sale_price) }} đ</td>
                                                        <td style="border: 1px solid #ddd; padding: 10px;">
                                                            {{ number_format($value->quantity * $value->variants->sale_price) }}
                                                            đ</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <table class="row justify-content-end inc-total" style="width: 100%">
                                        <tr>
                                            <td class="col-lg-9 order-lg-1 order-md-2 order-sm-2" style="width: 50%">
                                                <div class="note" style="margin-top: 20px; float: left">
                                                    <label>Note</label>
                                                    @if ($order_detail->note)
                                                        <p>{{ $order_detail->note }}</p>
                                                    @else
                                                        <p>Your country territory tax has been apply.</p>
                                                        <p>Your voucher cannot be applied, because you enter wrong code.
                                                        </p>
                                                    @endif

                                                </div>
                                            </td>
                                            <td class="col-lg-3 order-lg-2 order-md-1 order-sm-1"
                                                style="width:50%;float:right">
                                                <ul class="list-unstyled" style="list-style: none; padding: 0;">
                                                    <li class="mid pb-3 text-dark"
                                                        style="padding-bottom: 10px; color: #333;"> Subtotal
                                                        <span class="d-inline-block float-right text-default"
                                                            style="float: right;">{{ number_format($order_detail->TotalPrice) }} đ</span>
                                                    </li>
                                                    <li class="mid pb-3 text-dark"
                                                        style="padding-bottom: 10px; color: #333;">Vat(10%)
                                                        <span class="d-inline-block float-right text-default"
                                                            style="float: right;"></span>
                                                    </li>
                                                    <li class="text-dark" style="color: #333;">Total
                                                        <span class="d-inline-block float-right"
                                                            style="float: right;">{{ number_format($order_detail->totalPrice) }}
                                                            đ</span>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
