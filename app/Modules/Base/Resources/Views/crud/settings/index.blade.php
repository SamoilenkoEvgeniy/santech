@extends("layouts.app")

@section("content")
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Управление настройками
            </div>

            <div class="panel-body">
                <form action="{{ url($base_url."/update") }}" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <?php foreach ($fields as $key => $field) { ?>
                    <div class="form-group">
                        <label for="<?= $field['type'] ?>"><?= $field['rus_name'] ?></label>
                        <input class="form-control" name="<?= $key ?>" type="<?= $field['type'] ?>"
                               id="<?= $key ?>"
                               <?php if ($field['type'] == "text" || $field['type'] == "number") { ?>
                               value="<?php echo $values[$key] ?>"
                        <?php } elseif ($field['type'] == "checkbox") {
                            echo $values[$key] ? "checked='checked'" : "";
                        } ?>
                        />
                    </div>
                    <?php } ?>
                    <div class="form-group">
                        <input type="submit" value="Сохранить настройки" class="btn btn-primary"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection