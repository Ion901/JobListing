<?php
use App\Models\Job;
use App\Models\Employer;

it('belongs to a employer', function () {
    //Arrange(cream mediul de lucru)
    $employer = Employer::factory()->create();
    //Act(actiunea propiu zis)
    $job = Job::factory()->create([
        'employer_id' => $employer->id,
    ]);
    //Assert(ce asteptam sa obtinem)
    expect($job->employer->is($employer))->toBeTrue();
});

it('a job can have tags', function(){
   //Arrange
   $job = Job::factory()->create();
   //Act
   $job->tag('FrontEnd');
   //assert

   expect($job->tags)->toHaveCount(1);
});
