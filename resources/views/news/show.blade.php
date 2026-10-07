@extends('layouts.app')

@section('title', $post->title . ' | City Government of San Pedro, Laguna')

@section('content')

<section class="news-article-page">

    <div class="container">

        {{-- Back to News --}}
        <div class="news-article-back">
            <a href="{{ route('news.index') }}">
                <i class="bi bi-arrow-left"></i>
                Back to News & Updates
            </a>
        </div>

        <article class="news-article">

            {{-- Article Header --}}
            <header class="news-article-header">

    <div class="news-article-meta">

        @if($post->category)
            <span class="news-category">
                {{ $post->category }}
            </span>
        @endif

        @if($post->published_at)
            <span class="news-date">
                <i class="bi bi-calendar3"></i>
                {{ $post->published_at->format('F d, Y') }}
            </span>
        @endif

    </div>

    <h1>
        {{ $post->title }}
    </h1>

    <div class="news-article-details">

        @if($post->author)
            <span class="news-article-author">
                <i class="bi bi-person"></i>
                Published by {{ $post->author }}
            </span>
        @endif

        @if($post->published_at)
            <span class="news-article-time">
                <i class="bi bi-clock"></i>
                {{ $post->published_at->format('h:i A') }}
            </span>
        @endif

    </div>

</header>

            {{-- Featured Image / Facebook Post --}}
@if($post->facebook_url)

    <div class="facebook-embed">
        <iframe
            src="https://www.facebook.com/plugins/post.php?href={{ urlencode($post->facebook_url) }}&show_text=true&width=500"
            width="500"
            height="738"
            style="border:none;overflow:hidden"
            scrolling="no"
            frameborder="0"
            allowfullscreen="true"
            allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share">
        </iframe>
    </div>

@elseif($post->featured_image)

    <div class="news-article-image">
        <img
            src="{{ asset('images/' . $post->featured_image) }}"
            alt="{{ $post->title }}"
        >
    </div>

@else

    <div class="news-article-image">
        <img
            src="{{ asset('images/city-hall.jpg') }}"
            alt="San Pedro City Hall"
        >
    </div>

@endif

            {{-- Article Content --}}
<div class="news-article-content">

    @if($post->excerpt)
        <div class="news-article-excerpt">
            <i class="bi bi-quote"></i>

            <p>
                {{ $post->excerpt }}
            </p>
        </div>
    @endif

    <div class="news-article-text">
        {!! nl2br(e($post->content)) !!}
    </div>

</div>

        </article>

        {{-- Bottom Navigation --}}
<div class="news-article-footer">

    {{-- Previous Article --}}
    <div class="news-article-nav news-article-nav-prev">

        @if($previousPost)

            <a
                href="{{ route('news.show', $previousPost->slug) }}"
                class="news-nav-link"
            >
                <span class="news-nav-label">
                    <i class="bi bi-arrow-left"></i>
                    Previous Article
                </span>

                <span class="news-nav-title">
                    {{ $previousPost->title }}
                </span>
            </a>

        @endif

    </div>

    {{-- Back to News --}}
    <div class="news-article-nav-center">

        <a
            href="{{ route('news.index') }}"
            class="news-nav-home"
        >
            <i class="bi bi-grid"></i>
            Back to News
        </a>

    </div>

    {{-- Next Article --}}
    <div class="news-article-nav news-article-nav-next">

        @if($nextPost)

            <a
                href="{{ route('news.show', $nextPost->slug) }}"
                class="news-nav-link"
            >
                <span class="news-nav-label">
                    Next Article
                    <i class="bi bi-arrow-right"></i>
                </span>

                <span class="news-nav-title">
                    {{ $nextPost->title }}
                </span>
            </a>

        @endif

    </div>

</div>

    </div>

</section>

@endsection