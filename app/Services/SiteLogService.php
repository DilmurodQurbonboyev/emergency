<?php

namespace App\Services;

use App\Models\SiteLog;
use Illuminate\Support\Facades\Request;

class SiteLogService
{
    public function save($model, $logType)
    {
        $siteLog = new SiteLog();
        $siteLog->model = get_class($model);
        $siteLog->type = $model->list_type_id;
        $siteLog->row_id = $model->id;
        $siteLog->user_id = $model->creator_id;
        $siteLog->authority_id = session()->get('current_authority')->id;
        $siteLog->user_ip = Request::ip();
        $siteLog->url = Request::fullUrl();
        $siteLog->action = $logType;
        $siteLog->user_agent = Request::header('User-Agent');
        $siteLog->save();
    }
}
