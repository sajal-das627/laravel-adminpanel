<?php

// Clientmanagements Management
Route::group(['namespace' => 'Clientmanagements'], function () {
    
    Route::resource('clientmanagements', 'ClientmanagementsController');

    //For DataTables
    Route::post('clientmanagements/get', 'ClientmanagementsTableController')->name('clientmanagements.get');
});
