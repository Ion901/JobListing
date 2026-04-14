<?php

use App\Http\Requests\RegisterUserRequest;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Validator;

it('passes validation with valid data', function () {
    $data = [
        'email' => 'ionerhan13@gmail.com',
        'password' => 'Password123!',
        'password_confirmation' => 'Password123!',
        'name' => 'John Doe',
        'role' => 'user',
        'employer' => 'Company Inc',
        'logo' => UploadedFile::fake()->image('logo.png', 200, 100)->size(1000),
    ];

    $request = new RegisterUserRequest();
    $validator = Validator::make($data, $request->rules());

    expect($validator->passes())->toBeTrue();
});

it('fails validation when email is missing', function () {
    $data = [
        'password' => 'Password123!',
        'password_confirmation' => 'Password123!',
        'name' => 'John Doe',
        'role' => 'user',
        'employer' => 'Company Inc',
        'logo' => UploadedFile::fake()->image('logo.png', 200, 100),
    ];

    $request = new RegisterUserRequest();
    $validator = Validator::make($data, $request->rules());

    expect($validator->fails())->toBeTrue();
    expect($validator->errors()->has('email'))->toBeTrue();
});

it('fails validation when password is not confirmed', function () {
    $data = [
        'email' => 'unique' . time() . '@example.com',
        'password' => 'Password123!',
        'password_confirmation' => 'different',
        'name' => 'John Doe',
        'role' => 'user',
        'employer' => 'Company Inc',
        'logo' => UploadedFile::fake()->image('logo.png', 200, 100),
    ];

    $request = new RegisterUserRequest();
    $validator = Validator::make($data, $request->rules());

    expect($validator->fails())->toBeTrue();
    expect($validator->errors()->has('password'))->toBeTrue();
});

it('fails validation when logo has wrong dimensions', function () {
    $data = [
        'email' => 'unique' . time() . '@example.com',
        'password' => 'Password123!',
        'password_confirmation' => 'Password123!',
        'name' => 'John Doe',
        'role' => 'user',
        'employer' => 'Company Inc',
        'logo' => UploadedFile::fake()->image('logo.png', 100, 50), // Wrong dimensions
    ];

    $request = new RegisterUserRequest();
    $validator = Validator::make($data, $request->rules());

    expect($validator->fails())->toBeTrue();
    expect($validator->errors()->has('logo'))->toBeTrue();
});

it('fails validation when logo has invalid type', function () {
    $data = [
        'email' => 'unique' . time() . '@example.com',
        'password' => 'Password123!',
        'password_confirmation' => 'Password123!',
        'name' => 'John Doe',
        'role' => 'user',
        'employer' => 'Company Inc',
        'logo' => UploadedFile::fake()->create('logo.gif', 1000, 'image/gif'), // Invalid type
    ];

    $request = new RegisterUserRequest();
    $validator = Validator::make($data, $request->rules());

    expect($validator->fails())->toBeTrue();
    expect($validator->errors()->has('logo'))->toBeTrue();
});

it('fails validation when name is missing', function () {
    $data = [
        'email' => 'unique' . time() . '@example.com',
        'password' => 'Password123!',
        'password_confirmation' => 'Password123!',
        'role' => 'user',
        'employer' => 'Company Inc',
        'logo' => UploadedFile::fake()->image('logo.png', 200, 100),
    ];

    $request = new RegisterUserRequest();
    $validator = Validator::make($data, $request->rules());

    expect($validator->fails())->toBeTrue();
    expect($validator->errors()->has('name'))->toBeTrue();
});