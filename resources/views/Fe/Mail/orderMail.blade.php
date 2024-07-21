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
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .wrapper {
            max-width: 800px;
            margin: auto;
        }

        .hidden {
            display: none;
        }

        .cr-card {
            border: 1px solid #ddd;
            padding: 20px;
            margin-bottom: 20px;
        }

        .cr-card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #ddd;
            margin-bottom: 20px;
        }

        .cr-card-title {
            font-size: 24px;
            margin: 0;
        }

        .header-tools button {
            margin-left: 10px;
        }

        .cr-card-content {
            padding: 20px;
        }

        .invoice-wrapper {
            margin: 20px 0;
        }

        .cr-chart-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .table-invoice {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .table-invoice th,
        .table-invoice td {
            border: 1px solid #ddd;
            padding: 10px;
        }

        .list-unstyled {
            list-style: none;
            padding: 0;
        }

        .list-unstyled li {
            padding: 5px 0;
        }

        .note {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <main class="wrapper sb-default">
        <div class="cr-main-content container">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="cr-card cr-invoice max-width-1170">
                            <div class="cr-card-header">
                                <h4 class="cr-card-title">Invoice</h4>
                                <div class="header-tools">
                                    <button class="cr-btn-primary m-r-5">Save</button>
                                    <button class="cr-btn-secondary">Print</button>
                                </div>
                            </div>
                            <div class="cr-card-content card-default">
                                <div class="invoice-wrapper">
                                    <div class="row">
                                        <div class="col-md-6 col-lg-3 col-sm-6">
                                            <img src="{{ asset('assets_ad/img/logo/full-logo.png') }}" alt="logo">
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
                                                <span>{{ $order_detail->customers->name }}</span>
                                                <br> {{ $order_detail->customers->address }}
                                                <br> <span>Email</span>: {{ $order_detail->customers->email }}
                                                <br> <span>Phone:</span>{{ $order_detail->customers->phone }}
                                            </address>
                                        </div>
                                        <div class="col-md-6 col-lg-3 col-sm-6">
                                            <p class="text-dark mb-2">Details</p>
                                            <address>
                                                <span>Invoice ID:</span>
                                                <span class="text-dark">#FX6874</span>
                                                <br><span>TAX :</span> 5835FA5****5S
                                                <br><span>Bank :</span> Lotus bank
                                                <br><span>IFCS :</span> LOT125****US
                                                <br> <span>VAT:</span> PL6541215450
                                            </address>
                                        </div>
                                    </div>
                                    <div class="cr-chart-header">
                                        <div class="block">
                                            <h6>Invoice</h6>
                                            <h5>#FX6874</h5>
                                        </div>
                                        <div class="block">
                                            <h6>Amount</h6>
                                            <h5>$8954.00</h5>
                                        </div>
                                        <div class="block">
                                            <h6>Quantity</h6>
                                            <h5>30</h5>
                                        </div>
                                        <div class="block">
                                            <h6>Date</h6>
                                            <h5>25/05/2023</h5>
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
                                                    @foreach ($order_detail->orders as $value)
                                                        <tr>
                                                            <td>{{ $loop->index + 1 }}</td>
                                                            <td><img class="invoice-item-img"
                                                                    src="data:image/jpeg;base64,/9j/4AAQSkZJRg..."
                                                                    alt="product-image"></td>
                                                            <td>{{ $value->products->name }}</td>
                                                            <td>Half Sleeve men T-shirt with cap in Dark Blue Color.
                                                            </td>
                                                            <td>{{ $value->quantity }}</td>
                                                            <td>{{ number_format($value->variants->sale_price) }} đ</td>
                                                            <td>{{ number_format($value->quantity * $value->variants->sale_price) }}
                                                                đ</td>
                                                        </tr>
                                                        <span class="d-inline-block float-right">
                                                            {{ number_format($order_detail->orders->totalPrice) }}
                                                            đ</span>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row justify-content-end inc-total">
                                        <div class="col-lg-9 order-lg-1 order-md-2 order-sm-2">
                                            <div class="note">
                                                <label>Note</label>
                                                <p>Your country territory tax has been apply.</p>
                                                <p>Your voucher cannot be applied, because you enter wrong code.</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 order-lg-2 order-md-1 order-sm-1">
                                            <ul class="list-unstyled">
                                                <li class="mid pb-3 text-dark"> Subtotal
                                                    <span
                                                        class="d-inline-block float-right text-default">$1200.00</span>
                                                </li>
                                                <li class="mid pb-3 text-dark">Vat(10%)
                                                    <span class="d-inline-block float-right text-default">$100.00</span>
                                                </li>
                                                <li class="text-dark">Total
                                                    {{-- <span class="d-inline-block float-right"> {{ number_format($order_detail->orders->totalPrice) }} đ</span> --}}
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
    </main>
</body>

</html>
