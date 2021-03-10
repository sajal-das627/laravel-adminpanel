<?php

// Services
Route::group(['namespace' => 'Services'], function () {
    
    Route::resource('services', 'ServicesController');

 
});
