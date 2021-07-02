@extends('frontend.layouts.app')

@section('content')
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
                                    <a href="{{ route('frontend.products.show',$item->id) }}" class="link">
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
                                    Del
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