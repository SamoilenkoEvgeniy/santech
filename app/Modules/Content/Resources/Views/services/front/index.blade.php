@extends("layouts.front")

@section("title")Услуги Сантехника в Ставрополе@endsection

@section("description")
    Качественно и не дорого.
@endsection

@section("content")
    <div class="services">
        @foreach($services as $service)
            <div class="service">
                <h3>
                    <a href="{{ url("/services/".$service->slug) }}">{{ $service->header }}</a>
                </h3>
                <div class="service_description">
                    {!! $service->preview_text !!}
                </div>
            </div>
        @endforeach
    </div>
@endsection