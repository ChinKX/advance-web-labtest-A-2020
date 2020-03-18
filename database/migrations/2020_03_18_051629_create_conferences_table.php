<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateConferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conferences', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('conf_id', 100)->unique();;
            $table->string('name')->index();
            $table->timestamps();
        });

        DB::table('conferences')->insert([
            ['conf_id' => 'CID-11000553', 'name' => 'Hackathon Con', "created_at" =>  \Carbon\Carbon::now(), "updated_at" => \Carbon\Carbon::now()],
            ['conf_id' => 'CID-11000563', 'name' => 'IoT Technologies', "created_at" =>  \Carbon\Carbon::now(), "updated_at" => \Carbon\Carbon::now()],
            ['conf_id' => 'CID-11000673', 'name' => 'Data Science Sym', "created_at" =>  \Carbon\Carbon::now(), "updated_at" => \Carbon\Carbon::now()],
            ['conf_id' => 'CID-11000573', 'name' => 'Augmented Engineering Con', "created_at" =>  \Carbon\Carbon::now(), "updated_at" => \Carbon\Carbon::now()],
            ['conf_id' => 'CID-11000565', 'name' => 'Game Technologies', "created_at" =>  \Carbon\Carbon::now(), "updated_at" => \Carbon\Carbon::now()]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conferences');
    }
}
