@extends("layouts.front")

@section("content")
    <div class="service">
        <h3>
            <a href="{{ url("/services/".$service->slug) }}">{{ $service->header }}</a>
        </h3>
        <div class="service_description">
            {!! $service->text !!}
        </div>

        <h4>
            Телефон: <a
                    href='tel:{{ \App\Modules\Base\Models\Setting::findByKey("phone_number_tag") }}'>{{ \App\Modules\Base\Models\Setting::findByKey("phone_number") }}</a>
        </h4>
    </div>
@endsection