<div class="card m-1 my-2 product-card shadow-sm">

    <!--Card image-->
    <div class="view overlay">
        <div class="product-image" style="background-image: url('{{ asset($product->image) }}')"></div>
        <a>
            <div class="mask rgba-white-slight"></div>
        </a>
    </div>
    <!--Card image-->

    <!--Card content-->
    <div class="card-body text-center">
        <!--Category & Title-->
        <div href="" class="grey-text single-line">
            <h5>{{ $product->product_category->name }}</h5>
        </div>
        <h5>
            <strong>
                <div href="" class="dark-grey-text single-line">{{ $product->name }}
                </div>
            </strong>
        </h5>

        <p class="text-primary">
            @if ($product->discount>0)
                <s class="text-danger"> Rs.{{ number_format($product->price,2) }}</s>
                Rs.{{ number_format($product->discounted_price,2) }}
            @else
                Rs. {{ number_format($product->price,2)}}
            @endif
        </p>

    </div>
    <!--Card content-->

</div>
<!--Card-->

@once
  @push('styles')
     <style>
        .product-card .product-image{
            padding-top: 66%;
            background-position: center;
            background-size: cover;
        } 

        .product-card .single-line{
            text-overflow: ellipsis; 
            overflow: hidden; 
            white-space: nowrap;
        }    
    </style> 
  @endpush  
@endonce
