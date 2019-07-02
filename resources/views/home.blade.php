@extends('layouts.master')

@section('content')
   
<div class="row">
   <div class=" col-md-8">
      <div class="row">
         @foreach($products as $product)
         <div class="col-md-4 mb-3">
               <div class="card p-2 bg-light text-center">
                  <div class=" card-body ">
                        <h3 class=" card-title">{{$product->title}}</h3>
                        <hr>
                        <div class="card-img mt-2 mb-2">
                           <img src="{{URL::to('images/'.$product->file)}}" class= "img-fluid rounded" alt="">
                        </div>
                        <div class="card-text mt-3">{{$product->description}} </div>
                        <div class="badge badge-info mt-2 p-2">{{$product->price}} DH</div>
                        <div class=" bg-danger text-white mt-2 p-2">{{$product->category->name}} </div>
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