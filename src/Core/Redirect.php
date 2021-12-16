<?php


namespace MyProject\Core;


class Redirect
{
    public static function to($url)
    {
     header('location:'.URL::uri($url));
     exit();
    }
}