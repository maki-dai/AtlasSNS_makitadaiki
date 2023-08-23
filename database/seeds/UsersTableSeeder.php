<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //ユーザー名
        // メールアドレス
        // パスワード（暗号化処理）
DB::table('Users')->insert([
    [
    'username' => 'コメダ',
    'mail' => 'komeda@gmail.com' ,
    // 'password' => bcrypt($password)
    'password' => bcrypt('komekome1'),
    ]
]);
    }
}

//  $table->integer('id')->autoIncrement();
//             $table->string('username',255);
//             $table->string('mail',255);
//             $table->string('password',255);
//             $table->string('bio',400)->nullable();
//             $table->string('images',255)->default('icon1.png');
//             $table->timestamp('created_at')->useCurrent();
//             $table->timestamp('updated_at')->default(DB::raw('current_timestamp on update current_timestamp'));
