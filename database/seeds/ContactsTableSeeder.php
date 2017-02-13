<?php

use App\Models\Contact;
use Illuminate\Database\Seeder;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contact = new Contact;
        $contact->first_name = 'Павел';
        $contact->last_name = 'Сидоров';
        $contact->email_address = 'sidorov@gmail.com';
        $contact->description = 'Повар';
        $contact->save();

        $contact = new Contact;
        $contact->first_name = 'Наталья';
        $contact->last_name = 'Сидорова';
        $contact->email_address = 'sidorova@gmail.com';
        $contact->description = 'Жена повора';
        $contact->save();

        $contact = new Contact;
        $contact->first_name = 'Иван';
        $contact->last_name = 'Петров';
        $contact->email_address = 'petrov@gmail.com';
        $contact->description = 'Лучший друг повара';
        $contact->save();
     }
}
