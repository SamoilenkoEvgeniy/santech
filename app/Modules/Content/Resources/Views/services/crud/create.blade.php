@extends("layouts.app")

@section("content")
    <div class="panel panel-default">
        <div class="panel-heading">
            Добавить {{ $dictionary['what'] }}
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ url($base_url . '/' . $model ."/store") }}" method="post"
                          enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <label for="header">Заголовок</label>
                            <input name="header" class="form-control" id="header"/>
                        </div>

                        <div class="form-group">
                            <label for="slug">Заголовок</label>
                            <input name="slug" class="form-control" id="slug"/>
                        </div>

                        <div class="form-group">
                            <label for="image">Изображение</label>
                            <input type="file" name="image" class="form-control" id="image"/>
                        </div>

                        <div class="form-group">
                            <label for="preview_text">Превью текста</label>
                            <textarea name="preview_text" id="preview_text" cols="30" rows="10"
                                      class="form-control"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="text">Текст</label>
                            <textarea name="text" id="text" cols="30" rows="10" class="form-control"></textarea>
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Добавить"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection