<?php

namespace App\Services;

use InstagramAPI\Instagram;

/**
 * Created by IntelliJ IDEA.
 * User: leandro.vitto
 * Date: 17/09/2018
 * Time: 15:10
 */
class InstagramLoggingService
{

    protected $user;

    public function setUser($user = null) {
        $this->user = $user;
    }

    public function login($user){
        Instagram::$allowDangerousWebUsageAtMyOwnRisk = true;
        /////// CONFIG ///////
        $username = 'isjeady';
        $password = 'isjeadyqwerty[]{}#';
        $debug = true;
        $truncatedDebug = false;

        $ig = new Instagram($debug, $truncatedDebug);

        try {

            $ig->login($username, $password);


        } catch (\Exception $e) {
            echo 'Something went wrong: '.$e->getMessage()."\n";
            exit(0);
        }

        try {
            $user = $ig->account->getCurrentUser();
            $this->setUser($user);
        } catch (\Exception $e) {
            echo 'Something went wrong: '.$e->getMessage()."\n";
            exit(0);
        }

        //$this->setUser($user);
    }


    public function isLogged(){
        return $this->user;
    }


}
