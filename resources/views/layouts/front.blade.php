<html>
<head>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'/>
    <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'/>
    <meta name="yandex-verification" content="fef03c45191adb27"/>
    <meta name="description" content="Сантехник в Ставрополе">
    <title>Сантехник в Ставрополе</title>
    <base href="{{ env("APP_URL") }}"/>
    <link href='{{ url("/css/build/vendor.css") }}' rel='stylesheet' type='text/css'/>
    <link href='{{ url("/css/build/layout.css") }}' rel='stylesheet' type='text/css'/>
    {{--

        <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js'></script>
        <script type='text/javascript' src='../assets/templates/main/js/jquery.maskedinput.min.js'></script>
        <script type='text/javascript' src='../assets/templates/main/js/owl.carousel.min.js'></script>
        <script type='text/javascript' src='../assets/templates/main/js/run.jquery.min.js'></script>
    --}}

    <script src='{{ url("/js/build/vendor.js") }}'></script>
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

                        <div class="col-12">
                            <div class="button_area">
                                <div class="text_order" id='order'
                                     onclick="yaCounter27173903.reachGoal('order'); return true;">
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