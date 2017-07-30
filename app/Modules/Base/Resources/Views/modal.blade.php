<div class='modal_window'>
    <div class='header_modal'>
        Вызов сантехника
    </div>
    <div class='close'></div>

    <form action='' method='post' id='form'>
        <div style='width: 100px; heihgt: 100px; bacground: #000;'></div>
        <div class='field_modal'>
            <div class='label'>Ваше имя</div>
            <div class='input'><input type='text' name='name' placeholder='Как к вам обращаться?'/></div>
        </div>
        <div class='field_modal'>
            <div class='label'>Ваш номер телефона</div>
            <div class='input'><input type='text' name='phone' placeholder='+7(999)999-99-99' id='phone'/></div>
        </div>
        <div class='field_modal'>
            <div class='input'><input onclick="sent_form(this);return false;" type='submit' value='Отправить заявку'/>
            </div>
        </div>

    </form>
</div>
<script>
    $(window).ready(function () {
        $("#phone").mask("+7(999)999-99-99");
    })
</script>