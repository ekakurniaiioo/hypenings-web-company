<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsTrendingToArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
public function up()
{
    Schema::table('articles', function (Blueprint $table) {
        $table->boolean('is_trending')->default(false)->after('is_topic');
    });
}

public function down()
{
    Schema::table('articles', function (Blueprint $table) {
        $table->dropColumn('is_trending');
    });
}

}
