<style>
    .user-panel{
      position: relative;
      top: 157px;
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
                  <a href="" class="nav-link" style='color:white'>
                    <i class="nav-icon fas fa-chart-pie"></i>
                    <p>
                      @lang('Gestion des véhicules')
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="{{route('vehicules.indexcl')}}" class="nav-link" >
                        <i class="far fa-circle nav-icon"></i>
                        <p>- @lang('mes véhicules')</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{route('vehicules.createcl')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>- @lang('ajouter nouveau véhicule')</p>
                      </a>
                    </li>
                  </ul>
                </li>

                <li class="nav-item">
                  <a href="{{route('reparations.indexcl')}}" style="color:white" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                     @lang('Mes réparations')
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('factures.indexcl')}}" style="color:white" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                      @lang('Mes factures')
                    </p>
                  </a>
                </li>
  
                <li class="nav-item">
                    <a href="#" class="nav-link" style="color:white">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                      @lang('Sécurité')
                    </p>
                  </a>
                </li>
                 
                </li>
          
          </ul>
        </nav>
        <div class="user-panel d-flex mt-20">
          <div class="image mb-2 ml-3 mt-20">
            <img src="{{ asset('dist/img/user.webp')}}" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info mt-20" style="color:white">
            {{ Auth::user()->name}}
          </div>
        </div>
      </div>
    </aside>

    