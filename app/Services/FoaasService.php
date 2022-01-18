<?php

namespace App\Services;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class FoaasService
{
    private function getFucks($endpoint, ...$args): Collection
    {
        $implodedArgs = implode('/', $args);

        return Http::acceptJson()
            ->get("https://foaas.com/$endpoint/$implodedArgs")
            ->collect();
    }

    public function even(string $from): Collection
    {
        return $this->getFucks('even', $from);
    }

    public function keepcalm(string $reaction, string $from): Collection
    {
        return $this->getFucks('keepcalm', $reaction, $from);
    }
}
