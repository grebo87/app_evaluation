<?php

use Illuminate\Database\Seeder;
use App\Company;
use App\User;
use App\Category;
use App\CategoryUser;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Company::class,10)->create();
        factory(User::class,10)->create();
        factory(Category::class,10)->create();
        factory(CategoryUser::class,10)->create();
    }
}
