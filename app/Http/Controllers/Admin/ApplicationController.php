<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ApplicationRequest;
use Exception;
use App\Models\Appeal;
use Illuminate\Http\Request;
use App\Services\TaskService;
use App\Mail\AppealAnswerMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class ApplicationController extends Controller
{
    public function index()
    {
        return view('admin.applications.index');
    }

    public function show($id)
    {
        $application = Appeal::query()->findOrFail($id);
        return view('admin.applications.show', compact('application'));
    }

    public function edit($id)
    {
        $application = Appeal::query()->findOrFail($id);
        return view('admin.applications.edit', compact('application'));
    }

    public function update(ApplicationRequest $request, $id): RedirectResponse
    {
        $application = Appeal::query()->findOrFail($id);

        try {
            $application->update([
                'status' => $request->status,
                'answer' => $request->answer,
                'answer_file' => TaskService::checkFileExist($request, 'answer_file', $application, 'answer_file'),
            ]);

            $data = [
                'answer' => $application->answer,
                'answer_file' => $request->file('answer_file'),
            ];

            try {
                Mail::to("$application->email")->send(new AppealAnswerMail($data));
            } catch (Exception $e) {
                dd($e->getMessage());
            }
            return redirect()
                ->route('applications.show', $application->id)
                ->with('success_save', tr('Successfully sent'));

        } catch (Exception $e) {
            return redirect()->back()->with('warning', $e->getMessage());
        }
    }

    public function display($id)
    {
        $application = Appeal::query()->findOrFail($id);
        return view('admin.applications.display', compact('application'));
    }

    public function displayPost(Request $request, $id)
    {
        $application = Appeal::query()->findOrFail($id);
        $application->update([
            'photo' => TaskService::checkFileExist($request, 'photo', $application, 'photo') ?? '',
            'display' => $request->display,
        ]);
        return redirect()
            ->route('applications.show', $application->id)
            ->with('success_save', tr('Successfully sent'));
    }

    public function destroy($id): RedirectResponse
    {
        $application = Appeal::query()->findOrFail($id);
        try {
            Storage::deleteDirectory("public/applications/$application->code");
            $application->delete();
            return redirect()->route('applications.index');
        } catch (Exception $error) {
            return redirect()->back()->with('warning', tr('Something went wrong'));
        }
    }
}
