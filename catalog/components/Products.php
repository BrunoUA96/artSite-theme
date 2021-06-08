<?php namespace Artsite\Catalog\Components;
use Artsite\Catalog\Models\Product as ProductModel;

use Cms\Classes\ComponentBase;

class Products extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'Products Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }
    public function getProducts()
    {
        return ProductModel::orderBy('id', 'desc')->get();
    }

    public function onRun()
    {
        // $this->page['categories'] = CategoryModel::with('subcategories')->where('is_subcategory', 0)->get(); 
        //$this->page['categories'] = CategoryModel::with('subcategories')->get();

        if($this->property('id')) {
            $this->page['product'] = ProductModel::find($this->property('id'));
        } else {
            //$this->page['products'] = ProductModel::orderBy('order')->get();
        }

        // if($this->property('category')) {

        //     $category_slug = $this->property('category');

        //      $teste = $this->page['products'] = ProductModel::whereHas('categories', function($query) use($category_slug) {
        //          $query->where('slug', 'like', $category_slug);
        //      })->get();
        // }
    }
}
