<?php

namespace LNCHUK\LaravelExtendedResource;

use Illuminate\Routing\ResourceRegistrar;

class ExtendedResourceRegistrar extends ResourceRegistrar
{
    /**
     * The default actions for a resourceful controller.
     *
     * @var array
     */
    protected $resourceDefaults = [
        'index', 'create', 'store', 'show', 'edit', 'update',
        'delete', 'destroy', 'trashed', 'restore',
    ];

    /**
     * The verbs used in the resource URIs.
     *
     * @var array
     */
    protected static $verbs = [
        'create' => 'create',
        'edit' => 'edit',
        'restore' => 'restore',
        'delete' => 'delete',
    ];

    /**
     * Add the trashed method for a resourceful route.
     *
     * @param string  $name
     * @param string  $base
     * @param string  $controller
     * @param array   $options
     * @return \Illuminate\Routing\Route
     */
    protected function addResourceTrashed($name, $base, $controller, $options)
    {
        $uri = $this->getResourceUri($name) . '/trashed';

        $action = $this->getResourceAction($name, $controller, 'trashed', $options);

        return $this->router->get($uri, $action);
    }

    /**
     * Add the restore method for a resourceful route.
     *
     * @param  string  $name
     * @param  string  $base
     * @param  string  $controller
     * @param  array  $options
     * @return \Illuminate\Routing\Route
     */
    protected function addResourceRestore($name, $base, $controller, $options)
    {
        $name = $this->getShallowName($name, $options);

        $uri = $this->getResourceUri($name).'/{'.$base.'}/'.static::$verbs['restore'];

        $action = $this->getResourceAction($name, $controller, 'restore', $options);

        return $this->router->match(['PUT', 'PATCH'], $uri, $action);
    }

    /**
     * Add the delete method for a resourceful route.
     *
     * @param string  $name
     * @param string  $base
     * @param string  $controller
     * @param array   $options
     * @return \Illuminate\Routing\Route
     */
    protected function addResourceDelete($name, $base, $controller, $options)
    {
        $name = $this->getShallowName($name, $options);

        $uri = $this->getResourceUri($name).'/{'.$base.'}/'.static::$verbs['delete'];

        $action = $this->getResourceAction($name, $controller, 'delete', $options);

        return $this->router->get($uri, $action);
    }
}
