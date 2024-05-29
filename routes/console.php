<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('app:compile-custom-scss', function () {
    $this->info('Compiling custom style...');
    $result = shell_exec('./vendor/bin/pscss resources/scss/custom.scss public/vendor/bootstrap/custom.css');
    if (!isset($result)) {
        $this->info('Custom style compiled successfully.');
        $this->info($result);
    } else {
        $this->error('Failed to compile custom style.');
        $this->comment('Please make sure you have installed the required dependencies.');
        $this->comment('You can install the dependencies by running the following command:');
        $this->info('composer require scssphp/scssphp');
    }
})->purpose('Compile custom style');
