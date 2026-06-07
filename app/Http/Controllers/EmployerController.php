<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employer;


class EmployerController extends Controller
{
    public function view(Employer $employer)
    {
        $employer->load(['photos','job', 'description']); //injecteaza pe modelul primit
        return view('company.show',compact('employer'));
    }
}
