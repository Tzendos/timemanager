<?php

Route::group([
    'prefix' => config('backpack.base.route_prefix', 'admin'),
    'middleware' => ['web', config('backpack.base.middleware_key', 'admin')],
    'namespace' => 'App\Http\Controllers\Admin',
], static function () { // custom admin routes
    Route::crud('users', 'UserCrudController');
    Route::crud('employee', 'EmployeeController');
    Route::crud('report', 'ReportController');
}); // this should be the absolute last line of this file
