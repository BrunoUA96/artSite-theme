<?php namespace Artsite\SlideShow\Components;

use Cms\Classes\ComponentBase;
use Cms\Classes\Theme;
use Artsite\SlideShow\Models\SlideShow as SlideShowModel;

class SlideShows extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'SlideShows Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [
          'sstheme' => [
            'title'       => 'Theme of this page',
            'type'        => 'dropdown',
            'default'     => '',
            'placeholder' => 'Select Theme',
          ]
        ];
    }

    public function onRun()
    {
        // Get current page BaseFile

        $page = $this->page->baseFileName;

        $currentTheme = $this->property('sstheme');

        // Get Banner with this page
        if($currentTheme)
        {
          $slideshow = SlideShowModel::with(array('slides' => function($query) {
                                          $query->where('is_visible', '=', 1)->
                                                  orderBy('id', 'asc');
                                      }))->
                                      where('theme','like',$currentTheme)->
                                      where('page','like', $page)->
                                      where('is_visible', '=', 1)->
                                      first();
                                      

          $this->page['slideshow'] = $slideshow;      

        }
    }

    public function getSsthemeOptions()
    {
        $themes = Theme::all();
        $options = array();

        foreach ($themes as $theme)
        {
          $options[$theme->getId()] = $theme->getConfigValue('name', $theme->getDirName());
        }

        return $options;
    }
}
