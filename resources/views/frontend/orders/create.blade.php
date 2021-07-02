@extends('frontend.layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Confirm Order</div>
            <div class="card-body table-responsive">
                <table class="table table-sm table-striped">
                    <tbody>
                        <tr>
                            <td>
                                Cost
                            </td>
                            <td>
                                {{ $total }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Delivery Charge
                            </td>
                            <td>
                                {{ $delivery_charge }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Total
                            </td>
                            <td>
                                {{ $total + $delivery_charge }}
                            </td>
                        </tr>
                    </tbody>
                </table>
                <form action="{{ route('user.orders.store') }}" method="post">
                    @csrf

                    <div class="form-group row">
                        <label for="street_name" class="col-md-4 col-form-label text-md-right">{{ __('Street Name') }}
                            </label>

                        <div class="col-md-6">
                            <input id="street_name" type="text"
                                class="form-control @error('street_name') is-invalid @enderror" name="street_name" 
                                autocomplete="street_name">

                            @error('street_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="ward" class="col-md-4 col-form-label text-md-right">{{ __('Ward') }} <span class="text-danger">*</span> </label>

                        <div class="col-md-6">
                            <input id="ward" type="text" class="form-control @error('ward') is-invalid @enderror"
                                name="ward" required autocomplete="ward">

                            @error('ward')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="municipality"
                            class="col-md-4 col-form-label text-md-right">{{ __('Municipality/City') }} <span class="text-danger">*</span></label>

                        <div class="col-md-6">
                            <select class="form-control" name="municipality" id="municipality" required>
                                @foreach ($municipals as $municipality)
                                    <option value="{{ $municipality }}">{{ $municipality }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <form action="{{ route('user.orders.store') }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-primary">
                            Confirm Order
                        </button>
                    </form>
                </form>
            </div>
        </div>
    </div>
@endsection
