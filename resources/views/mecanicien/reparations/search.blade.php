<div class="m-5">
    <a class="btn btn-secondary" href="{{ route('reparations.createm') }}">@lang('Ajouter une réparation')</a>
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
        <th >@lang('description')</th>
        <th >@lang('status')</th>
        <th >@lang('startDate')</th>
        <th >@lang('endDate')</th>
        <th >@lang('mechanicNotes')</th>
        <th >@lang('clientNotes')</th>
        <th >@lang('action')</th>
    </tr>
    @foreach ($reparations as $r)
        <tr id="row{{$r->id}}">
            <td>{{ $r->description}}</td>
            <td>{{ $r->status}}</td>
            <td>{{ $r->startDate}}</td>
            <td>{{ $r->endDate }}</td>
            <td>{{ $r->mechanicNotes }}</td>
            <td>{{$r->clientNotes }}</td>
            <td>
                <a class="btnEdit btn  bg-blue-500 hover:bg-blue-400 text-white font-bold  px-2 border-b-4 border-blue-700 hover:border-blue-500 rounded" href="{{ route('reparations.editm',$r->id) }}">@lang('Modifier')</a>
                <button class="btnDelete btn  bg-red-500 hover:bg-red-400 text-white font-bold px-2 border-b-4 border-red-700 hover:border-red-500 rounded" v="{{$r->id}}">{{ trans('Supprimer')}}</button>
            </td>
        </tr>
    @endforeach
</table>


<script>
    $(document).on('click',".btnShow",function(){
        var reparation_id = $(this).attr('v');
        var myData = {'reparation_id': reparation_id};
        var url = '{{ route("reparations.showm") }}';

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