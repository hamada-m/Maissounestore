@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card mt-4">
           
                <div class="card-body">
                    <h3 class="card-title text-primary">Inscription</h3>
                    <hr>
                    <form action="{{route('users.store')}}" method="post">
                        <div class="form-group">
                            <label for="name">Nom & Prénom*</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Nom & Prénom">
                            <input type="hidden" name="_token" class="form-control" value="{{csrf_token()}}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email*</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="password">Mot de passe*</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Mot de passe">
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

 
