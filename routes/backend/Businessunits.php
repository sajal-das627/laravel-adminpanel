<?php

// Businessunits Management
Route::group(['namespace' => 'Businessunits'], function () {
    
    Route::resource('businessunits', 'BusinessunitsController');

    //For DataTables
    //Route::post('clientmanagements/get', 'ClientmanagementsTableController')->name('clientmanagements.get');
});
