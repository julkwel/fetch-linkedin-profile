<?php
    session_start();

    $config['base_url']             =   'http://localhost/kisender/teste/linkedin/authentification.php';
    $config['callback_url']         =   'http://localhost/kisender/teste/linkedin/userinfo.php';
    $config['linkedin_access']      =   '77z146pc33jfa0';
    $config['linkedin_secret']      =   '17nj5zLAIA7iL4Lb';

    include_once "linkedin.php";


    $linkedin = new LinkedIn($config['linkedin_access'], $config['linkedin_secret'], $config['callback_url'] );
    $linkedin->debug = true;


    $linkedin->getRequestToken();
    $_SESSION['requestToken'] = serialize($linkedin->request_token);

    
    header("Location: " . $linkedin->generateAuthorizeUrl());
?>
