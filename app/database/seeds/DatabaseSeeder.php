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

		$this->call('TeamTableSeeder');
        $this->call('StageTableSeeder');
        $this->call('GameTableSeeder');
	}

}

class TeamTableSeeder extends Seeder {

    public function run()
    {
        DB::table('team')->delete();

        //Groupe A
        Team::create(array('name' => 'Brésil', 'flag' => 'BR'));
        Team::create(array('name' => 'Mexique', 'flag' => 'MX'));
        Team::create(array('name' => 'Croatie', 'flag' => 'HR'));
        Team::create(array('name' => 'Cameroun', 'flag' => 'CM'));

        //Groupe B
        Team::create(array('name' => 'Pays-Bas', 'flag' => 'NL'));
        Team::create(array('name' => 'Chili', 'flag' => 'CL'));
        Team::create(array('name' => 'Australie', 'flag' => 'AU'));
        Team::create(array('name' => 'Espagne', 'flag' => 'ES'));

        //Groupe C
        Team::create(array('name' => 'Colombie', 'flag' => 'CO'));
        Team::create(array('name' => 'Côte d\'ivoire', 'flag' => 'CI'));
        Team::create(array('name' => 'Japon', 'flag' => 'JP'));
        Team::create(array('name' => 'Grèce', 'flag' => 'GR'));

        //Groupe D
        Team::create(array('name' => 'Costa Rica', 'flag' => 'CR'));
        Team::create(array('name' => 'Italie', 'flag' => 'IT'));
        Team::create(array('name' => 'Uruguay', 'flag' => 'UY'));
        Team::create(array('name' => 'Angleterre', 'flag' => 'GB'));

        //Groupe E
        Team::create(array('name' => 'France', 'flag' => 'FR'));
        Team::create(array('name' => 'Équateur', 'flag' => 'EC'));
        Team::create(array('name' => 'Suisse', 'flag' => 'CH'));
        Team::create(array('name' => 'Honduras', 'flag' => 'HN'));

        //Groupe F
        Team::create(array('name' => 'Argentine', 'flag' => 'AR'));
        Team::create(array('name' => 'Nigeria', 'flag' => 'NG'));
        Team::create(array('name' => 'Iran', 'flag' => 'IR'));
        Team::create(array('name' => 'Bosnie-Herzégovine', 'flag' => 'BA'));

        //Groupe G
        Team::create(array('name' => 'Allemagne', 'flag' => 'DE'));
        Team::create(array('name' => 'États-Unis', 'flag' => 'US'));
        Team::create(array('name' => 'Ghana', 'flag' => 'GH'));
        Team::create(array('name' => 'Portugal', 'flag' => 'PT'));

        //Groupe H
        Team::create(array('name' => 'Belgique', 'flag' => 'BE'));
        Team::create(array('name' => 'Corée du Sud', 'flag' => 'KR'));
        Team::create(array('name' => 'Russie', 'flag' => 'RU'));
        Team::create(array('name' => 'Algérie', 'flag' => 'DZ'));
    }

}

class StageTableSeeder extends Seeder {

    public function run()
    {
        DB::table('stage')->delete();

        Stage::create(array('name' => 'Finale'));
        Stage::create(array('name' => '1/2 finales', 'next_stage' => 1));
        Stage::create(array('name' => '1/4 de finale', 'next_stage' => 2));
        Stage::create(array('name' => '1/8 de finale', 'next_stage' => 3));
    }

}

class GameTableSeeder extends Seeder {

    public function run()
    {
        DB::table('game')->delete();

        //8e
        Game::create(array('team1_id' => 1, 'team2_id' => 6,'stage_id' => 4, 'team1_tmp_name' => '1A', 'team2_tmp_name' => '2B', 'stage_game_num' => 1, 'date' => DateTime::createFromFormat('U', 1403971200)));
        Game::create(array('team1_id' => 9, 'team2_id' => 15,'stage_id' => 4, 'team1_tmp_name' => '1C', 'team2_tmp_name' => '2D', 'stage_game_num' => 2, 'date' => DateTime::createFromFormat('U', 1403985600)));
        Game::create(array('team1_id' => 5, 'team2_id' => 2,'stage_id' => 4, 'team1_tmp_name' => '1E', 'team2_tmp_name' => '2F', 'stage_game_num' => 3, 'date' => DateTime::createFromFormat('U', 1404057600)));
        Game::create(array('team1_id' => 13, 'team2_id' => 12,'stage_id' => 4, 'team1_tmp_name' => '1G', 'team2_tmp_name' => '2H', 'stage_game_num' => 4, 'date' => DateTime::createFromFormat('U', 1404072000)));
        Game::create(array('team1_id' => 17, 'team2_id' => 22,'stage_id' => 4, 'team1_tmp_name' => '1B', 'team2_tmp_name' => '2A', 'stage_game_num' => 5, 'date' => DateTime::createFromFormat('U', 1404144000)));
        Game::create(array('team1_id' => 25, 'team2_id' => 32,'stage_id' => 4, 'team1_tmp_name' => '1D', 'team2_tmp_name' => '2C', 'stage_game_num' => 6, 'date' => DateTime::createFromFormat('U', 1404158400)));
        Game::create(array('team1_id' => 21, 'team2_id' => 19,'stage_id' => 4, 'team1_tmp_name' => '1F', 'team2_tmp_name' => '2E', 'stage_game_num' => 7, 'date' => DateTime::createFromFormat('U', 1404230400)));
        Game::create(array('team1_id' => 29, 'team2_id' => 26,'stage_id' => 4, 'team1_tmp_name' => '1H', 'team2_tmp_name' => '2G', 'stage_game_num' => 8, 'date' => DateTime::createFromFormat('U', 1404244800)));

        //Quarts
        Game::create(array('stage_id' => 3, 'stage_game_num' => 1, 'date' => DateTime::createFromFormat('U', 1404504000)));
        Game::create(array('stage_id' => 3, 'stage_game_num' => 2, 'date' => DateTime::createFromFormat('U', 1404489600)));
        Game::create(array('stage_id' => 3, 'stage_game_num' => 3, 'date' => DateTime::createFromFormat('U', 1404576000)));
        Game::create(array('stage_id' => 3, 'stage_game_num' => 4, 'date' => DateTime::createFromFormat('U', 1404576000)));

        //Demi
        Game::create(array('stage_id' => 2, 'stage_game_num' => 1, 'date' => DateTime::createFromFormat('U', 1404849600)));
        Game::create(array('stage_id' => 2, 'stage_game_num' => 2, 'date' => DateTime::createFromFormat('U', 1404936000)));


        //Finale
        Game::create(array('stage_id' => 1, 'stage_game_num' => 1, 'date' => DateTime::createFromFormat('U', 1405278000)));

        //Petite Finale
        Game::create(array('stage_id' => 1, 'stage_game_num' => 2, 'date' => DateTime::createFromFormat('U', 1405195200)));

    }

}