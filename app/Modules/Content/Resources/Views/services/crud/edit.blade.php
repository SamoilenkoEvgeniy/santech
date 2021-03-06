@extends("layouts.app")

@section("content")
    <div class="panel panel-default">
        <div class="panel-heading">
            Редактировать {{$dictionary['what']}}
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ url($base_url . '/' . $model ."/update") }}" method="post"
                          enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <input type="hidden" name="id" value="{{ $service->id }}"/>
                        <div class="form-group">
                            <label for="header">Заголовок</label>
                            <input name="header" class="form-control" id="header" value="{{ $service->header }}"/>
                        </div>

                        <div class="form-group">
                            <label for="slug">Slug</label>
                            <input name="slug" class="form-control" id="slug" value="{{ $service->slug }}"/>
                        </div>

                        <div class="jumbotron">
                            <img src="{{ $service->image }}" alt=""/>
                        </div>
                        <div class="form-group">
                            <label for="image">Изображение</label>
                            <input type="file" name="image" class="form-control" id="image"/>
                        </div>

                        <div class="form-group">
                            <label for="preview_text">Превью текста</label>
                            <textarea name="preview_text" id="preview_text" cols="30" rows="10"
                                      class="form-control">{{ $service->preview_text }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="text">Текст</label>
                            <textarea name="text" id="text" cols="30" rows="10"
                                      class="form-control">{{ $service->text }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="is_publish">Опубликован</label>
                            <input type="checkbox" name="is_public"
                                   {{ $service->is_public ? "checked" : "" }} id="is_public"/>
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Обновить"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection