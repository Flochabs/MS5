<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateNullableMatchsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('matchs', function (Blueprint $table) {
            $table->dropColumn('home_team_score');
            $table->dropColumn('away_team_score');
            $table->dropColumn('team_wining');
            $table->dropColumn('team_losing');
        });
        Schema::table('matchs', function (Blueprint $table) {
            $table->addColumn('integer', 'home_team_score')->nullable();
            $table->addColumn('integer', 'away_team_score')->nullable();
            $table->addColumn('integer', 'team_wining')->nullable();
            $table->addColumn('integer', 'team_losing')->nullable();
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
