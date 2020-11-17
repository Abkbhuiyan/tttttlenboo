<?php


namespace App\Classes;


class GpFunctions
{
    public static function createToken(){
        $url = "https://apigw.grameenphone.com/oauth/v1/token";
        $client_id = "DkApgOAI7c1KUWolmHokzZmRf427RgzI";
        $client_secret = "zifMYydOONGI2WDn";
        $grand_type = "client_credentials";

        $data = (object) [
            "client_id" => $client_id,
            "client_secret" => $client_secret,
            "grant_type" => $grand_type
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        $headers = array(
            "Accept: application/json",
            "Content-Type: application/x-www-form-urlencoded"
        );
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        $outputs = curl_exec($ch);
        curl_close($ch);
        return json_decode($outputs, true);
    }
    public static function subscriptionDaily($channelId, $id, $description) {
        $channel = (object) [
            "id" => $channelId,
            "name" => "Wap"
        ];
        $requester = (object) ["id" => "1",
            "name" => "validity"];
        $amount = (object) [
            "amount" => "5.0",
            "units" => "BDT"
        ];
        $paymentMethod = (object) [
            "id" => "SUB00051105829204261458",
            "name" => "chargeCode"
        ];
        $product = (object) ["id" => "7970",
            "name" => "leenbo Daily"];
        $relatedParty = (object) [
            "id" => "0",
            "name" => "taxAmount"
        ];
        $thumnailUrl = (object) ["type" => "thumbnailUrl",
            "value" => 'http://leenbobd.com/assets/funzone.png'];
        $successUrl = (object) ["type" => "successUrl",
            "value" => 'http://leenbobd.com/gp_success'];
        $failedUrl = (object) ["type" => "failureUrl",
            "value" => 'http://leenbobd.com/gp_failed'];
        $notifyUrl = (object) ["type" => "notifyUrl",
            "value" => 'http://188.166.246.157/leenboGP/service_notify.php'];
        $cancelUrl = (object) ["type" => "cancelUrl",
            "value" => 'http://leenbobd.com/cancel'];
        $callback = (object) ["callback" => [$thumnailUrl, $successUrl, $failedUrl, $notifyUrl, $cancelUrl]];
        $data = (object) [
            "id" => $id,
            "type" => "Sub",
            "description" => $description,
            "channel" => $channel,
            "requestor" => $requester,
            "amount" => $amount,
            "paymentMethod" => $paymentMethod,
            "product" => $product,
            "relatedParty" => [$relatedParty],
            "notificationRequest" => $callback
        ];

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://apigw.grameenphone.com/subscription/v1/subscribe",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => array(
                "accept-encoding: application/gzip",
                "authorization: Bearer " . session()->get('accessToken'),
                "cache-control: no-cache",
                "content-type: application/json"
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        return json_decode($response, true);
    }
    public static function subscriptionWeekly($channelId,$id, $description) {
        $channel = (object) [
            "id" => $channelId,
            "name" => "Wap"
        ];
        $requestor = (object) ["id" => "1",
            "name" => "validity"];
        $amount = (object) [
            "amount" => "20.0",
            "units" => "BDT"
        ];
        $paymentMethod = (object) [
            "id" => "SUB00051105830204261444",
            "name" => "chargeCode"
        ];
        $product = (object) ["id" => "7985",
            "name" => "leenbo Weekly"];
        $relatedParty = (object) [
            "id" => "0",
            "name" => "taxAmount"
        ];
        $thumnailUrl = (object) ["type" => "thumbnailUrl",
            "value" => 'http://leenbobd.com/assets/funzone.png'];
        $successUrl = (object) ["type" => "successUrl",
            "value" => 'http://leenbobd.com/gp_success'];
        $failedUrl = (object) ["type" => "failureUrl",
            "value" => 'http://leenbobd.com/gp_failed'];
        $notifyUrl = (object) ["type" => "notifyUrl",
            "value" => 'http://188.166.246.157/leenboGP/service_notify.php'];
        $cancelUrl = (object) ["type" => "cancelUrl",
            "value" => 'http://leenbobd.com/cancel'];
        $callback = (object) ["callback" => [$thumnailUrl, $successUrl, $failedUrl, $notifyUrl, $cancelUrl]];
        $data = (object) [
            "id" => $id,
            "type" => "Sub",
            "description" => $description,
            "channel" => $channel,
            "requestor" => $requestor,
            "amount" => $amount,
            "paymentMethod" => $paymentMethod,
            "product" => $product,
            "relatedParty" => [$relatedParty],
            "notificationRequest" => $callback
        ];

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://apigw.grameenphone.com/subscription/v1/subscribe",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => array(
                "accept-encoding: application/gzip",
                "authorization: Bearer " . session()->get('accessToken'),
                "cache-control: no-cache",
                "content-type: application/json"
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        return json_decode($response, true);
    }

    public static function subscriptionMonthly($channelId,$id, $description) {
        $channel = (object) [
            "id" => $channelId,
            "name" => "Wap"
        ];
        $requestor = (object) ["id" => "1",
            "name" => "validity"];
        $amount = (object) [
            "amount" => "41.0",
            "units" => "BDT"
        ];
        $paymentMethod = (object) [
            "id" => "SUB000511058312010151439",
            "name" => "chargeCode"
        ];
        $product = (object) ["id" => "1",
            "name" => "Monthly package"];
        $relatedParty = (object) [
            "id" => "0",
            "name" => "taxAmount"
        ];
        $thumnailUrl = (object) ["type" => "thumbnailUrl",
            "value" => 'http://leenbobd.com/assets/funzone.png'];
        $successUrl = (object) ["type" => "successUrl",
            "value" => 'http://leenbobd.com/gp_success'];
        $failedUrl = (object) ["type" => "failureUrl",
            "value" => 'http://leenbobd.com/gp_failed'];
        $notifyUrl = (object) ["type" => "notifyUrl",
            "value" => 'http://188.166.246.157/leenboGP/service_notify.php'];
        $cancelUrl = (object) ["type" => "cancelUrl",
            "value" => 'http://leenbobd.com/cancel'];
        $callback = (object) ["callback" => [$thumnailUrl, $successUrl, $failedUrl, $notifyUrl, $cancelUrl]];
        $data = (object) [
            "id" => $id,
            "type" => "Sub",
            "description" => $description,
            "channel" => $channel,
            "requestor" => $requestor,
            "amount" => $amount,
            "paymentMethod" => $paymentMethod,
            "product" => $product,
            "relatedParty" => [$relatedParty],
            "notificationRequest" => $callback
        ];

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://apigw.grameenphone.com/subscription/v1/subscribe",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => array(
                "accept-encoding: application/gzip",
                "authorization: Bearer " . session()->get('accessToken'),
                "cache-control: no-cache",
                "content-type: application/json"
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        return json_decode($response, true);
    }
}
