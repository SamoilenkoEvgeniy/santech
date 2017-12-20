@extends("layouts.front")

@section("content")
    <div class="service">
        <h3>
            <a href="{{ url("/services/".$service->slug) }}">{{ $service->header }}</a>
        </h3>
        <div class="service_description">
            {{ $service->preview_text }}
        </div>
    </div>
@endsection