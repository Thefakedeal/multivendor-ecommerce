@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h4 class="text-white">{{ $product_count }}</h4>

                    <p>Total Products</p>
                </div>
                <div class="icon">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-secondary">
                <div class="inner">
                    <h4 class="text-white">{{ $vendor_count }}</h4>

                    <p>Our Vendors</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-tie    "></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        @foreach ($product_categories as $product_category)
            <div class="col-lg-3 col-6">
                <div class="small-box @if ($loop->even) bg-success @else bg-primary @endif ">
                    <div class="inner">
                        <h4 class="text-white">{{ $product_category->products_count }}</h4>

                        <p>{{ $product_category->name }}</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        @endforeach
    </div>

    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header border-transparent">
                <h3 class="card-title">Latest Orders</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-warning" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-danger" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table m-0">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Address</th>
                                <th>Status</th>
                                <th>Ordered</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $order->code }}</td>
                                    <td>{{ $order->address }}</td>
                                    <td>{{ $order->order_status }}</td>
                                    <td>
                                        {{ $order->created_at->diffForHumans() }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
                <a href="javascript:void(0)" class="btn btn-sm btn-primary float-right">View All Orders</a>
            </div>
            <!-- /.card-footer -->
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h4 class="text-white">{{ $new_orders_count }}</h4>

                    <p>New Orders</p>
                </div>
                <div class="icon">
                    <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h4 class="text-white">{{ $pending_orders_count }}</h4>

                    <p>Pending Orders</p>
                </div>
                <div class="icon">
                    <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-primary">
                <div class="inner">
                    <h4 class="text-white">{{ $delivering_orders_count }}</h4>

                    <p>Delivering Orders</p>
                </div>
                <div class="icon">
                    <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h4 class="text-white">{{ $delivered_orders_count }}</h4>

                    <p>Delivered Orders</p>
                </div>
                <div class="icon">
                    <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h4 class="text-white">{{ $cancelled_orders_count }}</h4>

                    <p>Cancelled Orders</p>
                </div>
                <div class="icon">
                    <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
@endsection
