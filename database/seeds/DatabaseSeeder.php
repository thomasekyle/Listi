<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Listing;
use App\SiteSettings;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

         $this->call(UserTableSeeder::class);

        Model::reguard();
    }
}

class UserTableSeeder extends Seeder 
{
    public function run() 
    {
        //Clear the user database
        DB::table('users')->delete();
        DB::table('listings')->delete();
        DB::table('password_resets')->delete();
        DB::table('site_settings')->delete();

        //Create the first user for Hank Mess
        $user1 = User::create(array(
            'fname' => 'Hank',
            'lname' => 'Mess',
            'birthday'  => '1956-01-10',
            'phone_number' => '704-999-6255',
            'fax_number'   => '704-999-6599',
            'email' => 'hank.mess@gmail.com',
            'password' => bcrypt('temp12345'),
            'description' => 'The account for Hank Mess',
            'active' => '1',
            'properties' => '4',

            ));
        $user2 = User::create(array(
            'fname' => 'Susan',
            'lname' => 'Mess',
            'birthday'  => '1956-01-10',
            'phone_number' => '704-999-6255',
            'fax_number'   => '704-999-6599',
            'email' => 'susan.mess@gmail.com',
            'password' => bcrypt('temp12345'),
            'description' => 'The account for Susan Mess',
            'active' => '1'
            'properties' => '4',


            ));
        $user3 = User::create(array(
            'fname' => 'Harry',
            'lname' => 'Mess',
            'birthday'  => '1956-01-10',
            'phone_number' => '704-999-6255',
            'fax_number'   => '704-999-6599',
            'email' => 'harry.mess@gmail.com',
            'password' => bcrypt('temp12345'),
            'description' => 'The account for Harry Mess',
            'active' => '1'
            'properties' => '2',


            ));
        $user4 = User::create(array(
            'fname' => 'Sally',
            'lname' => 'Mess',
            'birthday'  => '1956-01-10',
            'phone_number' => '704-999-6255',
            'fax_number'   => '704-999-6599',
            'email' => 'sally.mess@gmail.com',
            'password' => bcrypt('temp12345'),
            'description' => 'The account for Sally Mess',
            'active' => '1'
            'properties' => '1',


            ));
        $this->command->info('Users Succesfully created.');
    
        //Create the first property in the listings
        $listing1 = Listing::create(array(
            'user_id' => $user1->id,
            'unit_name' => 'Happy Homes',
            'date_available' => '2099-06-07',
            'house_num' => '1234',
            'street_name' => 'Easy Street',
            'apt_num' => '304',
            'city' => 'Charlotte',
            'state' => 'North Carolina',
            'zip' => '28213',
            'subdivision' => 'Gleeful Greens',
            'sq_ft' => '2050',
            'type' => 'For Sale',
            'price' => '300000',
            'bedrooms' => '5',
            'bathrooms' => '2.5',
            'pics_id' => '4308rf304jf034j',
            'description' => 'This is a Happy Homes Property.'
        ));

        //Create the second property in the listings
        $listing1 = Listing::create(array(
            'user_id' => $user1->id,
            'unit_name' => 'Happy Homes 2',
            'date_available' => '2099-06-07',
            'house_num' => '1235',
            'street_name' => 'Easy Street',
            'apt_num' => '306',
            'city' => 'Charlotte',
            'state' => 'North Carolina',
            'zip' => '28213',
            'subdivision' => 'Gleeful Greens',
            'sq_ft' => '2010',
            'type' => 'For Sale',
            'price' => '250000',
            'bedrooms' => '4',
            'bathrooms' => '2',
            'pics_id' => '4308rf304j34r89034sj',
            'description' => 'This is a Happy Homes Property.',
        ));

        $listing1 = Listing::create(array(
            'user_id' => $user1->id,
            'unit_name' => 'Happy Homes 3',
            'date_available' => '2099-06-07',
            'house_num' => '1235',
            'street_name' => 'Easy Street',
            'apt_num' => '306',
            'city' => 'Charlotte',
            'state' => 'North Carolina',
            'zip' => '28213',
            'subdivision' => 'Gleeful Greens',
            'sq_ft' => '2010',
            'type' => 'For Sale',
            'price' => '450000',
            'bedrooms' => '4',
            'bathrooms' => '2',
            'pics_id' => '4308rf304j34r894sj',
            'description' => 'This is a Happy Homes Property.',
        ));  
        $listing1 = Listing::create(array(
            'user_id' => $user1->id,
            'unit_name' => 'Happy Homes 4',
            'date_available' => '2099-06-07',
            'house_num' => '1235',
            'street_name' => 'Easy Street',
            'apt_num' => '306',
            'city' => 'Charlotte',
            'state' => 'North Carolina',
            'zip' => '28213',
            'subdivision' => 'Gleeful Greens',
            'sq_ft' => '2010',
            'type' => 'For Sale',
            'price' => '450000',
            'bedrooms' => '4',
            'bathrooms' => '2',
            'pics_id' => '4308rf304jr89034sj',
            'description' => 'This is a Happy Homes Property.',
        ));
        $listing1 = Listing::create(array(
            'user_id' => $user2->id,
            'unit_name' => 'Happy Homes 5',
            'date_available' => '2099-06-07',
            'house_num' => '1235',
            'street_name' => 'Easy Street',
            'apt_num' => '306',
            'city' => 'Charlotte',
            'state' => 'North Carolina',
            'zip' => '28213',
            'subdivision' => 'Gleeful Greens',
            'sq_ft' => '2010',
            'type' => 'For Sale',
            'price' => '2450000',
            'bedrooms' => '4',
            'bathrooms' => '2',
            'pics_id' => '4308rf34jr89034sj',
            'description' => 'This is a Happy Homes Property.',
        ));  
        $listing1 = Listing::create(array(
            'user_id' => $user2->id,
            'unit_name' => 'Happy Homes 6',
            'date_available' => '2099-06-07',
            'house_num' => '12355',
            'street_name' => 'Easy Street',
            'apt_num' => '306',
            'city' => 'Charlotte',
            'state' => 'North Carolina',
            'zip' => '28213',
            'subdivision' => 'Gleeful Greens',
            'sq_ft' => '2010',
            'type' => 'For Sale',
            'price' => '1450000',
            'bedrooms' => '4',
            'bathrooms' => '2',
            'pics_id' => '438rf304j89034pupsj',
            'description' => 'This is a Happy Homes Property.',
        ));      
        $listing1 = Listing::create(array(
            'user_id' => $user2->id,
            'unit_name' => 'Happy Homes 7',
            'date_available' => '2099-06-07',
            'house_num' => '12355',
            'street_name' => 'Easy Street',
            'apt_num' => '306',
            'city' => 'Charlotte',
            'state' => 'North Carolina',
            'zip' => '28213',
            'subdivision' => 'Gleeful Greens',
            'sq_ft' => '2010',
            'type' => 'For Sale',
            'price' => '1450011',
            'bedrooms' => '4',
            'bathrooms' => '2',
            'pics_id' => '438rf04j89034j',
            'description' => 'This is a Happy Homes Property.',
        ));   
        $listing1 = Listing::create(array(
            'user_id' => $user2->id,
            'unit_name' => 'Happy Homes 8',
            'date_available' => '2099-06-07',
            'house_num' => '12355',
            'street_name' => 'Easy Street',
            'apt_num' => '306',
            'city' => 'Charlotte',
            'state' => 'North Carolina',
            'zip' => '28213',
            'subdivision' => 'Gleeful Greens',
            'sq_ft' => '2010',
            'type' => 'For Sale',
            'price' => '1450000',
            'bedrooms' => '4',
            'bathrooms' => '2',
            'pics_id' => '438f304jr89034s',
            'description' => 'This is a Happy Homes Property.',
        ));   
        $listing1 = Listing::create(array(
            'user_id' => $user3->id,
            'unit_name' => 'Happy Homes 9',
            'date_available' => '2099-06-07',
            'house_num' => '12355',
            'street_name' => 'Easy Street',
            'apt_num' => '306',
            'city' => 'Charlotte',
            'state' => 'North Carolina',
            'zip' => '28213',
            'subdivision' => 'Gleeful Greens',
            'sq_ft' => '2010',
            'type' => 'For Sale',
            'price' => '1250000',
            'bedrooms' => '4',
            'bathrooms' => '2',
            'pics_id' => '43rf304jr8934sj',
            'description' => 'This is a Happy Homes Property.',
        ));   
        $listing1 = Listing::create(array(
            'user_id' => $user3->id,
            'unit_name' => 'Happy Homes 10',
            'date_available' => '2099-06-07',
            'house_num' => '12355',
            'street_name' => 'Easy Street',
            'apt_num' => '306',
            'city' => 'Charlotte',
            'state' => 'North Carolina',
            'zip' => '28213',
            'subdivision' => 'Gleeful Greens',
            'sq_ft' => '2010',
            'type' => 'For Sale',
            'price' => '3450000',
            'bedrooms' => '4',
            'bathrooms' => '2',
            'pics_id' => '438rf304jr8903j',
            'description' => 'This is a Happy Homes Property.',
        ));   
        $listing1 = Listing::create(array(
            'user_id' => $user4->id,
            'unit_name' => 'Happy Homes 11',
            'date_available' => '2099-06-07',
            'house_num' => '12355',
            'street_name' => 'Easy Street',
            'apt_num' => '306',
            'city' => 'Charlotte',
            'state' => 'North Carolina',
            'zip' => '28213',
            'subdivision' => 'Gleeful Greens',
            'sq_ft' => '2010',
            'type' => 'For Sale',
            'price' => '13350000',
            'bedrooms' => '4',
            'bathrooms' => '2',
            'pics_id' => '438rf30489034sj',
            'description' => 'This is a Happy Homes Property.',
        ));   
        $this->command->info('Listings Succesfully created.');

        
        // Create the default site settings
        $site_settings = SiteSettings::create(array(
            'id' => '1',
            'users' => '4',
            'properties' => '4',
            'company_name' => 'Property Cloud',
            'company_street_number' => '1234',
            'company_street_name' => 'Coporate Lane',
            'company_city' => 'Charlotte',
            'company_state' => 'North Carolina',
            'company_zip' => '28213',
            'http_link' => 'http://localhost:8000',
            'http_link2' => 'http://localhost',
        )); 
    }
}

