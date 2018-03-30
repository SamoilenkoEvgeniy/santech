@extends("layouts.front")

@section("title")Услуги Сантехника в Ставрополе@endsection

@section("description")Качественно и не дорого.@endsection

@section("content")
    <h2>
        {{$dictionary['list']}}
    </h2>
    <div class="container services_main_block">
        <div class="row">
            @foreach($services as $service)
                @if($loop->iteration % 4 === 0)
        </div>
        <div class="row">
            @endif
            <div class="col-4">
                <div class="services_main_block__item"
                     style="background: url('{{ $service->image  }}') no-repeat; background-size: cover">
                    <div class="overlay"></div>
                    <h3>
                        <a href="/services/{{ $service->slug }}">{{ $service->header }}</a>
                        <p style="font-size: 18px;">
                            {!! $service->preview_text !!}
                        </p>
                    </h3>

                    <div class="name">
                    </div>
                    <div class="name_text">
                        {{ $service->header }}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection