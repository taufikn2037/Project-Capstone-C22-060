<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{

    public function index()
    {
        $headers = [
            "User-Agent: userAgent"
        ];

        // make request
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://newsapi.org/v2/top-headlines?category=health&country=id&apiKey=8642ac8d640f4a3c98046ce6e84b294e");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $data = curl_exec($ch);

        // convert response
        $data = json_decode($data, true);

        // handle error; error output
        if (curl_getinfo($ch, CURLINFO_HTTP_CODE) !== 200) {

            var_dump($data);
        }

        curl_close($ch);

        $this->load->view('v_beranda/index', $data);
    }
}
