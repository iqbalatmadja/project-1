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
				    	<span style="">
	        				<h3>Image Management</h3>
				    	</span>
    				</div>
    			</div>	
    			<div class="row" style="margin-bottom: 10px;">
    				<div class="col-md-12">
						<div class="row" id="image_block">
							<div class="col-md-12 grid">
							<?php 
							foreach($images as $i){
							    $originalImage = url('uploads/images/'.$i->filename);
							    $thumbImage = url('uploads/images/thumbs/'.$i->filename);
							    $owner = $i->user->name;
						    ?>
						    	<div class="grid-item">
                                    <a class="" href="{{ $originalImage }}" data-lightbox="image-set" data-title="{{ $originalImage }}">
                                    <img src="{{ $thumbImage }}" alt="" class="">
                                    </a>
                                    <div>{{ $owner }}</div>
                                </div>
                            <?php }?>
							
							</div>
						</div>
    				</div>
    			</div>
    			<div class="row" style="margin-bottom: 10px;">
    				<div class="col-md-12">	
						<form id="imageUploadForm" action="javascript:void(0)" enctype="multipart/form-data">
							<div class="btn">
								<input type="file" name="file_name" id="file_name" required="" onchange="readURL(this);" accept=".png, .jpg, .jpeg"> <br>
								<button type="submit" class="btn btn-secondary d-flex justify-content-center mt-3">submit</button>
							</div>
							<img id="preview" src="{{ url('images/no-image-tut.png') }}" class="" width="200" height="150"/>
						</form>
					
					</div>
				</div>
            </div>
            @include('dashboard.partials.footer')
		</div>
	</div>
</div>
@endsection

@push('styles')
<link href="{{ asset('libs/lightbox2/dist/css/lightbox.min.css') }}" rel="stylesheet">

<style>
.grid-item { 
    padding: 5px 5px 5px 5px;
}
</style>
@endpush

@push('bottom_scripts')
<script src="{{ asset('libs/lightbox2/dist/js/lightbox.min.js') }}"></script>
<script src="{{ asset('libs/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('libs/imagesloaded.pkgd.min.js') }}"></script>
<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

var $grid = $('.grid').imagesLoaded( function() {
	// init Isotope after all images have loaded
	$grid.isotope({
		itemSelector: '.grid-item',
		layoutMode: 'masonry'
	});
});


$(document).ready(function(){
	lightbox.option({
		'alwaysShowNavOnTouchDevices': false,
		'disableScrolling': false,
		'fadeDuration':600,
		'fitImagesInViewport': true,
		'imageFadeDuration': 600,
		//'maxWidth': 10,
		//'maxHeight': 10,
		'positionFromTop': 50,
		'resizeDuration': 700,
		'showImageNumberLabel': true,
		'wrapAround': false,
		'albumLabel': "Imagessss %1 of %2"
	})

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
				$("#file_name").val("");
				$("#preview").attr("src","{{ url('images/no-image-tut.png') }}");
				
				var url1 = '{{ url("uploads/images/") }}/'+data.filename;
				var url2 = '{{ url("uploads/images/thumbs/") }}/'+data.filename;
				var item2append = '<div class="grid-item">'+
				'<a class="" href="'+url1+'" data-lightbox="image-set">'+
				'<img src="'+url2+'" alt="" class=""></a></div>';
				var $content = $(item2append)
				$grid.append( $content ).isotope( 'appended', $content ).isotope('layout')		    
				
			},
			error: function(data){
				console.log(data);
				var responses = JSON.parse(data.responseText);
				if(Array.isArray(responses.errors.file_name)){
					var xs  = responses.errors.file_name;
					xs.forEach(function (x){
						alert(x);
				    });
				}
				$("#file_name").val("");
				$("#preview").attr("src","{{ url('images/no-image-tut.png') }}");
				
			}
		});
	}));
		
	
})



function readURL(input, id) {
	id = id || '#preview';
    if (input.files[0]) {
	    var reader = new FileReader();
		reader.onload = function (e) {
            $(id)
			.attr('src', e.target.result)
            .width(200)
            .height(150);
		};
		reader.readAsDataURL(input.files[0]);
    }
}

</script>
@endpush
