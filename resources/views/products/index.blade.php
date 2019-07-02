@extends('layouts.master')

@section('content')
   
    <div class="row m-4">
            <div class="form-group mx-3">
                <a href="{{route('products.create')}}" class="btn btn-primary">Ajouter</a>
            </div>
        <div class=" col-md-12">
            @if(Session::has('success'))
                 <div class="alert alert-success">{{Session::get('success')}}</div>
            @endif
           <div class="card">
                <div class="card-body">
                   <div class="card-title"></div>
                   <table class="table table-dark mx-auto">
                       <thead class="thead-default">
                          <tr>
                              <th>Image</th>
                              <th>Libellé</th>
                              <th>Prix</th>
                              <th>Action</th>
                          </tr>
                       </thead>
                       <tbody>
                           @foreach($products as $product)
                              <tr>
                                 <td><img src="{{URL::to('images/'.$product->file)}}" class="img-fluid rounded" height="50" width="50" alt=""></td> 
                                 <td>{{$product->title}}</td>
                                 <td>{{$product->price}}</td>
                                 <td>
                                    <a href="{{route('products.edit',['id'=>$product->id])}}" class=" mb-1 btn btn-warning btn-sm">Modifier</a>
                                    <form action="{{route('product.delete',['id'=>$product->id])}}" method="post" >
                                    
                                       <input type="hidden" name="_token" value="{{csrf_token()}}">
                                       <button type="submit" class="btn btn-danger btn-sm">supprimer</button>
                                    </form>
                                 </td>
                              </tr>
                          @endforeach
                       </tbody>
                   </table>
                </div>
             </div>
         </div>
     </div>
@endsection