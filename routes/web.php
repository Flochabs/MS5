<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get( '/', function () {
    return view( 'homepage' );
} );


// Routes concernant l'affichage des joueurs NBA en liste (index) et individuels (show)
Route::prefix( 'nba' )
//    ->middleware( 'auth' )
    ->name( 'nba.' )
    ->group( function () {
        Route::resource( '/', 'PlayerController' );
    } );



// Routes concernant l'affichage des ligues en liste (index) et individuelles (show)
Route::prefix( 'leagues' )
    ->middleware( 'auth' )
    ->name( 'leagues.' )
    ->group( function () {
        Route::resource( '/', 'LeagueController' );
        Route::get('public', 'LeagueController@publicLeagues')->name('public');
        Route::post('joinPrivateLeague', 'LeagueController@joinPrivateLeague')->name('joinPrivateLeague');
    } );

// Routes concernant l'affichage de la draft

Route::prefix( 'draft' )
    ->middleware( 'auth' )
    ->name( 'draft.' )
    ->group( function () {
        Route::get('auction/{id}', 'DraftController@auction')->name('auction');
        Route::resource( '/', 'DraftController' );
    } );









//Route de développement du SASS (à supprimer)
Route::get( '/devsass', function () {
    return view( 'devsass' );
} );

