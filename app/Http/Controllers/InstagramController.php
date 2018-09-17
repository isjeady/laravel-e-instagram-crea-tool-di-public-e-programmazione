<?php

namespace App\Http\Controllers;

use App\Services\InstagramLoggingService;
use Illuminate\Http\Request;

class InstagramController extends Controller
{
    //
    protected $service;
    /**
     * InstagramController constructor.
     */
    public function __construct(InstagramLoggingService $service){
        $this->service = $service;

    }

    public function login(){
        $this->service->login('');
        $user = json_decode($this->service->isLogged(), true);
        logger("InstagramLoggingService: isLogged : " . \GuzzleHttp\json_encode($user));

        return view('welcome' , compact('user'));
    }


    public function afterLogin(){
        $var = $this->service->isLogged();

        logger("Instagramservice: service : " . \GuzzleHttp\json_encode($var));
        return view('welcome');
    }





}
