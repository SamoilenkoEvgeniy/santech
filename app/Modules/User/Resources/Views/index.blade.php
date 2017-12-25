@extends("layouts.app")

@section("content")
    <div class="panel panel-default">
        <div class="panel-heading">
            Сменить пароль для пользователя
        </div>
        <div class="panel-body">
            <form action="{{ url("/admin/crud/user/update") }}" method="post" enctype="multipart/form-data">
                {!! csrf_field() !!}

                <div class="form-group">
                    <label for="email">Электронная почта</label>
                    <input id="email" class="form-control" name="email" type="email"/>
                </div>

                <div class="form-group">
                    <label for="password">Новый пароль</label>
                    <input id="password" class="form-control" name="password" type="text"/>
                </div>

                <div class="form-group">
                    <input type="submit" value="Сохранить настройки" class="btn btn-primary"/>
                </div>
            </form>
        </div>
    </div>
@endsection