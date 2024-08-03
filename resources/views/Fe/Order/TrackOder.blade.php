@extends('Fe.layout.master')
@section('main_fe')
    <!-- Breadcrumb -->
    <section class="section-breadcrumb">
        <div class="cr-breadcrumb-image">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="cr-breadcrumb-title">
                            <h2>Track Order</h2>
                            <span> <a href="index.html">Home</a> - Track Order</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Track Order section -->
    <section class="cr-track padding-tb-100">
        <div class="container">
            <div class="row d-none">
                <div class="col-lg-12">
                    <div class="mb-30" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                        <div class="cr-banner">
                            <h2>Popular Products</h2>
                        </div>
                        <div class="cr-banner-sub-title">
                            <p>We delivering happiness and needs, Faster than you can think.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="container">
                    <div class="cr-track-box">
                        @if (isset($checkOrder))
                            <!-- Details-->
                            <div class="row">
                                <div class="col-md-4 m-b-767">
                                    <div class="cr-track-card"><span
                                            class="cr-track-title">order</span><span>#{{ $checkOrder->code_order }} </span>
                                    </div>
                                </div>
                                <div class="col-md-4 m-b-767">
                                    <div class="cr-track-card"><span
                                            class="cr-track-title">SubTotal</span><span>{{ number_format($checkOrder->totalPrice) }}
                                            đ</span>
                                    </div>
                                </div>

                                <div class="col-md-4 m-b-767">
                                    <div class="cr-track-card"><span class="cr-track-title">Expected
                                            date</span><span>{{ \Carbon\Carbon::parse($checkOrder->created_at)->addDays(3)->format('d-m-Y') }}
                                        </span></div>
                                </div>
                            </div>
                            <div class="cr-steps">
                                <div class="cr-steps-body">
                                    <div
                                        class="cr-step {{ $checkOrder->status >= 1 ? 'cr-step-completed' : '' }}">
                                        <span class="cr-step-indicator">
                                            @if ($checkOrder->status >= 1)
                                                <i class="ri-check-line"></i>
                                            @endif
                                        </span>
                                        <span class="cr-step-icon">
                                            <i class="ri-shield-check-line"></i>
                                        </span>
                                        Order<br> confirmed
                                    </div>

                                    <div
                                        class="cr-step {{ $checkOrder->status >= 2 ? 'cr-step-completed' : '' }}">
                                        <span class="cr-step-indicator">
                                            @if ($checkOrder->status >= 2)
                                                <i class="ri-check-line"></i>
                                            @endif
                                        </span>
                                        <span class="cr-step-icon">
                                            <i class="ri-settings-4-line"></i>
                                        </span>
                                        Processing<br> order
                                    </div>
                                    <div
                                        class="cr-step {{ $checkOrder->status >= 3 ? 'cr-step-completed' : '' }} ">
                                        <span class="cr-step-indicator">
                                            @if ($checkOrder->status >= 3)
                                                <i class="ri-check-line"></i>
                                            @endif
                                        </span>
                                        <span class="cr-step-icon">
                                            <i class="ri-gift-line"></i>
                                        </span>
                                        Quality<br> check
                                    </div>
                                    <div
                                        class="cr-step {{ $checkOrder->status >= 4 ? 'cr-step-completed' : '' }}">
                                        <span class="cr-step-indicator">
                                            @if ($checkOrder->status >= 4)
                                                <i class="ri-check-line"></i>
                                            @endif
                                        </span>
                                        <span class="cr-step-icon">
                                            <i class="ri-truck-line"></i>
                                        </span>
                                        Product<br> dispatched
                                    </div>
                                    <div
                                        class="cr-step {{ $checkOrder->status >= 5 ? 'cr-step-completed' : '' }} ">
                                        <span class="cr-step-indicator">
                                            @if ($checkOrder->status >= 5)
                                                <i class="ri-check-line"></i>
                                            @endif
                                        </span>
                                        <span class="cr-step-icon">
                                            <i class="ri-home-5-line"></i>
                                        </span>
                                        Product<br> delivered
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="container pt-4 pb-4">
                                <table class="table table-bordered ">
                                    <thead>
                                        <tr>
                                            <td>ID</td>
                                            <td>ID</td>
                                            <td>ID</td>
                                            <td>ID</td>
                                            <td>ID</td>
                                            <td>ID</td>
                                            <td>ID</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <tr>
                                                <td>{{ $productOrders->index+1 }}</td>
                                                <td>{{ $productOrders->products->name}}</td>
                                                <td><img src="{{ asset('storage/images/'.$productOrders->products->image) }}" alt="" width="100px"></td>
                                                <td>{{ $checkOrder->quantity}}</td>
                                                {{-- <td>{{ $productOrders->o }}</td> --}}
                            {{-- </tr>
                                    </tbody>
                                </table>
                            </div> --}}

                            <!-- Progress-->
                            {{-- <div class="cr-steps">
                                <div class="cr-steps-body">
                                    <div class="cr-step cr-step-completed">
                                        <span class="cr-step-indicator">
                                            <i class="ri-check-line"></i>
                                        </span>
                                        <span class="cr-step-icon">
                                            <i class="ri-shield-check-line"></i>
                                        </span>Order<br> confirmed
                                    </div>

                                    <div class="cr-step cr-step-completed">
                                        <span class="cr-step-indicator">
                                            <i class="ri-check-line"></i>
                                        </span>
                                        <span class="cr-step-icon">
                                            <i class="ri-settings-4-line"></i>
                                        </span>Processing<br> order
                                    </div>
                                    <div class="cr-step cr-step-active">
                                        <span class="cr-step-icon">
                                            <i class="ri-gift-line"></i>
                                        </span>Quality<br> check
                                    </div>
                                    <div class="cr-step">
                                        <span class="cr-step-icon">
                                            <i class="ri-truck-line"></i>
                                        </span>Product<br> dispatched
                                    </div>
                                    <div class="cr-step">
                                        <span class="cr-step-icon">
                                            <i class="ri-home-5-line"></i>
                                        </span>Product<br> delivered
                                    </div>
                                </div>
                            </div> --}}
                            <div class="text-center mt-3">
                                <form class="cr-search d-flex justify-content-center align-items-center" action=""
                                    method="post">
                                    @csrf
                                    <div class="input-group w-50">
                                        <input class="form-control" name="trackOrder" type="text"
                                            placeholder="Look up your order..." required>
                                        <div class="input-group-append">
                                            <button style="background-color: #64b496" class="btn btn-secondary"
                                                type="submit">
                                                <i class="ri-search-line"></i>
                                            </button>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        @else
                            <!-- Details-->
                            <div class="row">
                                <div class="col-md-4 m-b-767">
                                    <div class="cr-track-card"><span class="cr-track-title">order</span><span>#9857</span>
                                    </div>
                                </div>
                                <div class="col-md-4 m-b-767">
                                    <div class="cr-track-card"><span
                                            class="cr-track-title">Grasshoppers</span><span>M254HT</span></div>
                                </div>

                                <div class="col-md-4 m-b-767">
                                    <div class="cr-track-card"><span class="cr-track-title">Expected date</span><span>Feb
                                            17, 2025</span></div>
                                </div>
                            </div>
                            {{-- <div class="cr-steps">
                            <div class="cr-steps-body">
                                <div class="cr-step {{ $checkOrder->orders->status >= 1 ? 'cr-step-completed' : '' }}">
                                    <span class="cr-step-indicator">
                                        @if ($checkOrder->orders->status >= 1)
                                            <i class="ri-check-line"></i>
                                        @endif
                                    </span>
                                    <span class="cr-step-icon">
                                        <i class="ri-shield-check-line"></i>
                                    </span>
                                    Order<br> confirmed
                                </div>

                                <div class="cr-step {{ $checkOrder->orders->status >= 2 ? 'cr-step-completed' : '' }}">
                                    <span class="cr-step-indicator">
                                        @if ($checkOrder->orders->status >= 2)
                                            <i class="ri-check-line"></i>
                                        @endif
                                    </span>
                                    <span class="cr-step-icon">
                                        <i class="ri-settings-4-line"></i>
                                    </span>
                                    Processing<br> order
                                </div>
                                <div
                                    class="cr-step {{ $checkOrder->orders->status >= 3 ? 'cr-step-completed' : '' }} {{ $checkOrder->orders->status == 3 ? 'cr-step-active' : '' }}">
                                    <span class="cr-step-icon">
                                        <i class="ri-gift-line"></i>
                                    </span>
                                    Quality<br> check
                                </div>
                                <div
                                    class="cr-step {{ $checkOrder->orders->status >= 4 ? 'cr-step-completed' : '' }} {{ $checkOrder->orders->status == 4 ? 'cr-step-active' : '' }}">
                                    <span class="cr-step-icon">
                                        <i class="ri-truck-line"></i>
                                    </span>
                                    Product<br> dispatched
                                </div>
                                <div
                                    class="cr-step {{ $checkOrder->orders->status >= 5 ? 'cr-step-completed' : '' }} {{ $checkOrder->orders->status == 5 ? 'cr-step-active' : '' }}">
                                    <span class="cr-step-icon">
                                        <i class="ri-home-5-line"></i>
                                    </span>
                                    Product<br> delivered
                                </div>
                            </div>
                        </div> --}}

                            <!-- Progress-->
                            <div class="cr-steps">
                                <div class="cr-steps-body">
                                    <div class="cr-step cr-step-completed">
                                        <span class="cr-step-indicator">
                                            <i class="ri-check-line"></i>
                                        </span>
                                        <span class="cr-step-icon">
                                            <i class="ri-shield-check-line"></i>
                                        </span>Order<br> confirmed
                                    </div>

                                    <div class="cr-step cr-step-completed">
                                        <span class="cr-step-indicator">
                                            <i class="ri-check-line"></i>
                                        </span>
                                        <span class="cr-step-icon">
                                            <i class="ri-settings-4-line"></i>
                                        </span>Processing<br> order
                                    </div>
                                    <div class="cr-step cr-step-active">
                                        <span class="cr-step-icon">
                                            <i class="ri-gift-line"></i>
                                        </span>Quality<br> check
                                    </div>
                                    <div class="cr-step">
                                        <span class="cr-step-icon">
                                            <i class="ri-truck-line"></i>
                                        </span>Product<br> dispatched
                                    </div>
                                    <div class="cr-step">
                                        <span class="cr-step-icon">
                                            <i class="ri-home-5-line"></i>
                                        </span>Product<br> delivered
                                    </div>
                                </div>
                            </div>
                            <div class="text-center mt-3">
                                <form class="cr-search d-flex justify-content-center align-items-center" action=""
                                    method="post">
                                    @csrf
                                    <div class="input-group w-50">
                                        <input class="form-control" name="trackOrder" type="text"
                                            placeholder="Look up your order..." required>
                                        <div class="input-group-append">
                                            <button style="background-color: #64b496" class="btn btn-secondary"
                                                type="submit">
                                                <i class="ri-search-line"></i>
                                            </button>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Track Order section End -->
@endsection
