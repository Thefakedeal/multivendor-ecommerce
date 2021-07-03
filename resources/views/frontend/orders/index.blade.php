@extends('frontend.layouts.app')

@section('content')
    <div class="container table-responsive">
        <table class="table table-sm table-striped">
            <thead>
                <th>#</th>
                <th>Order Code</th>
                <th>Status</th>
                <th>Address</th>
                <th>Ordered</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach ($orders as $order) 
                    <tr>
                        <th>
                            {{ $loop->iteration }}
                        </th>
                        <th>
                                {{ $order->code }} 
                        </th>
                        <th>
                            {{ $order->order_status }}
                        </th>
                        <th>
                            @if($order->street_name)  {{ $order->street_name }}, @endif {{ $order->municipality }}-{{ $order->ward }}
                        </th>
                        <th>
                            {{ $order->created_at->diffForHumans() }}
                        </th>
                        <th>
                            <a class="link" href="{{ route('user.orders.show',$order->id) }}">
                                More Details
                            </a>
                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <nav class="d-flex justify-content-center wow fadeIn">
            {{ $orders->render('pagination::bootstrap-4') }}
        </nav>
    </div>
@endsection