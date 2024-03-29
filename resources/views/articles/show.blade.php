@php
$articles_active = "active";
$created = strtotime($article->created_at);
@endphp
@extends('layout.dashboard')
@section('title', "Article - $article->title")

@section('content')
<div class="content">
    <section for="alert">
        @if (session('message'))
        <x-alert :type="session('type')" :message="session('message') " />
        @endif
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

                @can('update', $article)
                <a href="{{ route('articles.edit', $article) }}" class="btn btn-sm btn-primary">
                    Edit Post
                </a>
                @endcan

                <form method="POST" action="{{ route('comment', $article->slug) }}" for="comment-box" class="mt-4">
                    @csrf
                    <div class="form-group">
                        <label for="" style="font-weight: 600">Leave a Comment</label>
                        <textarea name="comment" rows="7" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success" name="post_comment">Post Comment</button>
                    </div>
                </form>

                <article class="comments mt-3">
                    @if (count($article->comments))
                    <header class="content-header">
                        <p style="font-size: 17px"> COMMENTS</p>
                    </header>
                    <div class="comment-scroll">
                        @foreach ($article->comments as $comment)
                        <div class="card mb-4 shadow-sm user-replies">
                            <div class="px-3 py-2">
                                <p class="mb-1" style="font-weight: 600">
                                    {{ "{$comment->user->first_name} {$comment->user->last_name}" }}
                                </p>
                                <small>

                                </small>
                                <p class="mb-0" style="font-size: 14px">{{ $comment->comment }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif
                </article>

            </section>

            <aside class="author">
                <header>
                    <img src="{{ $article->author->picture }}" alt="author">
                    <div>
                        <p class="m-0 name">{{ $article->author->first_name }} {{ $article->author->last_name }}</p>
                        <span class="role">Author</span>
                    </div>
                </header>
                @if ($article->author->facebook || $article->author->twitter || $article->author->linkedin || $article->author->reddit)

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


    @if (count($related_articles))

    <section for="related-articles">
        <header class="content-header mt-3">
            <p> Related Articles</p>
        </header>

        <div class="articles-overview">
            @foreach ($related_articles as $article)
            <article class="post">
                <figure class="thumbnail">
                    <img src="{{ $article->thumbnail }}" alt="article image">
                </figure>

                <article class="excerpt">
                    <p class="title">{{ $article->title }}</p>
                    <p class="author">{{ "{$article->author->first_name}  {$article->author->last_name}" }}</p>
                    <a href="{{ route('articles.show', $article->slug) }}">
                        <span>Read article </span>
                        <span class="material-icons">
                            arrow_right_alt
                        </span>
                    </a>
                    <span class="category">{{ $article->category->category }}</span>
                </article>
            </article>
            @endforeach
        </div>
    </section>
    @endif

</div>
@endsection
