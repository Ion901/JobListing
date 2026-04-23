<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;
use App\Models\Job;

Breadcrumbs::for('/', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('home'));
});

Breadcrumbs::for('jobs', function (BreadcrumbTrail $trail) {
    $trail->parent('/');
    $trail->push('Jobs', route('jobs'));
});

Breadcrumbs::for('job', function (BreadcrumbTrail $trail, Job $job) {
    $trail->parent('jobs');
    $trail->push($job->title, route('job', $job));
});
