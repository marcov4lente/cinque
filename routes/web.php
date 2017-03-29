<?php

Auth::routes();

Route::group(['middleware' => ['auth', 'ForceSSL']], function () {

    Route::get('/', 'HomeController@index');

    //  Clients
    Route::get('/clients', 'ClientController@list')
        ->name('view-clients')
        ->middleware('AccessControl:view-client');

    Route::any('/clients/create', 'ClientController@create')
        ->name('create-client')
        ->middleware('AccessControl:create-client');

    Route::get('/clients/{id}', 'ClientController@view')
        ->name('view-client')
        ->middleware('AccessControl:view-client');

    Route::any('/clients/{id}/update', 'ClientController@update')
        ->name('update-client')
        ->middleware('AccessControl:update-client');

    Route::get('/clients/{id}/delete', 'ClientController@delete')
        ->name('delete-client')
        ->middleware('AccessControl:delete-client');


    // Quotes
    Route::get('/quotes', 'QuoteController@list')
        ->name('view-quotes')
        ->middleware('AccessControl:view-quote');

    Route::any('/quotes/create', 'QuoteController@create')
        ->name('create-quote')
        ->middleware('AccessControl:create-quote');

    Route::get('/quotes/{id}', 'QuoteController@view')
        ->name('view-quote')
        ->middleware('AccessControl:view-quote');

    Route::any('/quotes/{id}/update', 'QuoteController@update')
        ->name('update-quote')
        ->middleware('AccessControl:update-quote');

    Route::get('/quotes/{id}/delete', 'QuoteController@delete')
        ->name('delete-quote')
        ->middleware('AccessControl:delete-quote');


    // Invoices
    Route::get('/invoices', 'InvoiceController@list')
        ->name('view-invoices')
        ->middleware('AccessControl:view-invoice');

    Route::any('/invoices/create', 'InvoiceController@create')
        ->name('create-invoice')
        ->middleware('AccessControl:create-invoice');

    Route::get('/invoices/{id}', 'InvoiceController@view')
        ->name('view-invoice')
        ->middleware('AccessControl:view-invoice');

    Route::any('/invoices/{id}/update', 'InvoiceController@update')
        ->name('update-invoice')
        ->middleware('AccessControl:update-invoice');

    Route::get('/invoices/{id}/delete', 'InvoiceController@delete')
        ->name('delete-invoice')
        ->middleware('AccessControl:delete-invoice');


    // Transactions
    Route::get('/transactions', 'TransactionController@list')
        ->name('view-transactions')
        ->middleware('AccessControl:view-transaction');

    Route::any('/transactions/create', 'TransactionController@create')
        ->name('create-transaction')
        ->middleware('AccessControl:create-transaction');

    Route::get('/transactions/{id}', 'TransactionController@view')
        ->name('view-transaction')
        ->middleware('AccessControl:view-transaction');

    Route::any('/transactions/{id}/update', 'TransactionController@update')
        ->name('update-transaction')
        ->middleware('AccessControl:update-transaction');

    Route::get('/transactions/{id}/delete', 'TransactionController@delete')
        ->name('delete-transaction')
        ->middleware('AccessControl:delete-transaction');
});
