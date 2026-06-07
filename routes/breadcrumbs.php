<?php

use App\Models\Employer;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;
use App\Models\Job;
use App\Models\Tag;

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

Breadcrumbs::for('applications', function (BreadcrumbTrail $trail) {
    $trail->parent('/');
    $trail->push('My applications', route('applications'));
});

Breadcrumbs::for('tags', function (BreadcrumbTrail $trail) {
    $trail->parent('jobs');
    $trail->push('Tags', route('tags'));
});

Breadcrumbs::for('tags.show', function (BreadcrumbTrail $trail, Tag $tag) {
    $trail->parent('tags');
    $trail->push($tag->name, route('tags.show',$tag));
});

Breadcrumbs::for('companies', function (BreadcrumbTrail $trail) {
    $trail->parent('jobs');
    $trail->push('Companies', route('company'));
});

Breadcrumbs::for('career', function (BreadcrumbTrail $trail) {
    $trail->parent('/');
    $trail->push('Career', route('career'));
});

Breadcrumbs::for('salaries', function (BreadcrumbTrail $trail) {
    $trail->parent('jobs');
    $trail->push('Salaries', route('salaries'));
});

Breadcrumbs::for('companies.show', function (BreadcrumbTrail $trail, Employer $employer) {
    $trail->parent('companies');
    $trail->push($employer->company_name, route('company.show',$employer->company_name));
});

Breadcrumbs::for('studies', function (BreadcrumbTrail $trail) {
    $trail->parent('jobs');
    $trail->push('Studies', route('studies'));
});
