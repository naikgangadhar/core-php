<?php

const ROUTES = [
    '/'          =>  ['GET' => 'Login@loginPage'],
    ''           =>  ['GET' => 'Login@loginPage'],
    '/about'     =>  ['GET' => 'Home@showAboutPage'],
    '/home'     =>  ['GET' => 'Home@showHomePage', 'POST' => 'Login@loginUser'],
    '/registration' => ['GET' => 'Login@registrationPage', 'POST' => 'Login@registerUser'],
    '/logout'     => ['POST' => 'Login@logout'],
    '/uploadpost' => ['POST' => 'UserController@uploadPost']
];