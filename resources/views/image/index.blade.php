@extends('layouts.dashboard')

@push('top_scripts')
@endpush

@section('content')

<div class="container-scroller">
    @include('dashboard.partials.topnav')
    <div class="container-fluid page-body-wrapper">
        @include('dashboard.partials.sidenav')
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row" id="proBanner">
				    <div class="col-md-12 grid-margin">	
						@include('dashboard.partials.dashboardBanner')
                    </div>
                </div>
                <div class="row" style="margin-bottom: 10px;">
				    <div class="col-md-12">	
				    	<span style="float: left;">
	        				<h3>Image Management</h3>
				    	</span>
    				</div>
    			</div>	
    			<div class="row" style="margin-bottom: 10px;">
				    <div class="col-md-12">	
					
					
						<form method="post" action="{{ route('imageSave') }}" enctype="multipart/form-data" class="dropzone" id="dropzone">
						@csrf
						</form>   					
					
					
					
					</div>
				</div>
            </div>
            @include('dashboard.partials.footer')
		</div>
	</div>
</div>
<div id="info-modal-conf" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-body edit-content">
        <div class="modal-content" id="form_content"></div>
      </div>
    </div>
</div>
@endsection

@push('styles')
<link href="{{ asset('libs/dropzone.js/min/dropzone.min.css') }}" rel="stylesheet">
@endpush

@push('bottom_scripts')
<script src="{{ asset('libs/dropzone.js/min/dropzone.min.js') }}"></script>

<script>
$('body').on('hidden.bs.modal', '.modal', function (event) {
    //$(".modal-content").html(""); //clearing it first, if necessary
    $(this).removeData('bs.modal');
});

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

(function($) {
	'use strict';
	$(function() {
		$(document).ready(function(){		
    		
        	
		}); //end $(document).ready(function(){

				
		
	});
})(jQuery);


Dropzone.options.dropzone =
{
	maxFilesize: 12,
	maxFiles: 2,
	autoProcessQueue: true,
	renameFile: function(file) {
		var dt = new Date();
       	var time = dt.getTime();
      	return time+file.name;
	},
   	acceptedFiles: ".jpeg,.jpg,.png,.gif",
   	addRemoveLinks: true,
   	timeout: 5000,
   	removedfile: function(file) 
    {
        var name = file.upload.filename;
        $.ajax({
            headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    },
            type: 'POST',
            url: '{{ route("imageDelete") }}',
            data: {filename: name},
            success: function (data){
                alert("File has been successfully removed!!");
            },
            error: function(e) {
                console.log(e);
            }});
            var fileRef;
            return (fileRef = file.previewElement) != null ? 
            fileRef.parentNode.removeChild(file.previewElement) : void 0;
    },
   	success: function(file, response) {
		console.log(response);
   	},
   	error: function(file, response){
		return false;
   	}
}	
</script>
@endpush
