<?php namespace Artsite\SlideShow\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateSlidesTable extends Migration
{
    public function up()
    {
        Schema::create('artsite_slideshow_slides', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('slideshow_id');
            $table->string('title')->nullable();
            $table->text('subtitle')->nullable();
            $table->boolean('is_visible')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('artsite_slideshow_slides');
    }
}
