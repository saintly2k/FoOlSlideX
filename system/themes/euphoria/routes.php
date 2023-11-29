<?php

$customRoutes = [
    // Main
    ["get", "/", "views/index.php"],
    ["get", "/index", "views/index.php"],
    ["get", "/other", "views/other"],

    // Projects
    ["get", "/projects", "views/projects.php"],
    ["get", '/projects/$page', "views/projects"],

    // Publisher
    ["get", '/publisher/title/$action', "views/publisher/title.php"],
    ["get", '/publisher/title/$action/$id', "views/publisher/title.php"],
    ["get", '/publisher/chapter/$action', "views/publisher/chapter.php"],
    ["get", '/publisher/chapter/$action/$id', "views/publisher/chapter.php"],

    ["get", '/publisher/validate_custom', "views/publisher/validate_custom.php"],
    ["get", '/publisher/validate_custom/$page/$action', "views/publisher/validate_custom.php"],
    ["get", '/publisher/validate_custom/$page/$action/$id', "views/publisher/validate_custom.php"],

    // Account
    ["get", '/login', "views/login.php"],
    ["get", '/signup', "views/signup.php"],
    ["get", "/logout", "views/logout.php"],
    ["get", "/profile", "views/profile.php"],
    ["get", '/profile/$id', "views/profile.php"],

    // Admin
    ["get", "/admin", "views/admin/index.php"],
    ["get", "/admin/users", "views/admin/users.php"],
    ["get", "/admin/menu", "views/admin/menu.php"],
    ["get", "/admin/update", "views/admin/update.php"],

    // API
    ["post", '/api/account/$action', "api/account.php"],
    ["post", '/api/admin/$action/$mode', "api/admin.php"],
    ["post", '/api/assets/$action', "api/assets.php"],
    ["post", '/api/publisher/$action/$mode', "api/publisher.php"],

    ["get", '/api/image/$file/$type', "api/image.php"],
    ["get", '/api/tags', "api/tags.php"],
    ["get", '/api/tags/$tags', "api/tags.php"],
    ["get", '/api/titles/$page', "api/titles.php"],

    // Assets
    ["get", "/instantclick", "views/assets/instantclick.php"],
    ["any", "/font", "views/assets/font.php"],

    // Any?
    ["any", "/404", "views/404.php"],
];

// TEMP!!!
post('/api/account/action/$action/username/$username/password/$password', $roudir . 'api/account.php');
post('/api/account/action/$action/username/$username/password/$password/password2/$password2', $roudir . 'api/account.php');
