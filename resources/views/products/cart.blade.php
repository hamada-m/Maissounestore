@extends('layouts.master')

@section('content')
   
    <div class="row m-4">
        <div class=" col-md-12">
           <div class="card">
                <div class="card-body">
                   <div class="card-title"></div>
                   @if(Session::has('success'))
                  <div class="alert alert-success">
                 {{Session::get('success')}}
                 </div>
                  @endif
                   <table class="table table-dark mx-auto">
                       <thead class="thead-default">
                          <tr>
                              <th></th>
                              <th>Libellé</th>
                              <th>Prix</th>
                              <th>Qté</th>
                              <th>Total</th>
                              <th>Action</th>
                          </tr>
                       </thead>
                       <tbody>
                           @foreach(Cart::content() as $product)
                              <tr>
                                 <td><img src="{{URL::to('images/'.$product->model->file)}}" class="img-fluid rounded" height="50" width="50" alt=""></td> 
                                 <td>{{$product->name}}</td>
                                 <td>{{$product->price}}</td>
                                 <td >
                                     <ul class="qteList">
                                         <li><a href="{{route('cart.decrease',['id'=>$product->rowId,'qte'=>$product->qty])}}" class="btn btn-light bt-sm " id="moins">-</a></li>
                                         <li><input type="text" class="form-control text-center"  name="qte" id="qte" value ="{{$product->qty}}"></li>
                                         <li><a href="{{route('cart.increase',['id'=>$product->rowId,'qte'=>$product->qty])}}" class="btn btn-light bt-sm" id="plus">+</a></li>
                                     </ul>
                                  </td>
                                  <td><span class="bg-light text-dark rounded p-2 font-weight-bold">{{$product->total}} DH</span></td>
                                  <td><a href="{{route('cart.delete',['id'=>$product->rowId])}}"></a></td>
                              </tr>
                          @endforeach
                       </tbody>
                   </table>
                   <p class="lead">Total TTC : <span class="badge bg-success text-white">{{Cart::total()}} DH</span></p>
                   <a href="{{route('cart.checkout')}}" class="btn btn-success">Valider</a>
                  
               </div>
           </div>
        </div>
    </div>
@endsection