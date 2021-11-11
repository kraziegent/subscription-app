@component('mail::message')
Hello,  {{-- use double space for line break --}}


A new post has been uploaded to **{{ $site }}** the details are below.  {{-- use double space for line break --}}

The post is titled {{ $title }} and a brief description is shown below.  {{-- use double space for line break --}}

{{ $description }}.  {{-- --}}

Sincerely,
{{ config('app.name') }}.

@endcomponent
