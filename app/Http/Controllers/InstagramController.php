<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InstagramController extends Controller
{
    //
    public function index(){

        \InstagramAPI\Instagram::$allowDangerousWebUsageAtMyOwnRisk = true;

        /////// CONFIG ///////
        $username = env('INSTAGRAM_USERNAME');
        $password = env('INSTAGRAM_PASSWORD');
        $debug = false;
        $truncatedDebug = false;
        //////////////////////

        /////// MEDIA ////////
        $file_path = 'upload_instagram/1.jpg';
        $captionText = 'Isjeady Channel - #primopostautomatizzato #api';
        //////////////////////

        $response = "- ";
        
        $ig = new \InstagramAPI\Instagram($debug, $truncatedDebug);
        try {
            $ig->login($username, $password);
            $response .= " Login Effettuata con successo \n";
        } catch (\Exception $e) {
            echo 'Something went wrong: '.$e->getMessage()."\n";
            exit(0);
        }

        $metadata = [];
        $metadata['caption'] = $captionText;

        try{

            $photo = new \InstagramAPI\Media\Photo\InstagramPhoto($file_path);
            
            $response .= $ig->timeline->uploadPhoto($photo->getFile(), $metadata);

        } catch (\Exception $e) {
            echo 'Something went wrong: '.$e->getMessage()."\n";
        }
        
        //dd($password);

        return view('welcome', compact('response'));

    }

}
