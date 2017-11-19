<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Core\Plugin;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

/**
 * The default class to use for all routes
 *
 * The following route classes are supplied with CakePHP and are appropriate
 * to set as the default:
 *
 * - Route
 * - InflectedRoute
 * - DashedRoute
 *
 * If no call is made to `Router::defaultRouteClass()`, the class used is
 * `Route` (`Cake\Routing\Route\Route`)
 *
 * Note that `Route` does not do any inflections on URLs which will result in
 * inconsistently cased URLs when used with `:plugin`, `:controller` and
 * `:action` markers.
 *
 */
Router::defaultRouteClass(DashedRoute::class);

Router::extensions(['json','xml','pdf']);

Router::scope('/', function (RouteBuilder $routes) {
    $routes->connect('/', ['controller' => 'Home', 'action' => 'index']);
    $routes->connect('/home/quote', ['controller' => 'Home', 'action' => 'quote']);
    $routes->connect('/home/solution', ['controller' => 'Home', 'action' => 'solution']);
    $routes->connect('/home/workshop', ['controller' => 'Home', 'action' => 'workshop']);
    $routes->connect('/home/bannerState', ['controller' => 'Home', 'action' => 'bannerState']);
});

Router::scope('/newsletter', function (RouteBuilder $routes) {
    $routes->connect('/subscribe', ['controller' => 'Newsletter', 'action' => 'subscribe']);
    $routes->connect('/unsubscribe/:token',['controller'=>'Newsletter', 'action'=>'unsubscribe']);
});

Router::scope('/zine', function(RouteBuilder $routes){
	$routes->connect('/read/:type_booklet/:booklet_path',['controller'=>'Zine','action'=>'read']);
});

Router::scope('/webhooks', function(RouteBuilder $routes){
	$routes->connect('/',['controller'=>'Webhooks','action'=>'index']);
	$routes->connect('/facebook',['controller'=>'Webhooks','action'=>'facebook']);
});

Router::scope('/message', function(RouteBuilder $routes){
    $routes->connect('/send',['controller'=>'Message','action'=>'send']);
});

Router::scope('/privacy', function(RouteBuilder $routes){
    $routes->connect('/',['controller'=>'Privacy','action'=>'index']);
});

/**
 * Load all plugin routes. See the Plugin documentation on
 * how to customize the loading of plugin routes.
 */
Plugin::routes();
