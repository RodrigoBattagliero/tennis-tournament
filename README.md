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