<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\ProjectResource;
use App\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    public function index()
    {
        $collection = null;

        switch (user()->type) {
            case 'super_administrator':
                $collection = Project::paginate(50);
                break;
            case 'administrator':
                $collection = Project::whereFolderId(user()->folder_id)->paginate(50);
                break;
            case 'standard':
                $collection = Project::whereUserId(user()->uuid)->paginate(50);
                break;
        }
        return response()->json(new ProjectResource($collection), 200);
    }

    /**
     * @param Request $request
     * @param Project $project
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(Request $request, Project $project)
    {
        $this->authorize('update', $project);

    }

    public function destroy(Request $request)
    {
        //$this->authorize('delete', $request);
    }
}
