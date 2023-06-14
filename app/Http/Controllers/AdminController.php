<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Appointment;
class AdminController extends Controller
{
    public function addview(){
        return view('admin.add_doctor');
    }
    public function upload(Request $request){
        $doctor=new doctor;
        $image=$request->file;
        $imagename=time().'.'.$image->getClientOriginalExtension();
         $request->file->move('doctorimage',$imagename);
        $doctor->image=$imagename;
        $doctor->name=$request->name;
        $doctor->phone=$request->number;
        $doctor->room=$request->room;
        $doctor->speciality=$request->speciality;
        $doctor->save();
        return redirect()->back()->with('message','Doctor added successfully');
    }
    public function showappointment(){
        $data=Appointment::all();
        return view('admin.showappointment',compact('data'));
    }
    public function approved($id){
        $data=Appointment::find($id);
        $data->status='Approved';
        $data->save();
        return redirect()->back();
    }
    public function canceled($id){
        $data=Appointment::find($id);
        $data->status='Canceled';
        $data->save();
        return redirect()->back();
    }
    public function showdoctor(){
        $data=doctor::all();
        return view('admin.showdoctor',compact('data'));
    }
    public function deletedoctor($id){
        $data=doctor::find($id);
        $data->delete();
        return redirect()->back();
    }
    public function updatedoctor($id){
        $data=Doctor::find($id);
        return view('admin.updatedoctor',compact('data'));
    }
    public function editdoctor(Request $request, $id){
        $doctor=Doctor::find($id);
        $doctor->name=$request->name;
        $doctor->phone=$request->number;
        $doctor->room=$request->room;
        $doctor->speciality=$request->speciality;
        $image=$request->file;
        if($image){
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->file->move('doctorimage',$imagename);
        $doctor->image=$imagename;
        }
        $doctor->save();
        return redirect()->back()->with('message','Doctor Updated successfully');

    }
}
