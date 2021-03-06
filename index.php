<?php
if(file_exists('vendor/autoload.php')){
	require 'vendor/autoload.php';
} else {
	echo "<h1>Please install via composer.json</h1>";
	echo "<p>Install Composer instructions: <a href='https://getcomposer.org/doc/00-intro.md#globally'>https://getcomposer.org/doc/00-intro.md#globally</a></p>";
	echo "<p>Once composer is installed navigate to the working directory in your terminal/command promt and enter 'composer install'</p>";
	exit;
}

if (!is_readable('app/core/config.php')) {
	die('No config.php found, configure and rename config.example.php to config.php in app/core.');
}

/*
 *---------------------------------------------------------------
 * APPLICATION ENVIRONMENT
 *---------------------------------------------------------------
 *
 * You can load different configurations depending on your
 * current environment. Setting the environment also influences
 * things like logging and error reporting.
 *
 * This can be set to anything, but default usage is:
 *
 *     development
 *     production
 *
 * NOTE: If you change these, also change the error_reporting() code below
 *
 */
	define('ENVIRONMENT', 'development');
/*
 *---------------------------------------------------------------
 * ERROR REPORTING
 *---------------------------------------------------------------
 *
 * Different environments will require different levels of error reporting.
 * By default development will show errors but production will hide them.
 */

if (defined('ENVIRONMENT')){

	switch (ENVIRONMENT){
		case 'development':
			error_reporting(E_ALL);
		break;

		case 'production':
			error_reporting(0);
		break;

		default:
			exit('The application environment is not set correctly.');
	}

}

//initiate config
new \core\config();

//create alias for Router
use \core\router,
    \helpers\url;

//define routes
Router::any('warning', '\controllers\pages@warning');
Router::any('stats/transactions/(:any)/(:any)', '\controllers\blockexplorer@stats_transactions');
Router::any('stats', '\controllers\blockexplorer@stats');
Router::any('richlist', '\controllers\pages@richlist');
Router::any('browser/blocks/(:any)', '\controllers\browser@blocks');
Router::any('browser/blocks/', '\controllers\browser@index');
Router::any('api/get_transaction_data', '\controllers\api@get_transaction_data');
Router::any('api/get_block_data', '\controllers\api@get_block_data');
Router::any('api/get_block_header', '\controllers\api@get_block_header');
Router::any('api/get_stats', '\controllers\api@get_stats');
Router::any('api/', '\controllers\api@index');
Router::any('search/(:any)', '\controllers\blockexplorer@search');
Router::any('block/(:any)', '\controllers\blockexplorer@openblock');
Router::any('tx/(:any)', '\controllers\blockexplorer@opentransaction');
Router::any('testing', '\controllers\blockexplorer@testing');
Router::any('', '\controllers\blockexplorer@index');

//Router::error('\controllers\pages@maintenance');

//if no route found
Router::error('\core\error@index');

//turn on old style routing
Router::$fallback = true;

//execute matched routes
Router::dispatch();
