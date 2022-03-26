<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectFormRequest;
use App\Models\Member;
use App\Models\Project;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request){
        $projects = Project::all();
        return view('admin.projectd.index' , compact('projects'));
    }

    public function remove($id){
        
        
        
        $members = Member::where('project_id', $id)->get();
        foreach ($members as $key =>$item){
            $item->delete();
        }
        
        Project::destroy($id);
        return redirect()->back();
    }
    public function editForm($id){
        $projects = Project::find($id);
        if(!$projects){
            return redirect()->back();
        }
        return view('admin.projectd.edit-form', compact('projects'));
    }
    public function saveEdit($id, ProjectFormRequest $request){
        $model = Project::find($id);
        if(!$model){
            return redirect(route('plane.index'));
        }
        $model->fill($request->all());
        
        
        if($request->hasFile('file_upload')){
            $newFileName = uniqid(). '-'.$request->file_upload->getClientOriginalName();
            $path = $request->file_upload->storeAs('public/uploads/brands', $newFileName);
            $model->logo = str_replace('public/','',$path);
        }
        $model->save();
        return redirect(route('plane.index')); 
    }
    public function addForm(){
        $projects = Project::all();
        return view('admin.projectd.add-form', compact('projects'));
    }
    public function saveAdd(ProjectFormRequest $request){
        $model = new Project();
        
        $model->fill($request->all());
        if($request->hasFile('file_upload')){
            $newFileName = uniqid(). '-'.$request->file_upload->getClientOriginalName();
            $path = $request->file_upload->storeAs('public/uploads/brands', $newFileName);
            $model->logo = str_replace('public/','',$path);
        }
        $model->save();
        
        return redirect(route('plane.index'));
    }
}
