@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <p>CKEDITOR</p>
                    <form action="{{ route('profile.update') }}" method="POST" role="form" enctype="multipart/form-data">
                        @csrf
                        <div id="editor">
                			<h2>The three greatest things you learn from traveling</h2>

                			<p>Like all the great things on earth traveling teaches us by example. Here are some of the most precious lessons I’ve learned over the years of traveling.</p>

                			<h3>Appreciation of diversity</h3>

                			<p>Getting used to an entirely different culture can be challenging. While it’s also nice to learn about cultures online or from books, nothing comes close to experiencing <a href="https://en.wikipedia.org/wiki/Cultural_diversity">cultural diversity</a> in person. You learn to appreciate each and every single one of the differences while you become more culturally fluid.</p>

                			<figure class="image image-style-side">
                                <img src="{{ asset('libs/ckeditor5-build-classic/sample/img/umbrellas.jpg') }}" alt="Three Monks walking on ancient temple.">
                				<figcaption>Leaving your comfort zone might lead you to such beautiful sceneries like this one.</figcaption>
                			</figure>

                			<h3>Confidence</h3>

                			<p>Going to a new place can be quite terrifying. While change and uncertainty makes us scared, traveling teaches us how ridiculous it is to be afraid of something before it happens. The moment you face your fear and see there was nothing to be afraid of, is the moment you discover bliss.</p>
                		</div>
                        <div style="margin-top: 10px;">
                            <button type="button" class="btn btn-primary" id="sendBtn">Send</button>
                        </div>
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
<script src="{{ asset('libs/ckeditor5-build-classic/ckeditor.js') }}" ></script>
<script src="{{ asset('libs/BootstrapDetector.js') }}" ></script>

<script>
let editor;
ClassicEditor
.create( document.querySelector( '#editor' ), {
	// toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
} )
.then( newEditor => {
	editor = newEditor;
} )
.catch( error => {
	console.error( error );
} );

document.querySelector('#sendBtn').addEventListener('click',()=>{
    const editorData = editor.getData();
    console.log(editorData);
    alert(editorData);
})

// $('#sendBtn').click(function(){
//     alert($('#editor').val());
//     ///alert(texts);
// });
</script>
@endpush
