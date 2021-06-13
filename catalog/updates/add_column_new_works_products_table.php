<?php namespace Artsite\Catalog\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class AddColumnOrder extends Migration
{
    public function up()
    {
        Schema::table('artsite_catalog_products', function (Blueprint $table) {
            $table->boolean('new_work')->default(0);
        });
    }

    public function down()
    {
      Schema::table('artsite_catalog_products', function ($table) {
            $table->dropColumn('new_work');
        });
    }
}
