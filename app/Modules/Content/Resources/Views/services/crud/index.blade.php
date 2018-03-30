@extends("layouts.app")

@section("content")
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="pull-left">
                Редактирование списка {{$dictionary['list']}}
            </div>
            <div class="pull-right">
                <a href="{{ url($base_url . '/' . $model . "/create") }}"
                   class="btn btn-primary">Добавить {{$dictionary['what']}}</a>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    @foreach($services as $service)
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="pull-left">
                                    {{ $service->header }}
                                </div>
                                <div class="pull-right">
                                    <a href="{{ url($base_url.'/'.$model."/edit/".$service->id) }}"
                                       class="btn btn-primary">Редактировать</a>
                                    <a href="{{ url($base_url.'/'.$model."/delete/".$service->id) }}"
                                       class="btn btn-danger">Удалить</a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <img src="{{ url($service->image) }}" alt="alt"/>
                                    </div>
                                    <div class="col-md-6">
                                        {{ $service->preview_text }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
@endsection