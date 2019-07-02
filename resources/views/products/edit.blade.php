@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card mt-4">
           
                <div class="card-body">
                    <h3 class="card-title text-primary">Modifier un produit</h3>
                    <hr>
                    @if(count($errors->all()) > 0)
                       @foreach($errors->all() as $error)
                             <div class="alert alert-danger">{{$error}}</div>
                       @endforeach
                    @endif
                    <form action="{{route('product.update',['id'=>$product->id])}}" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                          <label for="category" >Catégorie*</label>
                          <select name="category" id="" class="form-control">
                              @foreach($categories as $category)
                              <option value="{{$category->id}}" {{( $product->category_id == $category->id) ?'selected':''}}> {{$category->name}} </option>
                              @endforeach
                          </select>
                        </div>
                        <div class="form-group">
                            <label for="title">Titre*</label>
                            <input type="text" name="title" class="form-control"  value="{{$product->title}}" id="title" placeholder="Titre" required>
                            <input type="hidden" name="_token" class="form-control" value="{{Session::token()}}">
                        </div>
                        <div class="form-group">
                            <label for="body">Description*</label>
                            <textarea rows="5" cols="50" name="body" class="form-control"  placeholder="Description" required>{{$product->description}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="price">Prix*</label>
                            <input type="number" name="price" class="form-control" id="price"  placeholder="Prix" value="{{$product->price}}" required >
                        </div>
                         <div class="form-group">
                         <img src="{{URL::to('images/'.$product->file)}}" width="100" height="100" alt="">
                         
                         </div>
                        <div class="form-group">
                            <label for="file">Image*</label>
                            <input type="file" name="file" class="form-control" id="file" required>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Valider</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
 
