<?php

require_once "router.php";

// ##################################################
// ##################################################
// ##################################################

// Main
get('/', 'views/index.php');
get('/index', 'views/index.php');

get('/other', 'views/other.php');

// Account
get('/login', 'views/login.php');
get('/signup', 'views/signup.php');
get('/logout', 'views/logout.php');
get('/profile', 'views/profile.php');
get('/profile/$id', 'views/profile.php');

// Admin
get('/admin', 'views/admin/index.php');
get('/admin/menu', 'views/admin/menu.php');
get('/admin/update', 'views/admin/update.php');

// Custom (WIP)

// API
// post('/api/account/$action', 'api/account.php');
post('/api/account/action/$action/username/$username/password/$password', 'api/account.php');
post('/api/account/action/$action/username/$username/password/$password/password2/$password2', 'api/account.php');

post('/api/admin/$action/$mode', 'api/admin.php');

// Assets
get("/instantclick", "views/assets/instantclick.php");

any('/404', 'views/404.php');
