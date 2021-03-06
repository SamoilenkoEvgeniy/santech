@extends("layouts.front")

@section("title")Сантехник в Ставрополе@endsection

@section("description")Быстро. Качественно. Не дорого.@endsection

@section("content")
    <div class='page_header'>
        Услуги сантехника в Ставрополе
    </div>
    <div class='page_sub_header'>
        Выeздные работы в квартирах и частных домах
    </div>
    <div class='page_text' style="margin-top: 44px;">
        <p>
            Меня зовут Павел, и я сантехник с опытом более 15 лет.
        </p>
        <p>
            Мой Профессионализм и опыт гарантируют аккуратный, качественный монтаж сантехники любого
            плана. Причем, я могу выполнить объем работы добросовестно за предельно короткое время.
            Именно качество монтажа сантехники продлевает срок ее эксплуатации и гарантирует хозяевам
            беспроблемный функционал.
        </p>
        <p>
            Дайте мне знать о вашей проблеме - и я решу её!
        </p>
        <p>
            Я работаю без протечек!
        </p>
    </div>
@endsection

@section("after_content")
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