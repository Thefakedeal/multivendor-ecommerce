@extends('frontend.layouts.app')

@section('content')
<div class="container dark-grey-text mt-5">

    @include('frontend.components.productsection',['product'=>$product])

    <hr>

    <!--Grid row-->
    <div class="row d-flex justify-content-center wow fadeIn">

      <!--Grid column-->
      <div class="col-md-6 text-center">

        <h4 class="my-4 h4">Other Products by {{ $product->vendor->name }}</h4>

      </div>
      <!--Grid column-->

    </div>
    <!--Grid row-->

    <!--Grid row-->
    <div class="row wow fadeIn">
        @include('frontend.components.productrow',['products'=>$product->vendor->products])
    </div>
    <!--Grid row-->

  </div>
@endsection