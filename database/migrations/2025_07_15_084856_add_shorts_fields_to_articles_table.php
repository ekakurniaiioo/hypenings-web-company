<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddShortsFieldsToArticlesTable extends Migration
{
    public function up()
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->boolean('is_shorts')->default(false)->after('is_trending');
            $table->string('video_path')->nullable()->after('is_shorts');
            $table->string('thumbnail')->nullable()->after('video_path');
        });
    }

    public function down()
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropColumn(['is_shorts', 'video_path', 'thumbnail']);
        });
    }
}
