<?php
    session_start();

    $config['base_url']             =   'http://localhost/kisender/teste/linkedin/authentification.php';
    $config['callback_url']         =   'http://localhost/kisender/teste/linkedin/userinfo.php';
    $config['linkedin_access']      =   '77z146pc33jfa0';
    $config['linkedin_secret']      =   '17nj5zLAIA7iL4Lb';

    include_once "linkedin.php";
   
    

    $linkedin = new LinkedIn($config['linkedin_access'], $config['linkedin_secret'], $config['callback_url'] );
    $linkedin->debug = true;

   if (isset($_REQUEST['oauth_verifier'])){
        $_SESSION['oauth_verifier']     = $_REQUEST['oauth_verifier'];

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



    $xml_response = $linkedin->getProfile("~:(id,first-name,last-name,industry,summary,location:(name),public-profile-url,email-address,headline,picture-url)");
    
    echo '<pre>';
    echo 'Profil';
    echo $xml_response;
    echo '<br />';
    echo '</pre>';


    

    