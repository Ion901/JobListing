<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('/', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('home'));
});

Breadcrumbs::for('jobs', function (BreadcrumbTrail $trail) {
    $trail->parent('/');
    $trail->push('Jobs', route('jobs'));
});
