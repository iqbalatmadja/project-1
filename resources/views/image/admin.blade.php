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
					
						<form id="imageUploadForm" action="javascript:void(0)" enctype="multipart/form-data">
							<div class="file-field">
								<div class="row">
									<div class=" col-md-8 mb-4">
										<img id="original" src="" class=" z-depth-1-half avatar-pic" alt="">
										<div class="d-flex justify-content-center mt-3">
    										<div class="btn btn-mdb-color btn-rounded float-left">
    											<input type="file" name="photo_name" id="photo_name" required=""> <br>
    												<button type="submit" class="btn btn-secondary d-flex justify-content-center mt-3">submit</button>
    										</div>
										</div>
									</div>
									<div class=" col-md-4 mb-4">
										<img id="thumbImg" src="" class=" z-depth-1-half thumb-pic" alt="">
									</div>
								</div>
							</div>
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
@endpush

@push('bottom_scripts')
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
			$('#imageUploadForm').on('submit',(function(e) {
				e.preventDefault();
				var formData = new FormData(this);
				$.ajax({
					type:'POST',
					url: "{{ route('imageSave')}}",
					data:formData,
					cache:false,
					contentType: false,
					processData: false,
					success:function(data){
						var url1 = '{{ url("uploads/images/") }}/'+data.filename;
						var url2 = '{{ url("uploads/images/thumbs/") }}/'+data.filename;
					    $('#original').attr('src', url1);
					    $('#thumbImg').attr('src', url2);
					},
					error: function(data){
					    console.log(data);
					}
				});
			}));
        	
		}); //end $(document).ready(function(){

				
		
	});
})(jQuery);


</script>
@endpush
