<div class="row wow fadeIn py-4">

    <!--Grid column-->
    <div class="col-md-6 mb-4">

      <img src="{{ asset($product->image) }}" class="img-fluid" alt="">

    </div>
    <!--Grid column-->

    <!--Grid column-->
    <div class="col-md-6 mb-4">

      <!--Content-->
      <div class="p-4">

        <div class="mb-3">
          <a href="">
            <span class="badge purple mr-1">{{ $product->product_category->name }}</span>
          </a>
        </div>

        <h1>
            {{ $product->name }}
        </h1>
        <p class="lead">
            @if ($product->discount>0)
                <span class="mr-1">
                <del>Rs. {{ number_format($product->price,2) }}</del>
                </span>
                <span>Rs. {{ number_format($product->discounted_price,2) }}</span>
            @else
                <span>Rs. {{ number_format($product->price,2) }}</span>    
            @endif
        </p>

        @if ($product->description)
            <p class="lead font-weight-bold">Description</p>

            <p>{{ $product->description }}</p>
        @endif

        <form class="d-flex justify-content-left">
          <!-- Default input -->
          <input type="number" value="1" aria-label="Search" class="form-control" style="width: 100px">
          <button class="btn btn-primary btn-md my-0 p" type="submit">Add to cart
            <i class="fas fa-shopping-cart ml-1"></i>
          </button>

        </form>

      </div>
      <!--Content-->

    </div>
    <!--Grid column-->

  </div>