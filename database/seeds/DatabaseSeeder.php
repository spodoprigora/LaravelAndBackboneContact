<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ContactsTableSeeder::class);
        

        $this->command->info('Таблица контактов загружена данными!');
    }
}
