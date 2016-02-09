<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

class PagesController extends BaseController {
    public function mainPage() {
        //wyświetlić formularz uzytkownikowi
        return view('pages.welcome2');
    }

    public function convert() {
        //dane od uzytkownika
        $value = $_POST['value'];
        $currencyFrom = 'PLN';

        //validacja danych
        //1. dorobić na natępnych zajęciach

        //publiczne api
        //2. wyeksportujemy tą logikę - dodamy cache
        $client = new \GuzzleHttp\Client();
        $res = $client->request(
            'GET', 'http://api.fixer.io/latest?base=PLN');
        $response = json_decode($res->getBody());
        $targetCurrency = 'USD';
        $usdToPln = $response->rates->USD;
//        $usdToPln = 0.25232;
        //zwrocic jakis wynik
        $wynik = $value * $usdToPln;

        //3. zwracanie danych
//        $out = [
//            'convertedValue' => $wynik,
//            'currency' => $targetCurrency
//        ];

//        return json_encode($out);
        return view('pages.welcome2', [
            'out' => $wynik
        ]);
    }
}