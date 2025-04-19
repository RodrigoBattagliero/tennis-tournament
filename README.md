# Setup

1. Clone the project `git clone https://github.com/RodrigoBattagliero/tennis-tournament.git`
2. Run `cd tennis-tournament`
3. Run `cp src/.env.dev src/.env.dev.local`
4. In `src/.env.dev.local` `DATABASE_URL`
> Note: database conection data can be found in `docker-compose.yml`
5. Run `docker compose up -d`
6. Enter php container `docker compose exec php sh`
7. Install dependencies `composer install`
9. Run migrations `php bin/console doctrine:migrations:migrate`
> If you have errors related with database conection, you can inspect mariadb container and look for Gateway ip to use it as db host in .env.dev.local

# Test
1. Enter php container `docker compose exec php sh`
2. Clone .env.test to .env.test.local and set `DATABASE_URL`
2. Run `php bin/console --env=test doctrine:database:create`
3. Run `php bin/console --env=test doctrine:schema:create`
4. Run `php bin/phpunit`

# Usage
Once installed, you can try the application out and see the api doc via web in `http://localhost:8001/api/doc`

Making api request

> POST http://localhost:8001/api/start-game
> GET http://localhost:8001/api/search

## POST api/game-start

> Request: Json example
```json
{
    "type": "M",
    "players": [
        {"name": "Player 1", "hability": 75, "strenght": 57, "travelSpeed": 60, "reactionTime": 0},
        {"name": "Player 2", "hability": 74, "strenght": 55, "travelSpeed": 55, "reactionTime": 0},
        {"name": "Player 3", "hability": 20, "strenght": 10, "travelSpeed": 5, "reactionTime": 0},
        {"name": "Player 4", "hability": 50, "strenght": 57, "travelSpeed": 50, "reactionTime": 0}
    ]
}
```

> Response: Json example
```json
{
    	"name": "Player 2",
	"hability": 74,
	"strenght": 55,
	"travelSpeed": 55,
	"reactionTime": 0,
	"extraPoints": 86
}
```

## GET api/search
> Example endpoint api/search?type=M
> Example response 
```json
[
	{
		"type": "M",
		"date": "2025-04-19T05:48:14+00:00",
		"players": [
			{
				"name": "Player 1",
				"hability": 75,
				"strenght": 57,
				"travelSpeed": 60,
				"reactionTime": 0
			},
			{
				"name": "Player 2",
				"hability": 74,
				"strenght": 55,
				"travelSpeed": 55,
				"reactionTime": 0
			},
			{
				"name": "Player 3",
				"hability": 20,
				"strenght": 10,
				"travelSpeed": 5,
				"reactionTime": 0
			},
			{
				"name": "Player 4",
				"hability": 50,
				"strenght": 57,
				"travelSpeed": 50,
				"reactionTime": 0
			}
		],
		"winner": {
			"name": "Player 2",
			"hability": 74,
			"strenght": 55,
			"travelSpeed": 55,
			"reactionTime": 0
		}
	}
]

```


# Testing
Screenshot of the testing

1. Manual POST api/start-game

[Manual POST api/start-game](https://drive.google.com/file/d/1eCIC6oZkAAGzsqkAoEjJGEQbwVtwFTLR/view?usp=sharing)

2. Check Database

[Check Database](https://drive.google.com/file/d/1GJM88iQTRE92N6p33V-75bM1ACQPKH3Y/view?usp=sharing)

3. Manual GET api/search

[Manual GET api/search](https://drive.google.com/file/d/1333tJfxtcQNUS2iK7UEku_hHq-lPqlaa/view?usp=sharing)

4. Manual Get api/search with params

[Manual Get api/search with params 1](https://drive.google.com/file/d/12kY71w3k3TJNl5X9mFtsbaBhD1TXkde6/view?usp=sharing)

[Manual Get api/search with params 2](https://drive.google.com/file/d/1mF-VjyCMOrbH51TBzkQj5xsDox87O9xu/view?usp=sharing)

5. Unit test

[Unit test](https://drive.google.com/file/d/1TTCsDdlhb5tEpv4wCgBTDrDvv9NayVDA/view?usp=sharing)
