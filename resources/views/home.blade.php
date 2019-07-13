@extends('layouts.master')

@section('content')
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100 img-fluid" src="https://www.xenelsoft.com/images/ecommercedesignbanner.png" alt="First slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<div class="row">
   <div class=" col-md-8">
      <div class="row">
         @foreach($products as $product)
         <div class="col-md-4 mb-3">
               <div class="card p-2 bg-light text-center">
                  <div class=" card-body ">
                        <h3 class=" card-title" style="font-size: 1rem;">{{$product->title}}</h3>
                        <hr>
                        <div class="card-img mt-2 mb-2">
                           <img src="{{URL::to('images/'.$product->file)}}" class= "img-fluid rounded" alt="">
                        </div>
                        <div class=" mt-2 p-2" style="text-align:left; font-size: 12px; font-weight:bold; "># {{$product->category->name}}<span class="badge badge-info p-2" style="text-align:right; float: right;">{{$product->price}} DH</span> </div>
                   </div>
                   <div class="card-footer">
                     <a href="{{route('products.show',['slug'=>$product->slug])}}" class="btn btn-primary btn-block">Voir</a>
                   </div>
                </div>
             </div>
             @endforeach
          </div>
      </div>
      @include('includes.sidebar')
   </div>
@endsection