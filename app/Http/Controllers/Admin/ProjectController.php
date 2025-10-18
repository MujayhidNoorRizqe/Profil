<?php
// app/Http/Controllers/Admin/ProjectController.php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller {
    public function index() {
        $projects = Project::latest()->paginate(10);
        return view('admin.projects.index', compact('projects'));
    }

    public function create() {
        return view('admin.projects.create');
    }

    public function store(Request $request) {
        $request->validate(['title'=>'required','description'=>'nullable']);
        Project::create($request->all());
        return redirect()->route('admin.projects.index')->with('success','Project berhasil dibuat.');
    }

    public function edit(Project $project) {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project) {
        $request->validate(['title'=>'required','description'=>'nullable']);
        $project->update($request->all());
        return redirect()->route('admin.projects.index')->with('success','Project berhasil diupdate.');
    }

    public function destroy(Project $project) {
        $project->delete();
        return redirect()->route('admin.projects.index')->with('success','Project berhasil dihapus.');
    }
}