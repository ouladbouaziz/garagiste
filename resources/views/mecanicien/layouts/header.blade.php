<nav class="main-header navbar navbar-expand navbar-white navbar-light fixed-top">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="" class="nav-link">@lang('Acceuil')</a>
      </li>
      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> -->
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
     

      <!-- Messages Dropdown Menu -->
      <div class="m-2">
        <select name="lstLangues" id="lstLangues">
          <option @if (app()->getLocale()=="en")
          selected
          @endif value="en">@lang('Englais')</option>
          <option @if (app()->getLocale()=="ar")
          selected
          @endif value="ar">@lang('Arabic')</option>
          <option @if (app()->getLocale()=="es")
          selected
          @endif value="es">@lang('Espagnol')</option>
          <option @if (app()->getLocale()=="fr")
          selected
          @endif value="fr">@lang('Francais')</option>
        </select>
      </div>
      <li class="nav-item">
              <a class="nav-link" href="{{ route('logout') }}">@lang('Deconnecter')</a>
      </li>
   
    </ul>
  </nav>

  <script>
    $("#lstLangues").on("change",function(){
        var locale = $(this).val();
        window.location.href = "/changeLocale/"+locale;
    })
</script>