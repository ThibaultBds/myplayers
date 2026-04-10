<?php

namespace App\Models;

class Player
{
    public int $id;
    public int $team_id;
    public ?string $first_name;
    public ?string $last_name;
    public ?string $position;
    public ?string $photo;
    public int $jersey_number;

    public function __construct(int $id, int $team_id, string $first_name, string $last_name, string $position, string $photo, int $jersey_number)
    {
        $this->id = $id;
        $this->team_id = $team_id;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->position = $position;
        $this->photo = $photo;
        $this->jersey_number = $jersey_number;
    }
}
