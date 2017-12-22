<html>
<head>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'/>
    <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'/>
    <meta name="yandex-verification" content="fef03c45191adb27"/>
    <meta name="description" content="@yield("description")"/>
    <title>@yield("title")</title>
    <base href="{{ env("APP_URL") }}"/>
</head>
<body>
<div class='shadow'>
    <div id="wrapper">
        <header class="header">
            <div class="in row">
                <div class="col-6">
                    <a href="{{ url("/") }}">
                        <div class="logo">
                            <div class="logo_text"> Сантехник26.рф</div>
                            <div class="logo_sub_text">Все виды сантехнических работ в Ставрополе</div>
                        </div>
                    </a>
                </div>
                <div class="col-6">
                    <div class="row">
                        <div class="col-12">
                            <div class="contacts">
                                <div class="contacts_phone"><a
                                            href='tel:{{ \App\Modules\Base\Models\Setting::findByKey("phone_number_tag") }}'>{{ \App\Modules\Base\Models\Setting::findByKey("phone_number") }}</a>
                                </div>
                                <div class="contacts_address">{{ \App\Modules\Base\Models\Setting::findByKey("address") }}</div>
                            </div>
                        </div>

                        <div class="col-12" style="z-index: 111;">
                            <div class="button_area">
                                <div class="text_order" id='order'>
                                    Вызов сантехника
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="main">
            <div class="in">
                @yield("content")
            </div>
        </div>
        @yield("after_content")
    </div>
    <div class='footer'>
        <div class="in">

        </div>
    </div>
</div>

<link href='{{ url("/css/build/layout.css") }}' rel='stylesheet' type='text/css'/>
<script src='{{ url("/js/build/vendor.js") }}'></script>
<script type="text/javascript">
    $(document).ready(function () {
        $("head").append("<link rel='stylesheet' type='text/css' href='/css/build/vendor.css' />");
    })
</script>

@if(env("APP_METRIKA", true))
    <!-- Yandex.Metrika counter -->
    <script type="text/javascript">
        (function (d, w, c) {
            (w[c] = w[c] || []).push(function () {
                try {
                    w.yaCounter27173903 = new Ya.Metrika({
                        id: 27173903,
                        webvisor: true,
                        clickmap: true,
                        trackLinks: true,
                        accurateTrackBounce: true
                    });
                } catch (e) {
                }
            });

            var n = d.getElementsByTagName("script")[0],
                s = d.createElement("script"),
                f = function () {
                    n.parentNode.insertBefore(s, n);
                };
            s.type = "text/javascript";
            s.async = true;
            s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

            if (w.opera == "[object Opera]") {
                d.addEventListener("DOMContentLoaded", f, false);
            } else {
                f();
            }
        })(document, window, "yandex_metrika_callbacks");
    </script>
    <noscript>
        <div><img src="//mc.yandex.ru/watch/27173903" style="position:absolute; left:-9999px;" alt=""/></div>
    </noscript>

    <!-- /Yandex.Metrika counter -->
@endif
</body>
</html>