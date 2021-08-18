<?php

const ROUTES = [
    '/'          =>  ['GET' => 'Login@loginPage'],
    ''           =>  ['GET' => 'Login@loginPage'],
    '/about'     =>  ['GET' => 'Home@showAboutPage'],
    '/home'     =>  ['GET' => 'Home@showHomePage', 'POST' => 'Login@loginUser']
];
//header("Location: /about");