@php
$articles_active = "active"
@endphp
@extends('layout.dashboard')
@section('title', "New Articles")

@section('content')
<div class="content">
    @if (session('message'))
    <x-alert :type="session('type')" :message="session('message') " />
    @endif

    <header class="content-header">
        <p>Create a New Post</p>
    </header>

    <form action="{{ route('articles.store') }}" method="post" class="form-row my-4 mx-2 new-post"
        enctype="multipart/form-data">
        @csrf
        <aside class="post-thumbnail">
            <aside>
                <p style="font-size: 14px; font-weight: 600; ">Upload thumbnail for your post</p>
                <input type="file" class="form-control dropify" name="thumbnail" accept=".jpg, .jpeg, .png"
                    data-default-file="https://res.cloudinary.com/https-midastouchacademy-com/image/upload/v1618693692/mti_logo.jpg"
                    required>
                @error('thumbnail') <small class="error-display text-danger">{{ $message }}</small> @enderror
            </aside>
        </aside>

        <section class="post-body">
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="">Select a Category</label>
                        <select name="category_id" class="form-control form-control-alternative" required>
                            @foreach ($categories as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->category }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="">Title of your Post</label>
                        <input type="text" name="title" class="form-control form-control-alternative"
                            value="{{ old('title') }}" required>
                        @error('title') <small class="error-display text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        @error('body') <small class="error-display text-danger">{{ $message }}</small> @enderror
                        <textarea name="body" class="form-control form-control-alternative editor"
                            placeholder="Write a post"></textarea>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-success">Publish post</button>
            </div>
        </section>
    </form>
</div>
@endsection

@section('scripts')
@parent
<script>
    $('.dropify').dropify();
    ClassicEditor.create(document.querySelector(".editor"), {
        toolbar: {
        items: [
            'imageUpload',
            'mediaEmbed',
            'heading',
            '|',
            'bold',
            'italic',
            'underline',
            'link',
            '|',
            'bulletedList',
            'numberedList',
            'blockQuote',
            '|'
        ]
    },
    image: {
        toolbar: [
            'imageTextAlternative',
            'imageStyle:full',
            'imageStyle:side'
        ]
    },
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
