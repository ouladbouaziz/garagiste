<div class="mt-5">
    <a href="{{route('generate-pdfp')}}">
        <button class="btn btn-primary" >@lang('telecharger en pdf')</button>
    </a>
   
   
</div>




  @if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show mt-10" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <p>{{ $message }}</p>
    </div>
@endif

<table class="table table-striped table-hover mt-10">
    <tr>
        <th >@lang('Description')</th>
        <th >@lang('Montant')</th>
        <th >@lang('Charge supplémentaire')</th>

    </tr>
    @foreach ($factures as $f)
        <tr id="row{{$f->id}}">
            <td>{{ $f->description}}</td>
            <td>{{ $f->montant}}</td>
            <td>{{ $f->chargeSupp}}</td>

        </tr>
    @endforeach
</table>

