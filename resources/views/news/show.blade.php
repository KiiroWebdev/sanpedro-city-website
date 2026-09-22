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

                    <span class="news-category">
                        {{ $post->category }}
                    </span>

                    @if($post->published_at)
                        <span class="news-date">
                            <i class="bi bi-calendar3"></i>
                            {{ $post->published_at->format('F d, Y') }}
                        </span>
                    @endif

                </div>

                <h1>{{ $post->title }}</h1>

                @if($post->author)
                    <div class="news-article-author">
                        <i class="bi bi-person"></i>
                        Published by {{ $post->author }}
                    </div>
                @endif

            </header>

            {{-- Featured Image --}}
            <div class="news-article-image">

                <img
                    src="{{ $post->featured_image
                        ? asset('images/' . $post->featured_image)
                        : asset('images/city-hall.jpg') }}"
                    alt="{{ $post->title }}"
                >

            </div>

            {{-- Article Content --}}
            <div class="news-article-content">

                @if($post->excerpt)
                    <p class="news-article-excerpt">
                        {{ $post->excerpt }}
                    </p>
                @endif

                <div class="news-article-text">
                    {!! nl2br(e($post->content)) !!}
                </div>

            </div>

        </article>

        {{-- Bottom Navigation --}}
        <div class="news-article-footer">

            <a
                href="{{ route('news.index') }}"
                class="btn btn-primary"
            >
                <i class="bi bi-arrow-left"></i>
                Back to News
            </a>

        </div>

    </div>

</section>

@endsection