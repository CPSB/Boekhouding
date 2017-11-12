<?php

namespace App\Console\Commands;

use Illuminate\Foundation\Console\RouteListCommand;
use Illuminate\Routing\Route;

/**
 * Class CheckRouteRole
 *
 * @package App\Console\Commands
 */
class CheckRouteRole extends RouteListCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'route:role';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Table of all routes that do not have a role.';

    /**
     * Get the table header.
     *
     * @var array
     */
    protected $headers = ['method', 'uri', 'name', 'controller', 'action', 'middleware'];

    /**
     * {@inheritdoc}
     */
    protected function getRouteInformation(Route $route)
    {
        $actions    = explode('@',$route->getActionName());
        $middleware = implode(',',$route->middleware());

        if(!strpos($middleware, 'role')) {
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
