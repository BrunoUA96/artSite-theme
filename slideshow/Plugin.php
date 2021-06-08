<?php namespace Artsite\SlideShow;

use Backend;
use System\Classes\PluginBase;

/**
 * SlideShow Plugin Information File
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
            'name'        => 'SlideShow',
            'description' => 'No description provided yet...',
            'author'      => 'Artsite',
            'icon'        => 'icon-picture-o'
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
            'Artsite\SlideShow\Components\SlideShows' => 'slideshows'

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
            'artsite.slideshow.some_permission' => [
                'tab' => 'SlideShow',
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
            'slideshow' => [
                'label'       => 'Banner',
                'url'         => Backend::url('artsite/slideshow/slideshows'),
                'icon'        => 'icon-picture-o',
                'permissions' => ['artsite.slideshow.*'],
                'order'       => 500,

                'sideMenu' => [
                    'slideshows' => [
                        'label' => 'Banners',
                        'icon'  => 'icon-picture-o',
                        'url'   => Backend::url('artsite/slideshow/slideshows'),
                        'permissions' => ['artsite.slideshow.*'],
                    ],
                ]
            ],
        ];
    }
}
