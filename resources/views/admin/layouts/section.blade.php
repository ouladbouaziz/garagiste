<style>
  .user-panel{
    position: relative;
    top: 220px;
  }

</style>



<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{'dashboard'}}" class="brand-link">
      <img src="{{ asset('dist/img/logo2.jpg')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">@lang('GARAGISTE')</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      



      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            
              <li class="nav-item">
                <a href="{{route('clients.index')}}" style="color:white" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                   @lang('Gestion des clients')
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('mecaniciens.index')}}" style="color:white" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    @lang('Gestion mécaniciens')
                  </p>
                </a>
              </li>


              <li class="nav-item">
                <a href="" class="nav-link" style='color:white'>
                  <i class="nav-icon fas fa-chart-pie"></i>
                  <p>
                    @lang('Gestion du Stock')
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('pieces.create')}}" class="nav-link" >
                      <i class="far fa-circle nav-icon"></i>
                      <p>- @lang('Ajouter une pièce de rechange')</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('pieces.index')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>- @lang('Suivi du Stock')</p>
                    </a>
                  </li>
                </ul>
              </li>

              <li class="nav-item">
                <a href="#" class="nav-link" style='color:white'>
                  <i class="nav-icon fas fa-chart-pie"></i>
                  <p>
                    @lang('Gestion de Réparations')
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('reparations.create')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>- @lang('Créer des réparations')</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('reparations.index')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>- @lang('Suivi des Réparations')</p>
                    </a>
                  </li>
                </ul>
              </li>

              <li class="nav-item">
                <a href="" class="nav-link" style="color:white">
                  <i class="nav-icon fas fa-th"></i>
                  <p>@lang('Gestion des véhicules')</p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('vehicules.index')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>- @lang('Listes des véhicules')</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('vehicules.create')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>- @lang('Ajouter une véhicule')</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                  <a href="{{route('factures.index')}}" class="nav-link" style="color:white">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    @lang('Facturations')
                  </p>
                </a>
              </li>
               
              </li>
        
        </ul>
      </nav>
      <div class="user-panel d-flex">
        <div class="image mb-2 ml-5">
          <img src="{{ asset('dist/img/admin.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info" style="color:white">
          {{ Auth::user()->name}}
        </div>
      </div>
    </div>
  </aside>
  