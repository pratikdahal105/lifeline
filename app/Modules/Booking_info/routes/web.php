<?php



Route::group(array('prefix'=>'admin/','module'=>'Booking_info','middleware' => ['web','auth', 'can:booking_infos'], 'namespace' => 'App\Modules\Booking_info\Controllers'), function() {
    //Your routes belong to this module.
    Route::get('booking_infos/','AdminBooking_infoController@index')->name('admin.booking_infos');
    Route::post('booking_infos/getbooking_infosJson','AdminBooking_infoController@getbooking_infosJson')->name('admin.booking_infos.getdatajson');
    Route::get('booking_infos/create','AdminBooking_infoController@create')->name('admin.booking_infos.create');
    Route::post('booking_infos/store','AdminBooking_infoController@store')->name('admin.booking_infos.store');
    Route::get('booking_infos/show/{id}','AdminBooking_infoController@show')->name('admin.booking_infos.show');
    Route::get('booking_infos/edit/{id}','AdminBooking_infoController@edit')->name('admin.booking_infos.edit');
    Route::match(['put', 'patch'], 'booking_infos/update','AdminBooking_infoController@update')->name('admin.booking_infos.update');
    Route::get('booking_infos/delete/{id}', 'AdminBooking_infoController@destroy')->name('admin.booking_infos.delete');
});




Route::group(array('module'=>'Booking_info','namespace' => 'App\Modules\Booking_info\Controllers'), function() {
    //Your routes belong to this module.
    Route::get('booking_infos/','Booking_infoController@index')->name('booking_infos');

});
