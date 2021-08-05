<?php

    Route::prefix('dashboard')->name('dashboard.')->middleware(['auth'])->group(function () {

            Route::get('/', 'WelcomeController@index')->name('welcome');

             //user routes
            Route::resource('users', 'UserController')->except(['show']);

            //stores routes
            Route::resource('stores', 'StoreController')->except(['show']);

            //employees routes
            Route::resource('employees', 'EmployeeController')->except(['show']);
            
            //technicals routes
            Route::resource('technicals', 'TechnicalController')->except(['show','storeTechnicals']);

            //managers routes
            Route::resource('managers', 'ManagerController')->except(['show']);

            //proberties routes
            Route::resource('proberties', 'ProbertyController')->except(['show']); 

            //technicalproberties routes
            Route::resource('technicalproberties', 'TechnicalProbertyController')->except(['show']); 
            
            //managerproberties routes
            Route::resource('managerproberties', 'ManagerProbertyController')->except(['show']);

            //visits routes
            Route::resource('visits', 'VisitController')->except(['show']);

            //visitnumbers routes
            Route::resource('visitnumbers', 'VisitNumberController')->except(['show']);



    });//end of dashboard routes 
    
    Route::get('dashboard/store/{id}/technicals', 'StoreController@technicals' )->name('dashboard.stores.technicals');
    Route::get('dashboard/store/{id}/managers', 'StoreController@managers' )->name('dashboard.stores.managers');
    Route::get('dashboard/store/{id}/visits', 'StoreController@visits')->name('dashboard.stores.visits');
    Route::get('dashboard/store/{store_id}/visit/{visit_id}/technicals', 'VisitController@technicals' )->name('dashboard.visits.technicals');
    Route::get('dashboard/store/{store_id}/visit/{visit_id}/managers', 'VisitController@managers' )->name('dashboard.visits.managers');
    Route::get('dashboard/store/{store_id}/visit/{visit_id}/technical/{technical_id}', 'TechnicalController@probertyTechnicals' )->name('dashboard.technicals.probertytechnicals');
    Route::get('dashboard/store/{store_id}/visit/{visit_id}/manager/{manager_id}', 'ManagerController@probertyManagers' )->name('dashboard.managers.probertymanagers');
    Route::get('dashboard/store/{store_id}/visit/{visit_id}/technicals/results', 'TechnicalController@results' )->name('dashboard.technicals.results');
    Route::get('dashboard/store/{store_id}/visit/{visit_id}/managers/results', 'ManagerController@results' )->name('dashboard.managers.results');

    
    Route::post('dashboard/technicals/marks', 'TechnicalController@marks' )->name('dashboard.technicals.marks');
    Route::post('dashboard/managers/marks', 'ManagerController@marks' )->name('dashboard.managers.marks');

    Route::get('dashboard/technicals/reports', 'TechnicalController@reports' )->name('dashboard.technicals.reports');
    Route::get('dashboard/managers/reports', 'ManagerController@reports' )->name('dashboard.managers.reports');
    Route::post('dashboard/technicals/fetchtechnicals', 'TechnicalController@fetchTechnicals' )->name('dashboard.technicals.fetchtechnicals');
    Route::post('dashboard/managers/fetchmanagers', 'ManagerController@fetchManagers' )->name('dashboard.managers.fetchmanagers');

    Route::get('dashboard/visits/create/{id}', 'VisitController@create' )->name('dashboard.visits.create');
    Route::get('dashboard/visits/create/{id}', 'VisitController@create' )->name('dashboard.visits.create');



   
    // Route::get('dashboard/addvisittechnicalproberty/{id}', 'VisitController@addVisitTechnicalProberty' )->name('dashboard.visits.addvisittechnicalproberty');




