<?php

namespace App\Interfaces;

interface ManagementRepositoryInterface
{
    public function getById($id);

    public function saveManagement($request);

    public function updateManagement($request, $id);

    public function deleteManagement($id);
}
