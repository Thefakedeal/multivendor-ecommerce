<section class="text-center mb-4" id="products">

    <!--Grid row-->
    <div class="row wow fadeIn gy-2">
      @foreach ($products as $product)
        <div class="col-lg-3 col-md-6">
            @include('frontend.components.productcard',['product'=>$product])
        </div>
      @endforeach
    </div>
    <!--Grid row-->

</section>