
    <!-- Second navbar for categories -->
    <nav class="navbar navbar-expand-sm rounded font-weight-bold navbar-dark bg-danger">
         <a class="navbar-brand" href="#">Maissounestore</a>
         <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation"></button> 
         <div class="collapse navbar-collapse justify-content-between" id="collapseibleNavId">
            <ul class=" navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item"><a href="{{url('/')}}"  class="nav-link">Accueil</a></li>
                <li class="nav-item" ><a href="{{route('products.index')}}" class="nav-link" >Produits</a></li>
            
            </ul>
            <ul class=" navbar-nav mt-2 mt-lg-0" >
            @auth
                <li class="nav-item"><a href="{{route('user.logout')}}"  class="nav-link" >Déconnexion</a></li>
                @if(auth()->user()->isAdmin())
                   <li class="nav-item">
                      <a class="nav-link dropdown-toggle"  id="triggerId" data-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false">
                          admin
                      </a>
                      <div class="dropdown-menu " aria-labelledby="triggerId">
                        <a class="dropdown-item" href="#">{{Auth::user()->name}}</a>
                        <hr>
                        <a class="dropdown-item" href="{{route('products.create')}}">Ajouter un produit</a>
                        <a class="dropdown-item" href="{{route('products.index')}}">Produits</a>
                        
                     </div>
                 </li>
                @endif
            @else
                <li class="nav-item"><a href="{{route('users.create')}}"  class="nav-link" >Inscription</a></li>
                <li class="nav-item"><a href="{{route('login')}}"  class="nav-link" >Connexion</a></li>

            @endauth
                <li class="nav-item"><a href="{{route('cart.index')}}"  class="nav-link">Panier <span class="badge badge-light p-2 rounded">{{Cart::content()->count()}}</span></a></li>
            </ul>
        </div>
    </nav>
 