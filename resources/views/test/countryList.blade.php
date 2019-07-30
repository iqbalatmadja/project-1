@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
					COUNTRY<br/>
					
                    <input type="text" id="fname" name="fname" placeholder="First Name"/><br/>
                    <input id="startdt" name="startdt" class="_datetime_"  placeholder="Start"><br/>
                    <input id="enddt" name="enddt" class="_datetime_"  placeholder="End"><br/>
                    <a href="#" onclick="return false;" id="filter">FILTER</a>
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th></th>
                                <th>ID</th>
                                <th>Country Code</th>
                                <th>Country Name</th>
                                <th>ISO 3</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th></th>
                                <th>ID</th>
                                <th>Country Code</th>
                                <th>Country Name</th>
                                <th>ISO 3</th>
                            </tr>
                        </tfoot>
                    </table>
                    <a href="#" id="reload">reload</a>
                    <div id="info-modal-conf" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-body edit-content">
                            <div class="modal-content" id="form_content"></div>
                          </div>
                        </div>
                    </div>					
					
					
					
					
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('styles')
<link href="{{ asset('libs/DataTables/DataTables-1.10.18/css/jquery.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ asset('libs/DataTables/DataTables-1.10.18/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('libs/DataTables/Responsive-2.2.2/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('libs/DataTables/ColReorder-1.5.0/css/colReorder.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ asset('libs/DataTables/KeyTable-2.4.0/css/keyTable.dataTables.min.css') }}" rel="stylesheet">

@endpush

@push('top_scripts')
@endpush

@push('bottom_scripts')
<?php /*<script src="{{ asset('libs/BootstrapDetector.js') }}" ></script> */?>
<script>
// clearing modal data cache
$('body').on('hidden.bs.modal', '.modal', function (event) {
    //$(".modal-content").html(""); //clearing it first, if necessary
    $(this).removeData('bs.modal');
});
</script>
<script src="{{ asset('libs/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js') }}" ></script>
<script src="{{ asset('libs/DataTables/Responsive-2.2.2/js/dataTables.responsive.min.js') }}" ></script>
<script src="{{ asset('libs/DataTables/Responsive-2.2.2/js/responsive.bootstrap.min.js') }}" ></script>
<script src="{{ asset('libs/DataTables/ColReorder-1.5.0/js/dataTables.colReorder.min.js') }}" ></script>
<script src="{{ asset('libs/DataTables/KeyTable-2.4.0/js/dataTables.keyTable.min.js') }}" ></script>

<script>

</script>
@endpush
