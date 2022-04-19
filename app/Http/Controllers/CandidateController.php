<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Candidate;
use Illuminate\Support\Facades\Validator;
class CandidateController extends Controller
{

    public function addCandidate(){
        return view('add-candidate');
    }

    public function getAllCandidate(){

       // $data = Candidate::orderBy('id','DESC')->get();
        $data = Candidate::orderBy('id','DESC')->simplePaginate(5);
        //var_dump($data);
        return view('candidates', compact('data'));

    }
    public function getCandidateById($id){

         $data = Candidate::where('id',$id);

         return view('single-candidate', compact('data'));

     }

    public function saveCandidate(Request $request){


        $candidate = new Candidate();
        $validatedData = $request->validate([
            'name'  => 'required',
            'email' => 'required|unique:candidates|max:255',
            'phone' => 'required|max:12',
            'address' => 'required',
            'dob'   => 'required',
            'file'  => 'required|mimes:pdf,xlx,csv|max:2048'
          ]);
        $candidate->name = $request->name;
        $candidate->email = $request->email;
        $candidate->phone = $request->phone;
        $candidate->address = $request->address;
        $candidate->dob = \Carbon\Carbon::createFromFormat('m/d/Y', $request->dob)->format('Y-m-d');

        $fileName = $request->file->getClientOriginalName();
        $request->file->move(public_path('uploads'), $fileName);
        $candidate->docname = $fileName;
        $candidate->save();
        return back()->with('data_saved', 'Details added successfully');
    }

    public function editCandidate($id){

        $data = Candidate::find($id);
        return view('edit-candidate', compact('data'));

    }

    public function deleteCandidate($id){

        $data = Candidate::where('id',$id)->delete();

        return back()->with('data_deleted', 'Candidate details removed successfully');

    }

    public function updateCandidate(Request $request){
        $validatedData = $request->validate([
            'name'  => 'required',
            'email' => 'required|max:255',
            'phone' => 'required|max:12',
            'address' => 'required',
            'dob'   => 'required',

          ]);

        $data = Candidate::find($request->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;
        $data->dob = \Carbon\Carbon::createFromFormat('m/d/Y', $request->dob)->format('Y-m-d');
        if( $f1  = $request->file('file')){
        $request->validate([
            'file' => 'required|mimes:pdf,xlx,csv|max:2048',
        ]);
        $fileName = $request->file->getClientOriginalName();
        $request->file->move(public_path('uploads'), $fileName);
        $data->docname = $fileName;
        }
        else{
            unset($request->file);
        }
        $data->save();
        return back()->with('data_updated', 'Changes saved successfully');

    }

}
