<style>
    .user-panel{
      position: relative;
      top: 350px;
    }
  
  </style>
  
  
  
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="" class="brand-link">
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
                  <a href="{{route('reparations.indexm')}}" class="nav-link" style='color:white'>
                    <i class="nav-icon fas fa-chart-pie"></i>
                    <p>
                      @lang('Réparations')
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="{{route('pieces.indexm')}}" style="color:white" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                     @lang('Stock')
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('factures.indexm')}}" style="color:white" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                      @lang('Factures')
                    </p>
                  </a>
                </li>         
          </ul>
        </nav>
        <div class="user-panel d-flex">
          <div class="image ml-5 mb-2">
            <img src="{{ asset('dist/img/meca.png')}}" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info ml-1" style="color:white">
            {{ Auth::user()->name}}
          </div>
        </div>
      </div>
    </aside>

    