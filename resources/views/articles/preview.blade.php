@php
$articles_active = "active";
$created = strtotime($article->created_at);
@endphp
@extends('layout.dashboard')
@section('title', "Article - $article->title")

@can('view', $article)
@section('content')
<div class="content">
    <section for="alert">
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <span class="alert-inner--icon mr-1"><i class="ni ni-bell-55"></i></span>
            <span class="alert-inner--text"><strong>Post Status: {{ $article->status }}</strong> </span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    </section>

    <div class="full-article">
        <header class="content-header" style="background-image: url({{ $article->thumbnail }})">
            <p style="font-size: 1.8em" class="position-relative">{{ $article->title }}</p>
            <div class="article-info">
                <span class="icon">
                    <img src="{{ asset('images/icons/calendar.png') }}" alt="calendar">
                </span>
                <span class="author mr-1">{{ $article->author->first_name }} {{ $article->author->last_name }}. </span>

                @if (date('Y') == date('Y', $created) )
                <span class="date">{{ date('M d', $created) }}</span>
                @else
                <span class="date">{{ date('M D, Y', $created) }}</span>
                @endif
            </div>
        </header>

        <div class="page">
            <section class="body">
                <article>{!! $article->body !!} </article>
                <a href="{{ route('articles.edit', $article) }}" class="btn btn-sm btn-primary">
                    Edit Post
                </a>
                <h5 class="mt-3">This is a preview display of your article</h5>
            </section>

            <aside class="author">
                <header>
                    <img src="{{ $article->author->picture }}" alt="author">
                    <div>
                        <p class="m-0 name">{{ $article->author->first_name }} {{ $article->author->last_name }}</p>
                        <span class="role">Author</span>
                    </div>
                </header>
                @if ($article->author->facebook || $article->author->twitter || $article->author->linkedin ||
                $article->author->reddit)

                <footer>
                    <p class="m-0 pt-2" style="font-weight: 600; font-size: 15px">Connect with Author </p>
                    <p class="socials">
                        @if ($article->author->facebook)
                        <a href="{{ $article->author->facebook }}">
                            <img src="{{ asset('images/icons/facebook.png') }}" alt="facebook">
                        </a>
                        @endif

                        @if ($article->author->twitter)
                        <a href="{{ $article->author->twitter }}">
                            <img src="{{ asset('images/icons/twitter.png') }}" alt="twitter">
                        </a>
                        @endif

                        @if ($article->author->linkedin)
                        <a href="{{ $article->author->linkedin }}">
                            <img src="{{ asset('images/icons/linkedin.png') }}" alt="linkedin">
                        </a>
                        @endif

                        @if ($article->author->reddit)
                        <a href="{{ $article->author->reddit }}">
                            <img src="{{ asset('images/icons/reddit.png') }}" alt="reddit">
                        </a>
                        @endif

                    </p>
                </footer>

                @endif

            </aside>
        </div>
    </div>

</div>
@endsection
@endcan
