<a href="{{ route('frontend.products.show',$product->id) }}">
    <div class="card m-1 my-2 product-card shadow-sm">
    
        <!--Card image-->
        <div class="view overlay">
            <div class="product-image" style="background-image: url('{{ asset($product->image) }}')"></div>
            <span>
                <div class="mask rgba-white-slight"></div>
            </span>
        </div>
        <!--Card image-->
    
        <!--Card content-->
        <div class="card-body text-center">
            <!--Category & Title-->
            <div href="" class="grey-text single-line">
                <h5>{{ $product->product_category->name }}</h5>
            </div>
            <h5 class="lead">
                <div href="" class="dark-grey-text single-line">{{ $product->name }}
                </div>
            </h5>
    
            <p class="text-primary ">
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
</a>

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
