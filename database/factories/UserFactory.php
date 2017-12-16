<?php


use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

//复制上面的机器，用来制造我们需要的数据，define方法第一个参数，是需要填充数据所对应的模型
$factory->define(\App\Model\Admin::class, function (Faker $faker) {
    static $password;

    return [
        'username' => $faker->name,
        'password' => $password ?: $password = bcrypt('admin888'),
    ];
});

//设置完毕机器后，在命令行执行下面的命令:

//1.　php artisan tinker 进入到命令行的tinker模式

//2. factory(App\Model\Admin::class,10)->create()  factory方法中的第一个参数代表你需要对哪个数据模型进行工厂化数据填充，第一个参数需要和上面设施机器中define的第一个参数相同，第二个参数代表你需要工厂化生产出来几条数据，create方法，代表执行工作
