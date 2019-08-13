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
                    <p>{{ captcha_img("flat") }}</p>
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

@endpush
