@extends('layouts.master')

@section('content')
   
    <div class="row m-4">
        <div class=" col-md-12">
           <div class="card">
                <div class="card-body">
                   <div class="card-title">Vous avez commandez :</div>
                   <table class="table table-dark mx-auto">
                       <thead class="thead-default">
                          <tr>
                              <th></th>
                              <th>Libellé</th>
                              <th>Prix</th>
                              <th>Qté</th>
                              <th>Total</th>
                          </tr>
                       </thead>
                       <tbody>
                           @foreach(Cart::content() as $product)
                              <tr>
                                 <td><img src="{{URL::to('images/'.$product->model->file)}}" class="img-fluid rounded" height="50" width="50" alt=""></td> 
                                 <td>{{$product->name}}</td>
                                 <td>{{$product->price}}</td>
                                 <td >
                                    {{$product->qty}}
                                  </td>
                                  <td><span class="bg-light text-dark rounded p-2 font-weight-bold">{{$product->total}} DH</span></td>
                                </tr>
                          @endforeach
                       </tbody>
                   </table>
                   <p class="lead">Total TTC : <span class="badge bg-success text-white">{{Cart::total()}} DH</span></p>
                   <script src="https://js.stripe.com/v3/"></script>

                    <form action="{{route('cart.pay')}}" method="post" id="payment-form">
                       
                    <div class="form-row">
                        <label for="card-element">
                        Credit or debit card
                        </label>
                        <div id="card-element">
                        <!-- A Stripe Element will be inserted here. -->
                        </div>
                     @csrf
                        <!-- Used to display form errors. -->
                        <div id="card-errors" role="alert"></div>
                    </div>

                    <button>Submit Payment</button>
                    </form>
               </div>
           </div>
        </div>
    </div>
@endsection