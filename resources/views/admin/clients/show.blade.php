
<div id="myModalShowClient" class="modal">
    <!-- Modal content -->
    <div class="modal-content" style="width:700px;">
        <div class="modal-header">
            <span class=" btnCloseShow close">&times;</span>
            <h2>@lang('Show')</h2>
        </div>
        <div class="modal-body">
        <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>@lang('Numéro'):</strong>
                    {{$client->id}}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>@lang('Nom complet'):</strong>
                    {{$client->name}}
                </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>@lang('Adresse'):</strong>
                    {{$client->adresse}}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>@lang('Télephone'):</strong>
                    {{$client->telephone}}
                </div>
            </div>
        </div>

        </div>
        <div class="modal-footer">
            <button  class="btnCloseShow  bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" id="close">@lang('Fermer')</button>
        </div>
    </div>

</div>
<script>
       $(".btnCloseShow").on('click',function(){
          $("#myModalShowClient").hide();
      })


</script>