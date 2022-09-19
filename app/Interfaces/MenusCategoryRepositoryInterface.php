<?php

namespace App\Interfaces;

interface MenusCategoryRepositoryInterface
{
    public function getById($id);

    public function saveCategory($request);

    public function updateCategory($request, $id);

    public function deleteCategory($id);

}
