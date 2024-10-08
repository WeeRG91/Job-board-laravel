<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MyJobApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('my_job_application.index', [
            'applications' => auth()->user()->jobApplications()
                ->with([
                    'job' => fn($query) => $query->withCount('jobApplications')
                        ->withAvg('jobApplications', 'expected_salary')
                        ->withTrashed(), 
                    'job.employer',
                ])
                ->latest()->get(),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobApplication $myJobApplication)
    {
        $cv_path = $myJobApplication->cv_path;

         if ($cv_path && Storage::disk('private')->exists($cv_path)) {
            Storage::disk('private')->delete($cv_path);
        }

        $myJobApplication->delete();

        return redirect()->back()->with('success', 'Job application removed successfully.');
    }
}
