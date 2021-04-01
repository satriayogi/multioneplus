<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class ongkir {
    function api_ongkirpost($option,$qty)
    {
         $curl = curl_init();
       curl_setopt_array($curl, array(
       CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
       CURLOPT_RETURNTRANSFER => true,
       CURLOPT_ENCODING => "",
       CURLOPT_MAXREDIRS => 10,
       CURLOPT_TIMEOUT => 30,
       CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
       CURLOPT_CUSTOMREQUEST => "POST",
       CURLOPT_POSTFIELDS => "origin=457&destination=$option&weight=$qty&courier=jne",
       CURLOPT_HTTPHEADER => array(
         "content-type: application/x-www-form-urlencoded",
         /* masukan api key disini*/
         "key: a34c89cf91140fab2489668a80515a9e"
           ),
         ));
         $response = curl_exec($curl);
         $err = curl_error($curl);
         curl_close($curl);
         if ($err) {
           return $err;
         } else {
           return $response;
         }
    }
    function api_ongkir($data)
    {
            $curl = curl_init();
         curl_setopt_array($curl, array(
           //CURLOPT_URL => "https://api.rajaongkir.com/starter/province?id=12",
           //CURLOPT_URL => "http://api.rajaongkir.com/starter/province",
           CURLOPT_URL => "http://api.rajaongkir.com/starter/".$data,
           CURLOPT_RETURNTRANSFER => true,
           CURLOPT_ENCODING => "",
           CURLOPT_MAXREDIRS => 10,
           CURLOPT_TIMEOUT => 30,
           CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
           CURLOPT_CUSTOMREQUEST => "GET",		  
           CURLOPT_HTTPHEADER => array(
               /* masukan api key disini*/
             "key: a34c89cf91140fab2489668a80515a9e"
           ),
         ));
         $response = curl_exec($curl);
         $err = curl_error($curl);
         curl_close($curl);
         if ($err) {
           return  $err;
         } else {
           return $response;
         }
    }
}


?>