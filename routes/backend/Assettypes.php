<?php

// Assettypes Management
Route::group(['namespace' => 'Assettypes'], function () {
    
    Route::resource('assettypes', 'AssettypesController');

});
