@php
$articles_active = "active"
@endphp
@extends('layout.dashboard')
@section('title', "Edit Article")

@section('content')
<div class="content">
    <section for="alert">
        @if (session('message'))
        <x-alert :type="session('type')" :message="session('message') " />
        @endif
    </section>

    <header class="content-header">
        <p>Update Post</p>
    </header>

    <form action="{{ route('articles.update', $article) }}" method="post" class="form-row my-3 mx-2 new-post edit"
        enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <aside class="post-thumbnail">
            <aside>
                <p style="font-size: 14px; font-weight: 600; ">Thumbnail</p>
                <input type="file" class="form-control dropify" name="" accept=".jpg, .jpeg, .png"
                    data-default-file="{{ $article->thumbnail }}" disabled>
                @error('thumbnail') <small class="error-display text-danger">{{ $message }}</small> @enderror
            </aside>
        </aside>

        <section class="post-body">
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="">Category</label>
                        <select name="category_id" class="form-control form-control-alternative" required>
                            @foreach ($categories as $cat)
                            <option value="{{ $cat->id }}" {{ $cat->id == $article->category->id ? 'selected' : '' }}>
                                {{ $cat->category }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="">Title of your Post</label>
                        <input type="text" name="title" class="form-control form-control-alternative"
                            value="{{ old('title') ?? $article->title }}" required>
                        @error('title') <small class="error-display text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        @error('body') <small class="error-display text-danger">{{ $message }}</small> @enderror
                        <textarea name="body"
                            class="form-control form-control-alternative editor">{{ $article->body }}</textarea>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-success">Update post</button>
            </div>
        </section>
    </form>
</div>
@endsection

@section('scripts')
@parent
@include('articles.script')
@endsection
