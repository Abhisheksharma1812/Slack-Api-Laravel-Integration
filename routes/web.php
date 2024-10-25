I make these routes in web file for authenticate user and getting token for adding app in employee workplace.
 
Route::get('/authenticate', [MessageController::class, 'userAuthenticate']);
Route::get('/slack-callback', [MessageController::class, 'handleSlackCallback']);
