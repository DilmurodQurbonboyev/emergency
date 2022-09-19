<?php

namespace App\Interfaces;

interface ManagementCategoryRepositoryInterface
{
    public function getById($id);

    public function saveManagementCategory($request, $mcategory);

    public function updateManagementCategory($request, $id);

    public function deleteManagementCategory($id);
}
