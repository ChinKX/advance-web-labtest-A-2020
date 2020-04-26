<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateAuthorConferenceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('author_conference', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('author_id');
            $table->foreign('author_id')
                ->references('id')->on('authors');
            $table->unsignedInteger('conference_id');
            $table->foreign('conference_id')
                ->references('id')->on('conferences');
            $table->timestamps();
        });

        DB::table('author_conference')->insert([
            [
                'author_id' => 3,
                'conference_id' => 1
            ],
            [
                'author_id' => 2,
                'conference_id' => 2
            ],
            [
                'author_id' => 1,
                'conference_id' => 3
            ],
            [
                'author_id' => 3,
                'conference_id' => 3
            ],
            [
                'author_id' => 4,
                'conference_id' => 4
            ],
            [
                'author_id' => 5,
                'conference_id' => 4
            ],
            [
                'author_id' => 4,
                'conference_id' => 5
            ],
            [
                'author_id' => 5,
                'conference_id' => 5
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('author_conference');
    }
}
