<?php

// Servicestobusiness Management
Route::group(['namespace' => 'Servicestobusiness'], function () {
    
    Route::resource('servicestobusiness', 'ServicestobusinessController');

});
