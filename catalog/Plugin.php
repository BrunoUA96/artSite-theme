<?php namespace Artsite\Catalog;

use Backend;
use System\Classes\PluginBase;

/**
 * catalog Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'catalog',
            'description' => 'No description provided yet...',
            'author'      => 'artsite',
            'icon'        => 'icon-leaf'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {

    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {

        return [
            'Artsite\Catalog\Components\Products' => 'catalog',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'artsite.catalog.some_permission' => [
                'tab' => 'catalog',
                'label' => 'Some permission'
            ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {

        return [
            'catalog' => [
                'label'       => 'Catálogo',
                'url'         => Backend::url('artsite/catalog/products'),
                'icon'        => 'icon-book',
                'order'       => 500,
                'sideMenu' => [
                    'products' => [
                        'label'       => 'Produtos',
                        'icon'        => 'icon-list',
                        'url'         => \Backend::url('artsite/catalog/products'),
                    ],           
                ]
            ],
        ];
    }
}
