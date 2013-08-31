<?php

class SentryUserSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('users')->delete();

		Sentry::getUserProvider()->create(array(
	        'email'    => 'admin@admin.com',
	        'password' => 'sentryadmin',
	        'activated' => 1,
	    ));

	    Sentry::getUserProvider()->create(array(
	        'email'    => 'user@user.com',
	        'password' => 'sentryuser',
	        'activated' => 1,
	    ));

	    $count = 100;

    	$faker = Faker\Factory::create('en_US');

    	//$faker->addProvider(new Faker\Provider\en_US\Address($faker));
    	$faker->addProvider(new Faker\Provider\en_US\Person($faker));
    	$faker->addProvider(new Faker\Provider\en_US\Company($faker));
    	$faker->addProvider(new Faker\Provider\Uuid($faker));

        $this->command->info('Inserting '.$count.' sample records using Faker ...');
        // $faker->seed(1234);

        for( $x=0 ; $x<$count; $x++ )
    	{
    		Sentry::getUserProvider()->create(array(
    			'email' => $faker->companyEmail(),
    			'password' => 'Test1!',
    			'activated' => 1
			));
    	}

    	$this->command->info('Person table seeded using Faker ...');
	}

}