<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePlayerIdAuctionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('auctions', function (Blueprint $table) {
            $table->dropForeign(['draft_id']);
            $table->dropColumn('draft_id');
        });
        Schema::table('auctions', function (Blueprint $table) {
            $table->addColumn('bigInteger','player_id')->unsigned();
            $table->foreign('player_id')->references('id')->on('players');


        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
