function sent_form() {
    var t = $("#form"),
        e = t.serialize(),
        o = $(".modal_window"),
        s = $(".button_area"),
        n = "<div class='text_order'>Спасибо за вызов!</div>";
    return $.ajax({
        url: "/submitOrder",
        type: "post",
        data: e,
        success: function (t) {
            o.html(t), s.animate({
                height: 147
            }), setTimeout(function () {
                s.html(n), s.css("width", "221px"), s.css("height", "44px"), s.css("box-shadow", "none"), s.css("box-shadow", "none"), s.css("background", "#01aeff")
            }, 5e3)
        },
        error: function () {
            alert("Ошибка! Сервер временно недоступен!")
        }
    }), !1
}

$(window).ready(function () {

    $("#slider").owlCarousel({
        autoPlay: 8e3,
        navigation: !1,
        rewindSpeed: 3e3,
        singleItem: !0,
        prev: "",
        next: "",
        pagination: !1
    });

    $("#phone").mask("+7(999)999-99-99");

    var t = $("#order"),
        e = "#order",
        o = ({
            width: t.css("width"),
            height: t.css("height"),
            box_shadow: t.css("box-shadow"),
            background: t.css("background"),
            html: t.html()
        }, {
            width: 406,
            height: 324,
            box_shadow: "0px 2px 10px 1px rgba(0,0,0, 0.55)",
            background: "#fff"
        });

    $("body").delegate(e, "click", function () {
        t = $(this), $(this).parent().animate({
            width: o.width,
            height: o.height
        }), $(this).parent().css("background", o.background), $(this).parent().css("box-shadow", o.box_shadow), $.ajax({
            url: "/getModal",
            success: function (e) {
                t.parent().html(e)
            },
            error: function () {
                alert("Ошибка! Сервер временно недоступен!")
            }
        })
    });

    $("body").delegate(".close", "click", function () {
        $(".button_area").removeAttr("style").html("<div class='text_order' id='order'>Вызов сантехника</div>")
    });

    $(".services_main_block__item").hover(function () {
        var that = $(this);
        that.find("h3").first().fadeIn(100);
        that.find(".overlay").first().stop(true,true).addClass("slow", 500);

    }, function () {
        var that = $(this);
        that.find("h3").first().fadeOut(100);
        that.find(".overlay").first().stop(true,true).removeClass("slow", 500);
    });

});