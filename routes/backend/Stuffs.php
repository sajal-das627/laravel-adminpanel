<?php

// Stuffs Management
Route::group(['namespace' => 'Stuffs'], function () {
    
    Route::resource('stuffs', 'StuffsController');
});
