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
            'results' => $projects,
        ]);
    }
}
