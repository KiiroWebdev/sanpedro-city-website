@extends('layouts.app')

@section('title', $announcement->title . ' | City Government of San Pedro, Laguna')

@section('content')

<section class="announcement-detail-page">

    <div class="container">

       {{-- Back to Announcements --}}
<div class="announcement-detail-back">

    <a href="{{ route('announcements.index') }}">
        <i class="bi bi-arrow-left"></i>
        Back to Announcements
    </a>

</div>


        {{-- Announcement Article --}}
        <article class="announcement-detail-card">

            <div class="announcement-detail-header">

                {{-- Meta --}}
                <div class="announcement-detail-meta">

                    <span class="news-category">
                        {{ $announcement->category }}
                    </span>

                    @if($announcement->published_at)

                        <span class="news-date">
                            <i class="bi bi-calendar3"></i>
                            {{ $announcement->published_at->format('F d, Y') }}
                        </span>

                    @endif

                </div>


                {{-- Title --}}
                <h1>
                    {{ $announcement->title }}
                </h1>


                {{-- Author --}}
                @if($announcement->author)

                    <div class="announcement-detail-author">

                        <i class="bi bi-person"></i>

                        Published by {{ $announcement->author }}

                    </div>

                @endif

            </div>


            {{-- Article Content --}}
            <div class="announcement-detail-body">

                {{-- Excerpt / Highlight --}}
            @if($announcement->excerpt)

    <div class="announcement-detail-excerpt">

        <i class="bi bi-megaphone"></i>

        <p>
            {{ $announcement->excerpt }}
        </p>

    </div>

@endif


                {{-- Full Content --}}
                @if($announcement->content)

                    <div class="announcement-detail-content">

                        {!! nl2br(e($announcement->content)) !!}

                    </div>

                @endif

            </div>


        </article>


{{-- Announcement Navigation --}}
@php
    $announcementNavClass = 'announcement-detail-footer';

    if (!$previousAnnouncement && $nextAnnouncement) {
        $announcementNavClass .= ' has-next-only';
    } elseif ($previousAnnouncement && !$nextAnnouncement) {
        $announcementNavClass .= ' has-previous-only';
    } elseif (!$previousAnnouncement && !$nextAnnouncement) {
        $announcementNavClass .= ' has-no-adjacent';
    }
@endphp

<div class="{{ $announcementNavClass }}">

    {{-- Previous Announcement --}}
    @if($previousAnnouncement)

        <div class="announcement-detail-nav announcement-detail-nav-prev">

            <a
                href="{{ route('announcements.show', $previousAnnouncement->slug) }}"
                class="announcement-nav-link"
            >
                <span class="announcement-nav-label">
                    <i class="bi bi-arrow-left"></i>
                    Previous Announcement
                </span>

                <span class="announcement-nav-title">
                    {{ $previousAnnouncement->title }}
                </span>
            </a>

        </div>

    @endif


    {{-- Back to Announcements --}}
    <div class="announcement-detail-nav-center">

        <a
            href="{{ route('announcements.index') }}"
            class="announcement-nav-home"
        >
            <i class="bi bi-grid"></i>
            Back to Announcements
        </a>

    </div>


    {{-- Next Announcement --}}
    @if($nextAnnouncement)

        <div class="announcement-detail-nav announcement-detail-nav-next">

            <a
                href="{{ route('announcements.show', $nextAnnouncement->slug) }}"
                class="announcement-nav-link"
            >
                <span class="announcement-nav-label">
                    Next Announcement
                    <i class="bi bi-arrow-right"></i>
                </span>

                <span class="announcement-nav-title">
                    {{ $nextAnnouncement->title }}
                </span>
            </a>

        </div>

    @endif

</div>
</section>

@endsection