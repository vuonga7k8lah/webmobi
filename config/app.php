<?php

return [
    'homeURL'    => 'http://127.0.0.1/webmobi/',
    'baseURI'    => '/webmobi/',
    'navigation' => [
        'home'     => [
            'name' => 'Home',
            'route' => 'home'
        ],
        'register' => [
            'name'        => 'Register',
            'route' => 'register',
            'conditional' => '!isUserLoggedIn'
        ],
        'login'    => [
            'name'        => 'Login',
            'route' => 'login',
            'conditional' => '!isUserLoggedIn'
        ],
        'about'    => [
            'name'        => 'About',
            'route' => 'about',
            'conditional' => '!isUserLoggedIn'
        ],
        'contact'  => [
            'name'        => 'Contact',
            'route' => 'contact',
            'conditional' => '!isUserLoggedIn'
        ],
        'logout'  => [
            'name'        => 'Logout',
            'route' => 'logout',
            'conditional' => 'isUserLoggedIn']
    ],
    'database'   => [
        'host'     => 'localhost',
        'username' => 'root',
        'password' => '',
        'database' => 'dataWeb'
    ]
];
