<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {

        // Caricamento con categorie e tags
        // $posts = Post::with('category', 'tags')->get();

        // $projects = Project::all();
        $projects = Project::with('type', 'technologies')->get();

        return response()->json([
            'success' => true,
            'results' => $projects,
        ]);
    }

    public function show($slug)
    {
        $project = Project::with('type', 'technologies')->where('slug', $slug)->first();
        // dd($project);

        if ($project) {
            return response()->json([
                'success' => true,
                'project' => $project,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'error' => 'nessun project trovato',
            ]);
        }
    }
}
