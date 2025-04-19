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

# Test
1. Enter php container `docker compose exec php sh`
2. Clone .env.test to .env.test.local and set `DATABASE_URL`
2. Run `php bin/console --env=test doctrine:database:create`
3. Run `php bin/console --env=test doctrine:schema:create`
4. Run `php bin/phpunit`

# Usage

# Testing 
# Usage
![desc](https://drive.google.com/file/d/1uUezLKWku8PNxtj6bEmDKCtzoZBVu5Fy/view?usp=drive_link)

## input json

```json
{
    "type": "M",
    "players": [
        {"name": '', "hability": 0, "fuerza": 0, "velocidad_desplazamiento": 0, "tiempo_de_reaccion": 0},
        {"name": '', "hability": 0, "fuerza": 0, "velocidad_desplazamiento": 0, "tiempo_de_reaccion": 0},
        {"name": '', "hability": 0, "fuerza": 0, "velocidad_desplazamiento": 0, "tiempo_de_reaccion": 0},
        {"name": '', "hability": 0, "fuerza": 0, "velocidad_desplazamiento": 0, "tiempo_de_reaccion": 0},
    ]
}
```

## output json
```json
{
    "winner": {
        {"name": '', "hability": 0, "fuerza": 0, "velocidad_desplazamiento": 0, "tiempo_de_reaccion": 0}
    }
}
```

```php

// Entity / Domain
class player {
    # name
    # hability
    # fuerza
    # velocidad_desplazamiento
    # tiempo_de_reaccion
}

class Tournament 
{
    # name
    # type
    # winner: Player
    # init_date
    # finish_date
}

// Service / Application 
class GameService {
    // se puede mejorar con dto 
    public function startGame(array $players, string $type)
    {
        # 1. el juego se divide en stages dependiendo de los jugadores
        $stagesCount = getStages(count($players));
        # Mezclo jugadores
        # init stages - inicia el primer stage
        $stages = ;
        for (int $i = 0; $i < $stages; $i++) {
            # encuentra el ganador
            $winner = ;
        }

    }

    function getStages($players)
    {
        return [
            'total_stages' => 2
        ];
    }
}

// Controller / Presentation
class IndexController {
    public function startGame() {}
    public function search() {}
}

// Repository / Infraestructure

class Stage {
    # 
}

class 

```

01. agregar factor suerte * 
02. guardar entity tournament *
03. eliminar propiedades innecesarias *
04. crear enpoint para consultar tournament *
05. committear cambis *
06. unit test *
07. integral test *
08. aws
09. Strategies refactor. Agregar clase abstracta *
10. swagger *
11. Mejorar objetos en swagger
12. mejorar readme
