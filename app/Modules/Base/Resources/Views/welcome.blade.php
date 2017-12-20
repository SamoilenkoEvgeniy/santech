@extends("layouts.front")

@section("content")
    <div class='page_header'>
        Услуги сантехника в Ставрополе
    </div>
    <div class='page_sub_header'>
        Выeздные работы в квартирах и частных домах
    </div>
    {{-- <div class='page_sub_sub_header'>Самые выгодные условия</div>
    {{--<div class='icons'>
        <div class='item'>
            <div class='img'><img src='/img/build/icon-clock.png' alt=''/></div>
            <div class='text'>
                <div class='text_header'>Оперативно</div>
                <div class='text_sub_header'>Регаируем на заявку не более 30 минут</div>
            </div>
        </div>
        <div class='item'>
            <div class='img'><img src='/img/build/icon-like.png' alt=''/></div>
            <div class='text'>
                <div class='text_header'>Даем гарантию</div>
                <div class='text_sub_header'>Гарантия на каждую выполненную работу</div>
            </div>
        </div>
        <div class='item'>
            <div class='img'><img src='/img/build/icon-money.png' alt=''/></div>
            <div class='text'>
                <div class='text_header'>Низкие цены</div>
                <div class='text_sub_header'>При высоком качестве услуг</div>
            </div>
        </div>
    </div>--}}
    <div class='page_text' style="margin-top: 44px;">
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
            Мы работаем без протечек!
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
                    </h3>
                    <div class="name">
                        {{ $service->header }}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection