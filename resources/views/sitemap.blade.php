<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>{{env('APP_URL')}}</loc>
    </url>
    <url>
        <loc>{{env('APP_URL')}}services</loc>
    </url>
    @foreach($services as $service)
        <url>
            <loc>{{env('APP_URL')}}services/{{ $service->slug }}</loc>
        </url>
    @endforeach
    <url>
        <loc>{{env('APP_URL')}}articles</loc>
    </url>
    @foreach($articles as $article)
        <url>
            <loc>{{env('APP_URL')}}articles/{{ $article->slug }}</loc>
        </url>
    @endforeach
</urlset>