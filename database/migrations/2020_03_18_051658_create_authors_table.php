<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CreateAuthorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('authors', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name')->index();
            $table->timestamps();
        });

        DB::table('authors')->insert([
            [
                'name' => 'Ronald Reynolds',
                "created_at" =>  Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                'name' => 'Marilyn Renee',
                "created_at" =>  Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                'name' => 'Cohan Carnell',
                "created_at" =>  Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                'name' => 'Megan Laney',
                "created_at" =>  Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                'name' => 'Nick Valowski',
                "created_at" =>  Carbon::now(),
                "updated_at" => Carbon::now()
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
        Schema::dropIfExists('authors');
    }
}
