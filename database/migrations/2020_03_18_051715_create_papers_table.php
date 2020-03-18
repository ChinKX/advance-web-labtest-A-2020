<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreatePapersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('papers', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('paper_id', 100)->unique();
            $table->string('name')->index();
            $table->unsignedInteger('author_id');
            $table->foreign('author_id')
                ->references('id')->on('authors');
            $table->unsignedInteger('conf_id');
            $table->foreign('conf_id')
                ->references('id')->on('conferences');
            $table->timestamps();
        });

        DB::table('papers')->insert([
            ['paper_id' => 'PPID-1100055303', 'name' => 'Hack Methodologies', 'author_id' => 1, 'conf_id' => 1, "created_at" =>  \Carbon\Carbon::now(), "updated_at" => \Carbon\Carbon::now()],
            ['paper_id' => 'PPID-1100056332', 'name' => 'IoT Techniques', 'author_id' => 2, 'conf_id' => 2, "created_at" =>  \Carbon\Carbon::now(), "updated_at" => \Carbon\Carbon::now()],
            ['paper_id' => 'PPID-1100067301', 'name' => 'Analysing Using NLP', 'author_id' => 3, 'conf_id' => 3, "created_at" =>  \Carbon\Carbon::now(), "updated_at" => \Carbon\Carbon::now()],
            ['paper_id' => 'PPID-1100067304', 'name' => 'A Novel Big Data Analysis Algorithm', 'author_id' => 4, 'conf_id' => 3, "created_at" =>  \Carbon\Carbon::now(), "updated_at" => \Carbon\Carbon::now()],
            ['paper_id' => 'PPID-1100057305', 'name' => 'Augmented Medical Study', 'author_id' => 4, 'conf_id' => 4, "created_at" =>  \Carbon\Carbon::now(), "updated_at" => \Carbon\Carbon::now()]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('papers');
    }
}
