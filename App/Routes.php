<?php

$route->get('/', function() {
    view('index');
});

$route->get('language/{$language}', function($language) {
    language($language);
    redirect(previousUrl());
});

$route->get('loadgrid/{$offset}/{$number}', 'Post@grid');

$route->resource('comment', 'Comment');

$route->group('post', function($route) {
    $route->get('translate/{$id}', 'Post@translate');
    $route->post('translate/{$id}', 'Post@storeTranslate');
    $route->get('delete/{$id}', 'Post@delete');
    $route->resource('/', 'Post');
});

$route->group('user', function($route) {
    $route->post('login', 'User@login');
    $route->get('disconnect','User@disconnect');
    $route->get('block/{$id}', 'User@block');
    $route->get('unblock/{$id}', 'User@unBlock');
    $route->get('delete/{$id}', 'User@delete');
    $route->resource('/', 'User');
});

$route->group('admin', function($route) {
    $route->get('/', 'Admin@index');
    $route->get('posts/', 'Admin@postsList');
    $route->get('users', 'Admin@usersList');
    $route->get('configuration', 'Admin@showConfiguration');
    $route->post('configuration', 'Admin@updateConfiguration');
    $route->get('statistics', 'Admin@statistics');
});
