<?php
    session_start();

    $config['base_url']             =   'your base Url';
    $config['callback_url']         =   'callback url';
    $config['linkedin_access']      =   'linkedin_access';
    $config['linkedin_secret']      =   'linkedin_secret_key';

    include_once "linkedin.php";


    $linkedin = new LinkedIn($config['linkedin_access'], $config['linkedin_secret'], $config['callback_url'] );
    $linkedin->debug = true;


    $linkedin->getRequestToken();
    $_SESSION['requestToken'] = serialize($linkedin->request_token);

    
    header("Location: " . $linkedin->generateAuthorizeUrl());
?>
