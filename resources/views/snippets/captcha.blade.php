@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Captcha <a href="{{ route('snippets') }}">BACK</a></div>

                <div class="card-body">
                	@if ($errors->any())
                    <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
					</div><br />
                  	@endif
                    <form method="post" action="{{ route('snippetsProcessCaptcha') }}">
                    @csrf
                    <div id="c">{!! captcha_img("flat") !!}</div>
                    <p><a href="#" id="refresh">REFRESH</a></p>
                    <p><input id="captcha" type="text" class="form-control" placeholder="Enter Captcha" name="captcha"></p>
                    <p><button type="submit" name="check">Check</button></p>
                    </form>                
    			</div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('styles')
@endpush

@push('top_scripts')
@endpush

@push('bottom_scripts')
<script>
$("#refresh").click(function(e){
	e.preventDefault();
	$.ajax({
	     type:'GET',
	     url:'{{ route("snippetsRefreshCaptcha") }}',
	     success:function(data){
		     $("#c").html(data);
	     }
	  });	
})
</script>
@endpush
