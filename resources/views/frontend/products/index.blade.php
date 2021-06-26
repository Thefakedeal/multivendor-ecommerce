@extends('frontend.layouts.app')

@section('content')
    <div class="py-4">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('frontend.products.index') }}">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                            <select class="form-control" name="product_category_id" id="">
                                <option value="">All Categories</option>
                                @foreach ($product_categories as $category)
                                    <option value="{{ $category->id }}" @if($category->id == request()->get('product_category_id')) selected @endif>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                              <input type="text"
                                class="form-control" name="name" value="{{ request()->get('name') }}"  placeholder="Product Title">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <button class="btn btn-primary btn-block my-0 p" type="submit">Search
                                <i class="fa fa-search" aria-hidden="true"></i>
                              </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="py-4">
        @include('frontend.components.productrow',['products'=>$products])
    </div>
    <nav class="d-flex justify-content-center wow fadeIn">
        {{ $products->withQueryString()->render('pagination::bootstrap-4')}}
    </nav>
@endsection