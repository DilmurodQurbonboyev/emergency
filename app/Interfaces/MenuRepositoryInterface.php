<?php

namespace App\Interfaces;

interface MenuRepositoryInterface
{
    public function getById($id);

    public function saveMenu($request);

    public function updateMenu($request, $id);

    public function deleteMenu($id);
}
