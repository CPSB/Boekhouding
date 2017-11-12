<?php

namespace App\Console\Commands;

use Illuminate\Foundation\Console\RouteListCommand;
use Illuminate\Routing\Route;

/**
 * Class CheckRoutePermission
 *
 * @package App\Console\Commands
 */
class CheckRoutePermission extends RouteListCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'route:permission';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Table of all routes that do not have a permission.';

    /**
     * Get the table headers.
     *
     * @var array
     */
    protected $header = ['method', 'uri', 'name', 'controller', 'action', 'middleware'];

    /**
     * @param Route $route
     * @return array|null
     */
    protected function getRouteInformation(Route $route)
    {
        $actions = explode('@',$route->getActionName());
        $middleware = implode(',',$route->middleware());

        if(!strpos($middleware, 'permission')) {
            return $this->filterRoute([
                'method'     => implode('|', $route->methods()),
                'uri'        => $route->uri(),
                'name'       => is_string($route->getName()) ? "<fg=green>{$route->getName()}</>" : "-",
                'controller' => isset($actions[0]) ? "<fg=cyan>{$actions[0]}</>" : "-",
                'action'     => isset($actions[1]) ? "<fg=red>{$actions[1]}</>" : "-",
                'middleware' => $middleware
            ]);
         }
    }
}
