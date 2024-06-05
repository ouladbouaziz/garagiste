<div class="m-5">
    <a class="btn btn-secondary" href="{{ route('clients.create') }}">@lang('Ajouter un client')</a>
    <a href="{{route('generate-pdfc')}}">
        <button class="btn btn-primary" >@lang('telecharger en pdf')</button>
    </a>
    <a href="{{ route('clients.export') }}">
        <button class="btn btn-success">@lang('Exporter en Excel')</button>
    </a>
   
</div>




  @if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show mt-10" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <p>{{ $message }}</p>
    </div>
@endif
<div class="card-body">
            <form action="{{ route('clients.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control ">
                <br>
                <button class="btn btn-success">@lang('Importer Client')</button>
            </form>
<table class="table table-striped table-hover mt-10">
    <tr>
        <th >@lang('Nom complet')</th>
        <th >@lang('Adresse')</th>
        <th >@lang('Télephone')</th>
        <th >@lang('Action')</th>
    </tr>
    @foreach ($clients as $clt)
        <tr id="row{{$clt->id}}">
            <td>{{ $clt->name}}</td>
            <td>{{ $clt->adresse }}</td>
            <td>{!! $clt->telephone !!}</td>
            <td>
                <button class="btnShow btn bg-blue-100 hover:bg-blue-100 text-black font-bold  px-2 border-b-4 border-blue-100 hover:border-blue-100 rounded" v="{{$clt->id}}">@lang('Voir')</button>
                <a class="btnEdit btn  bg-blue-500 hover:bg-blue-400 text-white font-bold  px-2 border-b-4 border-blue-700 hover:border-blue-500 rounded" href="{{ route('clients.edit',$clt->id) }}">@lang('Modifier')</a>
                <button class="btnDelete btn  bg-red-500 hover:bg-red-400 text-white font-bold px-2 border-b-4 border-red-700 hover:border-red-500 rounded" v="{{$clt->id}}">{{ trans('Supprimer')}}</button>
            </td>
        </tr>
    @endforeach
</table>


<script>
    $(document).on('click',".btnShow",function(){
        var client_id = $(this).attr('v');
        var myData = {'client_id': client_id};
        var url = '{{ route("clients.show") }}';

        axios.post(url, myData)
        .then(response => {
                $("#showClient").html(response.data);
                $("#myModalShowClient").show();
        })
        .catch(error => {
            console.log(error);
        });
    })

    $(document).on("click",".btnDelete",function(){
            $("#txtId").val($(this).attr('v'));
            $("#myModalDeleteClient").show();
        })
</script>