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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .cr-main-content {
            border: 1px solid gray;
        }

        .container-fluid {
            padding: 3rem 3rem;
        }

        .cr-card-header {
            display: flex;
            /* justify-content: space-between; */
        }


        .cr-invoice .invoice-wrapper .invoice-item-img {
            width: 35px;
        }

        .cr-invoice .invoice-wrapper address {
            font-size: 14px;
            color: #777;
            line-height: 24px;
        }

        .cr-invoice .invoice-wrapper p {
            font-size: 14px;
            font-weight: 600;
            color: #484d54;
        }

        .cr-invoice .invoice-wrapper .table-invoice {
            margin-top: 30px;
        }

        .cr-invoice .invoice-wrapper .table-invoice>thead>tr {
            background-color: #1b2237;
        }

        .cr-invoice .invoice-wrapper .table-invoice>thead>tr th {
            padding: 10px;
            color: #fff;
        }

        .cr-invoice .invoice-wrapper .table-invoice>tbody>tr:nth-of-type(even)>* {
            background-color: #fcfcfc;
        }

        .cr-invoice .invoice-wrapper .table-invoice>tbody>tr td {
            padding: 12px;
            font-size: 14px;
            color: #777;
        }

        .cr-invoice .invoice-wrapper .table-invoice>tbody>tr td:first-child {
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
        }

        .cr-invoice .invoice-wrapper .table-invoice>tbody>tr td:last-child {
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
        }

        .cr-invoice .invoice-wrapper .list-unstyled {
            margin: 24px 0 0 0;
        }

        .cr-invoice .invoice-wrapper .list-unstyled li {
            font-size: 15px;
            color: #484d54;
            font-weight: 500;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
        }

        .cr-invoice .invoice-wrapper .list-unstyled li span {
            color: #777;
        }

        .cr-invoice .invoice-wrapper .note {
            margin-top: 24px;
        }

        .cr-invoice .invoice-wrapper .note label {
            font-size: 15px;
            font-weight: 500;
            color: #484d54;
        }

        .cr-invoice .invoice-wrapper .note p {
            margin: 0;
            font-size: 13px;
            font-weight: 300;
            line-height: 26px;
            color: #999;
        }

        .cr-chart-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 2rem 0;
        }
    </style>
</head>

<body style="font-family: Arial, sans-serif;">
    <!-- main content -->
    <div class="cr-main-content container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="cr-card cr-invoice max-width-1170">
                        <div class="cr-card-header">
                            <h4 class="cr-card-title pb-3">Invoice</h4>
                            {{-- <div class="header-tools">
                                <button class="cr-btn-primary m-r-5">Save</button>
                                <button class="cr-btn-secondary">Print</button>
                            </div> --}}
                        </div>
                        <div class="cr-card-content card-default">

                            <div class="invoice-wrapper">

                                <div class="row">
                                    <div class="col-md-6 col-lg-3 col-sm-6">
                                        <img src="{{ asset('assets_ad') }}/img/logo/full-logo.png" alt="logo">

                                        <address>
                                            <br> 321, Porigo alto, new st george church, Nr. Jogas garden, USA.
                                        </address>
                                    </div>
                                    <div class="col-md-6 col-lg-3 col-sm-6">
                                        <p class="text-dark mb-2">From</p>

                                        <address>
                                            <span>Carrot</span>
                                            <br> 47 Elita Squre, VIP Chowk,
                                            <br> <span>Email:</span> example@gmail.com
                                            <br> <span>Phone:</span> +91 5264 251 325
                                        </address>
                                    </div>
                                    <div class="col-md-6 col-lg-3 col-sm-6">
                                        <p class="text-dark mb-2">To</p>

                                        <address>
                                            <span>{{ $detailOrder->customers->name }}</span>
                                            <br> {{ $detailOrder->customers->address }}
                                            <br> <span>Email</span>: {{ $detailOrder->customers->email }}
                                            <br> <span>Phone:</span>{{ $detailOrder->customers->phone }}
                                        </address>
                                    </div>
                                    <div class="col-md-6 col-lg-3 col-sm-6">
                                        <p class="text-dark mb-2">Details</p>

                                        <address>
                                            <span>Invoice ID:</span>
                                            <span>#{{ $detailOrder->shipment_detail->code_orders }}</span>
                                            @if ($detailOrder->shipment_detail->payment_id == 1)
                                                <br><span>Payment :</span> Payment on delivery
                                            @elseif($detailOrder->shipment_detail->payment_id == 4)
                                                <br><span>Payment :</span> Paid
                                            @endif
                                            <br><span>Payment :</span>
                                            {{ $detailOrder->shipment_detail->payment_id == 4 ? 'VnPay' : 'COD' }}
                                        </address>
                                    </div>
                                </div>
                                <div class="cr-chart-header">
                                    <div class="block">
                                        <h6>Invoice</h6>
                                        <h5>#{{ $detailOrder->shipment_detail->code_orders }}
                                        </h5>
                                    </div>
                                    <div class="block">
                                        <h6>Amount</h6>
                                        <h5>
                                            @if ($detailOrder->coupon_order)
                                                @php
                                                    $finalPrice = $detailOrder->totalPrice;
                                                    foreach ($detailOrder->coupon_order as $coupon) {
                                                        if ($coupon->coupons->coupon_condition == 1) {
                                                            $finalPrice -=
                                                                $finalPrice * ($coupon->coupons->coupon_number / 100);
                                                        } elseif ($coupon->coupons->coupon_condition == 2) {
                                                            $finalPrice -= $coupon->coupons->coupon_number;
                                                        }
                                                    }
                                                @endphp
                                                <h5 class="text-right fw-bold  " style="float: right;">
                                                    {{ number_format($finalPrice, 0, ',', '.') }}đ</h5>
                                            @else
                                                <h5 style="float: right;" class="text-right fw-bold   ">
                                                    {{ number_format($order_detail->totalPrice, 0, ',', '.') }}đ</h5>
                                            @endif
                                        </h5>
                                    </div>
                                    <div class="block">
                                        <h6>Quantity</h6>
                                        <h5 class="text-center">{{ $detailOrder->orders->sum('quantity') }}</h5>
                                    </div>
                                    <div class="block">
                                        <h6>Date</h6>
                                        <h5>{{ $detailOrder->created_at->format('d/m/Y') }}
                                        </h5>
                                    </div>
                                </div>
                                <div class="table-responsive tbl-800">
                                    <div>
                                        <table class="table-invoice table-striped" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Image</th>
                                                    <th>Item</th>
                                                    <th>Description</th>
                                                    <th>Quantity</th>
                                                    <th>Unit_Cost</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach ($detailOrder->orders as $value)
                                                    <tr>
                                                        <td >
                                                            {{ $loop->index + 1 }}</td>
                                                        <td><img
                                                                class="invoice-item-img"
                                                                src="{{ asset('storage/images/' . $value->products->image) }}"
                                                                alt="product-image" style="max-width: 100%;"></td>
                                                        <td >
                                                            {{ $value->products->name }}</td>
                                                        <td >Half Sleeve
                                                            men T-shirt with cap in Dark Blue Color.</td>
                                                        <td class="">
                                                            {{ $value->quantity }}</td>
                                                        <td >
                                                            {{ number_format($value->variants->sale_price) }} đ</td>
                                                        <td >
                                                            {{ number_format($value->quantity * $value->variants->sale_price) }}
                                                            đ</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="row justify-content-end inc-total">
                                    <div class="col-lg-9 order-lg-1 order-md-2 order-sm-2">
                                        <div class="note" >
                                            <label>Note</label>
                                            @if ($detailOrder->note)
                                                <p>{{ $detailOrder->note }}</p>
                                            @else
                                                {{-- <p>Your country territory tax has been apply.</p>
                                                <p>Your voucher cannot be applied, because you enter wrong code.
                                                </p> --}}
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-3 order-lg-2 order-md-1 order-sm-1">
                                        <ul class="list-unstyled" style="list-style: none; padding: 0;">
                                            <li class="mid pb-3 text-dark"
                                                style="padding-bottom: 10px; color: #333;">
                                                Subtotal
                                                <span class="d-inline-block float-right text-default"
                                                    style="float: right;">
                                                    {{ number_format($detailOrder->totalPrice) }} đ
                                                </span>
                                            </li>

                                            @if ($detailOrder->coupon_order)
                                                @foreach ($detailOrder->coupon_order as $coupon)
                                                    @if ($coupon->coupons->coupon_condition == 1)
                                                        <li class="mid pb-3 text-dark"
                                                            style="padding-bottom: 10px; color: #333;">
                                                            Sale
                                                            <span
                                                                class="d-inline-block float-right text-default"
                                                                style="float: right;">
                                                                -{{ number_format($detailOrder->totalPrice * ($coupon->coupons->coupon_number / 100)) }}đ
                                                            </span>
                                                        </li>
                                                    @elseif ($coupon->coupons->coupon_condition == 2)
                                                        <li class="mid pb-3 text-dark"
                                                            style="padding-bottom: 10px; color: #333;">
                                                            Sale
                                                            <span
                                                                class="d-inline-block float-right text-default"
                                                                style="float: right;">
                                                                -{{ number_format($coupon->coupons->coupon_number) }}đ
                                                            </span>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            @else
                                                <li class="mid pb-3 text-dark"
                                                    style="padding-bottom: 10px; color: #333;">
                                                    Sale
                                                    <span class="d-inline-block float-right text-default"
                                                        style="float: right;">
                                                        -0 đ
                                                    </span>
                                                </li>
                                            @endif


                                            <li class="text-dark" style="color: #333;">
                                                Total
                                                @if ($detailOrder->coupon_order)
                                                    @php
                                                        $finalPrice = $detailOrder->totalPrice;
                                                        foreach ($detailOrder->coupon_order as $coupon) {
                                                            if ($coupon->coupons->coupon_condition == 1) {
                                                                $finalPrice -=
                                                                    $finalPrice *
                                                                    ($coupon->coupons->coupon_number / 100);
                                                            } elseif ($coupon->coupons->coupon_condition == 2) {
                                                                $finalPrice -= $coupon->coupons->coupon_number;
                                                            }
                                                        }
                                                    @endphp

                                                    <span class="text-right fw-bold text-danger subTotal "
                                                        style="float: right;">
                                                        {{ number_format($finalPrice, 0, ',', '.') }}đ</span>
                                                @else
                                                    <span style="float: right;"
                                                        class="text-right fw-bold text-danger subTotal ">{{ number_format($detailOrder->totalPrice, 0, ',', '.') }}đ</span>
                                                @endif
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
</body>

</html>
