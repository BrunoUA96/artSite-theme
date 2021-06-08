<?php namespace Artsite\SlideShow\Models;

use Model;
use Cms\Classes\Theme;
use Cms\Classes\Page;

/**
 * slideshow Model
 */
class SlideShow extends Model
{
    /**
     * @var string The database table used by the model.
     */
    public $table = 'artsite_slideshow_slideshows';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    /**
     * @var array Relations
     */
    public $implement = [];

    public $translatable = [
        'title'
    ];

    public $hasMany = [
        'slides' => ['Artsite\SlideShow\Models\Slide','key'=>'slideshow_id']
    ];

    public $attachOne = [
        'logo' => 'System\Models\File'
    ];

    public function getThemeOptions()
    {
        $themes = Theme::all();
        $options = array();

        foreach ($themes as $theme)
        {
          $options[$theme->getId()] = $theme->getConfigValue('name', $theme->getDirName());
        }

        return $options;
    }

    public function getPageOptions($value, $data)
    {
        $options = array();

        if(isset($data->theme))
        {
          $currentTheme = Theme::load($data->theme);

          if($currentTheme)
          {
            $pages = Page::listInTheme($currentTheme, true);

            foreach ($pages as $page) {
                $options[$page->baseFileName] = $page->title.' ('.$page->url.')';
            }
          }
        }
        return $options;
    }
}
