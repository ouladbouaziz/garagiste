<div class="m-5">
    <a class="btn btn-secondary" href="{{ route('pieces.createm') }}">@lang('Ajouter une piece')</a>
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
        <th >@lang('Nom piece')</th>
        <th >@lang('Reference')</th>
        <th >@lang('Fournisseur')</th>
        <th >@lang('Prix')</th>
        <th >@lang('Action')</th>
    </tr>
    @foreach ($pieces as $p)
        <tr id="row{{$p->id}}">
            <td>{{ $p->nompiece}}</td>
            <td>{{ $p->referencep}}</td>
            <td>{{ $p->fournisseur }}</td>
            <td>{!! $p->prix !!}</td>
            <td>
                <button class="btnShow btn bg-blue-100 hover:bg-blue-100 text-black font-bold  px-2 border-b-4 border-blue-100 hover:border-blue-100 rounded" v="{{$p->id}}">@lang('Voir')</button>
                <a class="btnEdit btn  bg-blue-500 hover:bg-blue-400 text-white font-bold  px-2 border-b-4 border-blue-700 hover:border-blue-500 rounded" href="{{ route('pieces.editm',$p->id) }}">@lang('Modifier')</a>
                <button class="btnDelete btn  bg-red-500 hover:bg-red-400 text-white font-bold px-2 border-b-4 border-red-700 hover:border-red-500 rounded" v="{{$p->id}}">{{ trans('Supprimer')}}</button>
            </td>
        </tr>
    @endforeach
</table>


<script>
    $(document).on('click',".btnShow",function(){
        var piece_id = $(this).attr('v');
        var myData = {'piece_id': piece_id};
        var url = '{{ route("pieces.showm") }}';

        axios.post(url, myData)
        .then(response => {
                $("#showP").html(response.data);
                $("#myModalShowP").show();
        })
        .catch(error => {
            console.log(error);
        });
    })

    $(document).on("click",".btnDelete",function(){
            $("#txtId").val($(this).attr('v'));
            $("#myModalDeleteP").show();
        })
</script>