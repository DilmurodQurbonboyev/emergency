<?php

namespace App\Interfaces;

interface ListCategoryRepositoryInterface
{
    public function getById($id);

    public function saveCategory($request, $listCategory);

    public function updateCategory($request, $id);

    public function deleteCategory($id);
}
