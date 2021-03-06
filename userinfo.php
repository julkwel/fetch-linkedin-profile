<?php
    session_start();

    $config['base_url']             =   'base_url';
    $config['callback_url']         =   'callback_url';
    $config['linkedin_access']      =   'client_id';
    $config['linkedin_secret']      =   'client_secret';
    //$config['scope']                =   'r_fullprofile';

    include_once "linkedin.php";
   
    

    $linkedin = new LinkedIn($config['linkedin_access'] , $config['linkedin_secret'], $config['callback_url'] );
    //$linkedin->debug = true;

   if (isset($_REQUEST['oauth_verifier'])){
        $_SESSION['oauth_verifier']  = $_REQUEST['oauth_verifier'];

        $linkedin->request_token    =   unserialize($_SESSION['requestToken']);
        $linkedin->oauth_verifier   =   $_SESSION['oauth_verifier'];
        $linkedin->getAccessToken($_REQUEST['oauth_verifier']);

        $_SESSION['oauth_access_token'] = serialize($linkedin->access_token);
        header("Location: " . $config['callback_url']);
        exit;
   }
   else{
        $linkedin->request_token    =   unserialize($_SESSION['requestToken']);
        $linkedin->oauth_verifier   =   $_SESSION['oauth_verifier'];
        $linkedin->access_token     =   unserialize($_SESSION['oauth_access_token']);
   }



    $xml_response = $linkedin->getProfile("~:(id,first-name,interests,last-name,industry,summary,location:(name),public-profile-url,email-address,headline,picture-url,positions,current-share,specialties)");
    $xml_response = str_replace(array("\n","\r","\t"), '', $xml_response);
    $xml_response = trim(str_replace('"', "'", $xml_response));
    $simplexml = simplexml_load_string($xml_response);
    $json = json_encode($simplexml);
    echo $json;
    echo "<br>";
    var_dump( json_decode($json));
    
    