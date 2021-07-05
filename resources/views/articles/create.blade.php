@extends('layout.dashboard')
@section('title', "New Articles")

@section('content')
<form action="" method="post" class="form-row m-4">
    @csrf
    <aside class="col-md-3">
        <aside class="card shadow shadow-sm">
            <div class="card-header">
                <span class="card-title">Article thumbnail </span>
            </div>
            <div class="card-body ">
                <p style="font-size: 14px">This will be the image used in identifying your article</p>
                <input type="file" class="form-control dropify" name="profilepix" accept="image/*"
                    data-default-file="https://res.cloudinary.com/https-midastouchacademy-com/image/upload/v1618693692/mti_logo.jpg">
            </div>
        </aside>
    </aside>

    <section class="col-md-9">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam voluptates deserunt magni optio excepturi,
        perferendis voluptate sunt, mollitia nobis beatae atque dignissimos aliquid dolores dolore aperiam perspiciatis
        doloribus officia necessitatibus.
    </section>
</form>
@endsection
{{-- <textarea id="postbody" name="body" class="form-control" placeholder="Write a post"></textarea> --}}

@section('scripts')
@parent
<script>
    $('.dropify').dropify();
    ClassicEditor.create(document.querySelector("#postbody"), {
	simpleUpload: {
		// The URL the images are uploaded to.
		uploadUrl: "/api/upload"
	}
}).then(editor => {
	var app = '{!! old('body') !!}';
	editor.setData(app);
});
</script>
@endsection
