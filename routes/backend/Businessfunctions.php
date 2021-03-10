<?php

// Businessfunctions Management
Route::group(['namespace' => 'Businessfunctions'], function () {
    
    Route::resource('businessfunctions', 'BusinessfunctionsController');

});
