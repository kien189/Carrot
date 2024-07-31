@extends('Admin.master')
@section('main_admin')
    <base href="/">
    <div class="cr-main-content">
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
                                            <span>{{ $detailOrder->name }}</span>
                                            <br> {{ $detailOrder->address }}
                                            <br> <span>Email</span>: {{ $detailOrder->email }}
                                            <br> <span>Phone:</span> {{ $detailOrder->phone }}
                                        </address>
                                    </div>
                                    <div class="col-md-6 col-lg-3 col-sm-6">
                                        <p class="text-dark mb-2">Details</p>

                                        <address>
                                            <span>Invoice ID:</span>
                                            <span class="text-dark">#{{ $detailOrder->shipment_detail->code_orders }}</span>
                                            <br><span>Payment :</span>
                                            {{ $detailOrder->shipment_detail->payment_id == 4 ? 'VnPay' : 'COD' }}
                                            <br><span>Bank :</span>
                                            {{ $detailOrder->shipment_detail->payment_id == 4 ? 'NCB' : '' }}
                                            <br><span>Ship
                                                :</span>{{ $detailOrder->shipment_detail->delivery_id == 1 ? 'Free ship' : 'Economical delivery' }}
                                            {{-- <br> <span>VAT:</span> PL6541215450 --}}
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
                                        <h5>{{ $detailOrder->orders->sum('quantity') }}
                                        </h5>
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
                                                    <th>Size</th>
                                                    <th>Quantity</th>
                                                    <th>Unit_Cost</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach ($orders as $value)
                                                    <tr>
                                                        <td>{{ $loop->index + 1 }}</td>
                                                        <td><img class="invoice-item-img"
                                                                src="{{ asset('storage/images/' . $value->products->image) }}"
                                                                alt="product-image"></td>
                                                        <td>{{ $value->products->name }}</td>
                                                        <td>{{ $value->variants->size }}</td>
                                                        <td>{{ $value->quantity }}</td>
                                                        <td>{{ number_format($value->variants->sale_price) }} đ
                                                        </td>
                                                        <td>{{ number_format($value->variants->sale_price * $value->quantity) }}
                                                            đ</td>
                                                    </tr>
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
                                                    class="d-inline-block float-right text-default">{{ number_format($detailOrder->totalPrice) }}
                                                    đ</span>
                                            </li>
                                            @if ($detailOrder->coupon_order)
                                                @foreach ($detailOrder->coupon_order as $coupon)
                                                    @if ($coupon->coupons->coupon_condition == 1)
                                                        <li class="mid pb-3 text-dark"
                                                            style="padding-bottom: 10px; color: #333;">
                                                            Sale
                                                            <span class="d-inline-block float-right text-default"
                                                                style="float: right;">
                                                                -{{ number_format($detailOrder->totalPrice * ($coupon->coupons->coupon_number / 100)) }}đ
                                                            </span>
                                                        </li>
                                                    @elseif ($coupon->coupons->coupon_condition == 2)
                                                        <li class="mid pb-3 text-dark"
                                                            style="padding-bottom: 10px; color: #333;">
                                                            Sale
                                                            <span class="d-inline-block float-right text-default"
                                                                style="float: right;">
                                                                -{{ number_format($coupon->coupons->coupon_number) }}đ
                                                            </span>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            @else
                                                <li class="mid pb-3 text-dark" style="padding-bottom: 10px; color: #333;">
                                                    Sale
                                                    <span class="d-inline-block float-right text-default"
                                                        style="float: right;">
                                                        -0 đ
                                                    </span>
                                                </li>
                                            @endif
                                            {{-- <li class="mid pb-3 text-dark">Sale
                                                <span class="d-inline-block float-right text-default">$100.00</span>
                                            </li> --}}

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
@endsection
