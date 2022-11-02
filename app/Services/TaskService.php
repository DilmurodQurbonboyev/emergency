<?php

namespace App\Services;

class TaskService
{
    public static function fileUpload($request, $column, $generate, $type)
    {
        $path = "applications/$generate/" . "$type/";
        if ($request->hasfile($column)) {
            $file = $request->file($column);
            $extension = $file->getClientOriginalExtension();
            $filename = uniqid('') . '.' . $extension;
            $file->storeAs($path, $filename, 'public');
            return $path . $filename;
        }
    }

    public static function checkFileExist($request, $column, $application, $type)
    {
        $path = "applications/$application->code/" . "$type/";
        /**
         * If file in appeal exist
         */
        if ($application->{$column}) {
            if ($request->hasfile($column)) {
                $file = $request->file($column);
                $extension = $file->getClientOriginalExtension();
                $filename = uniqid('') . '.' . $extension;
                $file->storeAs($path, $filename, 'public');
                return $path . $filename;
            } else {
                return $application->{$column};
            }
        } else {
            if ($request->hasfile($column)) {
                $file = $request->file($column);
                $extension = $file->getClientOriginalExtension();
                $filename = uniqid('') . '.' . $extension;
                $file->storeAs($path, $filename, 'public');
                return $path . $filename;
            } else {
                return null;
            }
        }
    }
}
