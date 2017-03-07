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
        DB::table('email_settings')->delete();
        DB::table('listing_picture')->delete();
        DB::table('user_files')

        //Create the first user for Hank Mess
        $user1 = User::create(array(
            'first_name' => 'Web',
            'last_name' => 'Admin',
            'birthday'  => '1956-01-10',
            'phone_number' => '888-888-8888',
            'fax_number'   => '888-888-8888',
            'email' => 'webadmin@listi.us',
            'password' => bcrypt('pleasechangeme'),
            'description' => 'The account for Web Admin',
            'active' => '1',
            'properties' => '0',
            'can_mod_user' => 1,
            'can_mod_site' => 1
            ));

        $this->command->info('User succesfully created.');

        //Create the first property in the listings
        $listing1 = Listing::create(array(
            'user_id' => $user1->id,
            'unit_name' => 'Happy Homes',
            'date_available' => '2099-06-07',
            'house_number' => '1234',
            'street_name' => 'Easy Street',
            'unit_num' => '304',
            'city' => 'Charlotte',
            'state' => 'North Carolina',
            'zip' => '28213',
            'subdivision' => 'Gleeful Greens',
            'sqaure_feet' => '2050',
            'type' => 'For Sale',
            'price' => '300000',
            'bedrooms' => '5',
            'bathrooms' => '2.5',
            'description' => 'This is a Happy Homes Property.'
        ));

        //Create the second property in the listings
        $listing1 = Listing::create(array(
            'user_id' => $user1->id,
            'unit_name' => 'Happy Homes 2',
            'date_available' => '2099-06-07',
            'house_number' => '1235',
            'street_name' => 'Easy Street',
            'unit_num' => '306',
            'city' => 'Charlotte',
            'state' => 'North Carolina',
            'zip' => '28213',
            'subdivision' => 'Gleeful Greens',
            'sqaure_feet' => '2010',
            'type' => 'For Sale',
            'price' => '250000',
            'bedrooms' => '4',
            'bathrooms' => '2',
            'description' => 'This is a Happy Homes Property.',
        ));

        $listing1 = Listing::create(array(
            'user_id' => $user1->id,
            'unit_name' => 'Happy Homes 3',
            'date_available' => '2099-06-07',
            'house_number' => '1235',
            'street_name' => 'Easy Street',
            'unit_num' => '306',
            'city' => 'Charlotte',
            'state' => 'North Carolina',
            'zip' => '28213',
            'subdivision' => 'Gleeful Greens',
            'sqaure_feet' => '2010',
            'type' => 'For Sale',
            'price' => '450000',
            'bedrooms' => '4',
            'bathrooms' => '2',
            'description' => 'This is a Happy Homes Property.',
        ));
        $listing1 = Listing::create(array(
            'user_id' => $user1->id,
            'unit_name' => 'Happy Homes 4',
            'date_available' => '2099-06-07',
            'house_number' => '1235',
            'street_name' => 'Easy Street',
            'unit_num' => '306',
            'city' => 'Charlotte',
            'state' => 'North Carolina',
            'zip' => '28213',
            'subdivision' => 'Gleeful Greens',
            'sqaure_feet' => '2010',
            'type' => 'For Sale',
            'price' => '450000',
            'bedrooms' => '4',
            'bathrooms' => '2',
            'description' => 'This is a Happy Homes Property.',
        ));
        $this->command->info('Listings Succesfully created.');


        // Create the default site settings
        $site_settings = SiteSettings::create(array(
            'id' => '1',
            'users' => '1',
            'properties' => '4',
            'company_name' => 'Listi',
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
