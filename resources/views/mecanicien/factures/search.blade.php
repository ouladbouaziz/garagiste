<div class="mt-5">
    <a class="btn btn-secondary" href="{{ route('factures.createm') }}">@lang('Ajouter une facture')</a>
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
        <th>@lang('Actions')</th>

    </tr>
    @foreach ($factures as $f)
        <tr id="row{{$f->id}}">
            <td>{{ $f->description}}</td>
            <td>{{ $f->montant}}</td>
            <td>{{ $f->chargeSupp}}</td>
            <td>
                <a class="btnEdit btn  bg-blue-500 hover:bg-blue-400 text-white font-bold  px-2 border-b-4 border-blue-700 hover:border-blue-500 rounded" href="{{ route('factures.editm',$f->id) }}">@lang('Modifier')</a>
                <button class="btnDelete btn  bg-red-500 hover:bg-red-400 text-white font-bold px-2 border-b-4 border-red-700 hover:border-red-500 rounded" v="{{$f->id}}">{{ trans('Supprimer')}}</button>
            </td>

        </tr>
    @endforeach
</table>
<script>
    $(document).on("click",".btnDelete",function(){
            $("#txtId").val($(this).attr('v'));
            $("#myModalDeleteP").show();
        })
</script>

