@extends('layouts.master')

@section('content')
   
<div class="row m-4">
   <div class=" col-md-8">
      <div class="row">
         <div class="col-md-12 mb-3">
               <div class="card p-2 bg-light text-center">
                  <div class=" card-body ">
                        <h3 class=" card-title" style="font-size: 1em;">{{$product->title}}</h3>
                        <hr>
                        <div class="card-img mt-2 mb-2">
                           <img src="{{URL::to('images/'.$product->file)}}" class= "img-fluid rounded" alt="">
                        </div>
                        <div class="card-text mt-3">{{$product->description}} </div>
                        <div class="badge badge-info mt-2 p-2">{{$product->price}} DH</div>
                        <div class=" bg-danger offset-3 text-white w-50 mt-2 p-2">{{$product->category->name}} </div>
                   </div>
                   <div class="card-footer">
                       <form action="{{route('cart.add')}}" method="post">
                           <div class="form-group">
                               <input type="number" name="qte" class="w-50 offset-3 form-control" placeholder="Qté">
                               <input type="hidden" name="product_id" value="{{$product->id}}">
                               <input type="hidden" name="_token" value="{{Session::token()}}">
                            </div>
                            <button type="submit" class="btn btn-primary">Ajouter au panier</button>
                        </form>
                   </div>
                </div>
             </div>
          </div>
      </div>
      @include('includes.sidebar')
   </div>
@endsection