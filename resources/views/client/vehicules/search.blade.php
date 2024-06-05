<div class="m-3">
    <a href="{{route('generate-pdfc')}}">
        <button class="btn btn-primary" >@lang('telecharger en pdf')</button>
    </a>
    <a href="{{ route('vehicules.export') }}">
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
            <form action="{{ route('vehicules.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control ">
                <br>
                <button class="btn btn-success">@lang('Importer véhicule')</button>
            </form>
<table class="table table-striped table-hover mt-10">
    <tr>
        <th >@lang('Marque')</th>
        <th >@lang('Modele')</th>
        <th >@lang('Type de carburant')</th>
        <th >@lang('Immatriculation')</th>
        <th >@lang('Action')</th>
    </tr>
    @foreach ($vehicules as $vehicule)
        <tr id="row{{$vehicule->id}}">
            <td>{{ $vehicule->marque}}</td>
            <td>{{ $vehicule->modele}}</td>
            <td>{{ $vehicule->typeFuel }}</td>
            <td>{{ $vehicule->registration }}</td>
            <td>
                {{-- show photo --}}
                <button class="btnShow btn bg-blue-100 hover:bg-blue-100 text-black font-bold  px-2 border-b-4 border-blue-100 hover:border-blue-100 rounded" v="{{$vehicule->id}}">@lang('Voir')</button>
                <a class="btnEdit btn  bg-blue-500 hover:bg-blue-400 text-white font-bold  px-2 border-b-4 border-blue-700 hover:border-blue-500 rounded" href="{{ route('vehicules.editcl',$vehicule->id) }}">@lang('Modifier')</a>
                <button class="btnDelete btn  bg-red-500 hover:bg-red-400 text-white font-bold px-2 border-b-4 border-red-700 hover:border-red-500 rounded" v="{{$vehicule->id}}">{{ trans('Supprimer')}}</button>
            </td>
        </tr>
    @endforeach
</table>


<script>
    $(document).on('click',".btnShow",function(){
        var vehicule_id = $(this).attr('v');
        var myData = {'vehicule_id': vehicule_id};
        var url = '{{ route("vehicules.showcl") }}';

        axios.post(url, myData)
        .then(response => {
                $("#showVcl").html(response.data);
                $("#myModalShowVcl").show();
        })
        .catch(error => {
            console.log(error);
        });
    })

    $(document).on("click",".btnDelete",function(){
            $("#txtId").val($(this).attr('v'));
            $("#myModalDeleteVcl").show();
        })
</script>