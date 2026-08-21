<?php

namespace App\Services;

use App\Data\Local\LocalData;
use App\Models\Local;

class LocalService
{
    /**
     * Create a new class instance.
     */
    public function __construct() {}

    public function getAll(bool $usaPaginate = false)
    {
        $localQuery = Local::query()->latest();

        $localQuery = $usaPaginate ? $localQuery->paginate(20) : $localQuery->get();

        return $localQuery;
    }

    public function getOne(Local $local): Local
    {
        return $local;
    }

    public function create(LocalData $data): Local
    {
        $localQuery = Local::create($data->toModelAttributes());

        return $localQuery;
    }

    public function update(LocalData $data, Local $local): Local
    {
        $local->update($data->toModelAttributes());

        return $local->refresh();
    }

    public function delete(Local $local): void
    {
        $local->delete();
    }
}
