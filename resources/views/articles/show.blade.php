@php
$articles_active = "active"
@endphp
@extends('layout.dashboard')
@section('title', "Article - $article->title")


@section('content')
<div class="content">
    <header class="content-header">
        <p>{{ $article->title }}</p>
    </header>

    {!! $article->body !!}
</div>
@endsection
