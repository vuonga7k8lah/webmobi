<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>SHOP KMA</title>
    <base href="<?php use MyProject\Core\Request;
    use MyProject\Core\URL;

    echo URL::uri(); ?>">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="./assets/semantic-ui/semantic.min.css">
    <link rel="stylesheet" type="text/css" href="./assets/style/css.css"/>
    <link rel="stylesheet" type="text/css" href="./assets/style/cart.css"/>
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script|Itim|Lobster|Montserrat:500|Noto+Serif|Nunito|Patrick+Hand|Roboto+Mono:100,100i,300,300i,400,400i,500,500i,700,700i|Roboto+Slab|Saira"
          rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
          integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.css">
    <?php
    if (in_array(Request::uri()[0], [
        'about',
        'chat'
    ])) {

        if(Request::uri()[0]=='about'){
            echo '<link rel="stylesheet" type="text/css" href="./assets/about.css"/>';
        }else{
            echo ' <link rel="stylesheet" type="text/css" href="./assets/chat.css"/>';
        }
        ?>
            <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
            <?php
    }
    ?>
</head>

<body>

<div class="wrapper"><?php
