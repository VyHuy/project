<?php

namespace App\Http\Controllers;

use App\Http\Requests\MemberFormRequest;
use App\Models\Member;
use App\Models\Project;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index(Request $request){
        
        // 1. dựa vào model Product lấy toàn bộ data trong db
        $members = Member::all();
        return view('admin.member.index' , compact('members'));
        }

        
        public function remove($id){
            Member::destroy($id);
            return redirect()->back();
        }

        public function editForm($id){
            $members = Member::find($id);
            if(!$members){
                return redirect()->back();
            }
            $projects = Project::all();
            return view('admin.member.edit-form', compact('members', 'projects'));
        }
        public function saveEdit($id, MemberFormRequest $request){
            $model = Member::find($id);
            if(!$model){
                return redirect(route('plane.index'));
            }
            $model->fill($request->all());
            if($request->hasFile('file_upload')){
                $newFileName = uniqid(). '-'.$request->file_upload->getClientOriginalName();
                $path = $request->file_upload->storeAs('public/uploads/smartphones', $newFileName);
                $model->avatar = str_replace('public/','',$path);
            }
            // lưu ảnh
            $model->save();
            return redirect(route('brand.index')); 
        }
        public function addForm(){
            $projects = Project::all();
            return view('admin.member.add-form', compact('projects'));
        }
        public function saveAdd(MemberFormRequest $request){
            $model = new Member();
            // gán giá trị cho các thuộc tính của object sử dụng massassign ($fillable trong model)
            $model->fill($request->all());
            if($request->hasFile('file_upload')){
                $newFileName = uniqid(). '-'.$request->file_upload->getClientOriginalName();
                $path = $request->file_upload->storeAs('public/uploads/smartphones', $newFileName);
                $model->avatar = str_replace('public/','',$path);
            }
            // lưu ảnh
            $model->save();
            return redirect(route('brand.index'));
        }
}
