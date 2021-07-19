@php
$articles_active = "active"
@endphp
@extends('layout.dashboard')
@section('title', "Articles")

@section('content')
<div class="content">
    <header class="content-header">
        <p>Articles</p>
    </header>

    <div class="articles-overview">
        <aside id="create-post">
            <a href="{{ route('articles.create') }}">
                <span class="material-icons">
                    create
                </span>
            </a>
        </aside>
        @forelse ($articles as $article)
        <article class="post">
            <figure class="thumbnail">
                <img src="{{ $article->thumbnail }}" alt="article image">
            </figure>

            <article class="excerpt">
                <p class="title">{{ $article->title }}</p>
                <p class="author">{{ "{$article->user->first_name}  {$article->user->last_name}" }}</p>
                <a href="{{ route('articles.show', $article->slug) }}">
                    <span>Read article </span>
                    <span class="material-icons">
                        arrow_right_alt
                    </span>
                </a>
                <span class="category">{{ $article->category->category }}</span>
            </article>
        </article>
        @empty
        @endforelse

    </div>
</div>
@endsection
