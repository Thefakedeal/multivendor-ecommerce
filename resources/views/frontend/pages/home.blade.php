@extends('frontend.layouts.app')

@section('hero')
    @include('frontend.components.carousel')  
@endsection


@section('content')


    <!--Section: Products v.3-->
    @include('frontend.components.productrow',['products'=>$products])
    <!--Section: Products v.3-->
    <!--Pagination-->
    <nav class="d-flex justify-content-center wow fadeIn">
        {{ $products->render('pagination::bootstrap-4') }}
    </nav>
    <!--Pagination-->
@endsection
