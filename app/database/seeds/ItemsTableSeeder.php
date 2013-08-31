<?php

class ItemsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('items')->truncate();

		$count = 1000;

    	$faker = Faker\Factory::create('en_US');

    	//$faker->addProvider(new Faker\Provider\en_US\Address($faker));
    	$faker->addProvider(new Faker\Provider\Base($faker));
    	$faker->addProvider(new Faker\Provider\Lorem($faker));
    	$faker->addProvider(new Faker\Provider\Address($faker));
    	$faker->addProvider(new Faker\Provider\Miscellaneous($faker));

        $this->command->info('Inserting '.$count.' sample records using Faker ...');
        // $faker->seed(1234);
        $itemId = 10000000;
        for( $x=0 ; $x<$count; $x++ )
    	{

			$userId = $faker->randomNumber(1,100);
    		Item::create(array(
    			'item_id' => $itemId,
    			'user_id' => $userId,
    			'title' => $faker->text(126),
    			'body' => $faker->text(2000),
    			'price' => $faker->randomFloat(4,0,100),
    			'featured' => 0,
    			'condition' => 0,
    			'location' => $faker->city().', NY',
    			'shipping_details' => $faker->text(500),
    			'bitcoin_address' => $faker->sha1(),
    			'type_id' => 'item',
    			'category_id' => $faker->randomNumber(2, 56),
    			'published' => 1,
    			'published_at' => date("Y-m-d H:i:s"),
    			'created_at' => date("Y-m-d H:i:s")

			));

			$itemId++;
    	}

    	$this->command->info('Items table seeded using Faker ...');

		// Uncomment the below to run the seeder
		// DB::table('items')->insert($items);
	}

}
