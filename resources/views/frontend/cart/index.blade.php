@extends('frontend.layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('user.cart.clear') }}" onsubmit="return confirm('Are You Sure You Want To Clear Cart?')" method="post">
            @csrf
            @method('delete')
            <div class="d-flex justify-content-end my-4">
                <button class=" btn btn-danger btn-sm">
                    <i class="fa fa-trash" aria-hidden="true"></i> Clear Cart
                </button>
            </div>
        </form>
    </div>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-cart-plus" aria-hidden="true"></i> Cart
            </div>
            <div class="card-body table-responsive">
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
                        <th>
                            Action
                        </th>
                    </thead>
                    <tbody >
                        @foreach ($cart_items as $item)
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
                                    {{ number_format($item->cart->quantity) }}
                                </td>
                                <td>
                                    {{ number_format($item->discounted_price,2) }}
                                </td>
                                <td>
                                    {{ number_format($item->cart->quantity * $item->discounted_price,2) }}
                                </td>
                                <td>
                                    <form action="{{ route('user.cart.destroy',$item->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i> Remove</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th></th>
                            <th colspan="4">Total</th>
                            <th>Rs. {{ number_format($total,2) }}</th>
                            <th> </th>
                        </tr>
                    </tfoot>
                </table>
                <div class="d-flex justify-content-end my-4">
                    <a href="{{ route('user.orders.create') }}" class=" btn btn-danger btn-sm">
                        <i class="fa fa-trash" aria-hidden="true"></i> Order
                    </a>
                </div>
            </div>
        </div>
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