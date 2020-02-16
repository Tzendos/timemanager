<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', static function (Request $request) {
    return $request->user();
});

Route::post(config('telegram.bot_token'), static function () {
    $api = \app('telegram');
    Log::info('Receive message');
    $api->commandsHandler(true);
});

Route::post(config('telegram.bot_token') . '/webhook', static function () {
    $updates = Telegram::getWebhookUpdates();
    Log::info('Receive updates');
    Log::error(json_encode($updates));
    Telegram::commandsHandler(true);
    return 'ok';
});
