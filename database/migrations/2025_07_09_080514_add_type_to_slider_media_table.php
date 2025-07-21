<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTypeToSliderMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
public function up()
{
    Schema::table('slider_media', function (Blueprint $table) {
        $table->dropColumn('media_type');
    });
}

public function down()
{
    Schema::table('slider_media', function (Blueprint $table) {
        $table->string('media_type')->after('file_path');
    });
}

}
