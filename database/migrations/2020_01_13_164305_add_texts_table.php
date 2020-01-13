<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTextsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('texts', function (Blueprint $table) {
            //
            $table->integer('user_id')->unsigned(); //カラム追加        
            $table->foreign('user_id') //外部キー制約
                ->references('id')->on('users') //ｕｓｅｒｓテーブルのidを参照する
                ->onDelete('cascade');  //ユーザーが削除されたら紐付くpostsも削除
                
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('texts', function (Blueprint $table) {
        //     $table->dropForeign('texts_user_id_foreign');
        // });
        
    }
}
