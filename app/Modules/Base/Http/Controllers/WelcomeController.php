<?php

namespace App\Modules\Base\Http\Controllers;

use App\Modules\Content\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WelcomeController extends Controller
{

    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();
        return $this->view("base::welcome", [
            "services" => $services
        ]);
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function getModal()
    {
        return $this->view("base::modal");
    }

    /**
     * @param Request $request
     * @return string
     */
    public function submitOrder(Request $request)
    {
        $name = $request->input("name");
        $phone = $request->input("phone");
        $placeholders = [
            "name" => $name,
            "phone" => $phone
        ];

        if (env("SMS_NOTIFICATION")) {
            file_get_contents("http://sms.ru/sms/send?api_id=" . env("SMS_NOTIFICATION_TOKEN") . "&text=" . urlencode(iconv("utf-8", "utf-8", "Новая заявка {$name} {$phone}")));
        }

        if (ENV("TELEGRAM_NOTIFICATION")) {
            file_get_contents("https://api.telegram.org/bot" . ENV("TELEGRAM_TOKEN") . "&chat_id=" . ENV('TELEGRAM_CHAT_ID') . "&text=" . urlencode("Новая заявка {$name} {$phone}"));
        }

        return "<div class='header_modal'>Спасибо! Мы скоро свяжемся с вами!</div>";
    }
}
