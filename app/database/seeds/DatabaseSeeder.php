<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		// $this->call('UserTableSeeder');
		$this->call('SentryGroupSeeder');
		$this->call('SentryUserSeeder');
		$this->call('SentryUserGroupSeeder');
		$this->call('ItemsTableSeeder');
		$this->call('CategoriesTableSeeder');
		$this->call('SettingsTableSeeder');
		$this->call('MotdsTableSeeder');
		$this->call('NotificationsTableSeeder');
		$this->call('TemplatesTableSeeder');
	}

}