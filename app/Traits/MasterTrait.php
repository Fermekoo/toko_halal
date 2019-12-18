<?php

namespace App\Traits;

trait MasterTrait
{
    protected function kodeBarang()
    {
        $kode = 'BRG-'.rand(1000,9999).'-'.rand(1000,9999);

        return $kode;
    }
}