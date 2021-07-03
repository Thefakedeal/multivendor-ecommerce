@extends('frontend.layouts.app')


@section('content')
    
    @can('cancel-order',$order)
        <div class="container">
            <form action="{{ route('user.order.cancel',$order->id) }}" onsubmit="return confirm('Are You Sure You Want To Cancel Order?')" method="post">
                @csrf
                @method('put')
                <div class="d-flex justify-content-end my-4">
                    <button class=" btn btn-danger btn-sm">
                        <i class="fa fa-times-circle" aria-hidden="true"></i> Cancel Order
                    </button>
                </div>
            </form>
        </div>
    @endcan
    <div class="container py-4 table-responsive">
        <table class="table table-striped table-sm">
            <tbody>
                <tr>
                    <td>Code</td>
                    <td>{{ $order->code }}</td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>{{ $order->order_status }}</td>
                </tr>
                <tr>
                    <td>
                        Address
                    </td>
                    <td>
                        @if($order->street_name)  {{ $order->street_name }}, @endif {{ $order->municipality }}-{{ $order->ward }}
                    </td>
                </tr>
                <tr>
                    <td>Total</td>
                    <td>Rs. {{number_format($total) }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="container py-4 table-responsive">
        <table class="table table-sm table-striped">
            <thead>
                <th>
                    #
                </th>
                <th>
                    Image
                </th>
                <th>
                    Item
                </th>
                <th>
                    Category
                </th>
                <th>
                    Quantity
                </th>
                <th>
                    Rate
                </th>
                <th>
                    Price
                </th>
            </thead>
            <tbody >
                @foreach ($order->products as $item)
                    <tr>
                        <td>
                            {{ $loop->iteration }}
                        </td>
                        <td>
                            <div class="cart-thumbnail"
                                style="background-image: url('{{ asset($item->image) }}')"></div>
                            
                        </td>
                        <td>
                            <a href="{{ route('frontend.products.show',$item->slug) }}" class="link">
                                {{ $item->name }}
                            </a>
                        </td>
                        <td>
                            {{ $item->product_category->name }}
                        </td>
                        <td>
                            {{ number_format($item->order_item->quantity) }}
                        </td>
                        <td>
                            {{ number_format($item->discounted_price,2) }}
                        </td>
                        <td>
                            {{ number_format($item->order_item->quantity * $item->discounted_price,2) }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th></th>
                    <th colspan="4">Delivery Charge</th>
                    <th>Rs. {{ number_format($order->delivery_charge,2) }}</th>
                    <th> </th>
                </tr>
                <tr>
                    <th></th>
                    <th colspan="4">Total</th>
                    <th class="font-weight-bold">Rs. {{ number_format($total,2) }}</th>
                    <th> </th>
                </tr>
            </tfoot>
        </table>
    </div>
   
@endsection

@push('styles')
    <style>
        .cart-thumbnail{
            background-position: center;
            background-size: cover;
            padding-top: 100%;
        }
    </style>
@endpush