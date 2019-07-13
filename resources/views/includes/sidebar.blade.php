<div class="col-md-4">
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">Catégories</h3>
            <hr class="w-25 float-left">
            <div class="clearfix"></div>
            <ul class="list-group">
                 @foreach($categories as $categorie)
                    <li class="list-group-item"><a href="category/{{$categorie->id}}">{{$categorie->name}}</a>
                        <span class="badge badge-primary shadow p-2 rounded float-right">
                             {{$categorie->products->count()}}
                        </span></li>
                 @endforeach
            </ul>
        </div>
    </div>
</div>