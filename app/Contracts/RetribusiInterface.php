<?php

namespace App\Contracts;

interface RetribusiInterface
{
    public function sumJumlah();
    public function Filter(string $start, string $end, int $pasar, int $bagian) : array;

}
