<?php

namespace App\Interfaces;

interface ListsRepositoryInterface
{
    public function getById($id);

    public function saveList($request, $list);

    public function updateList($request, $id);

    public function deleteList($id);
}
