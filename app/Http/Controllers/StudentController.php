<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Validator;

class StudentController extends Controller

//Get All the Data from Table
{
    function getData(){
        return Student::with('university')->get();
    }



    //Get A Single User
    function getSingleStudent($id)
    {
        $data =  Student::find($id)->getUniversity;
        if($data){
            return response()->json([$data], 200);
        }
        else{
            return response()->json(["message"=>"Student Not Found"], 404);
        }

    }


     
    //Adding Data to Database
    function addStudent(Request $req)
    {

        $rules = array(
            'name'=>'required',
            'father_name'=> 'required',
            'fees'=> 'required'
        );

        $validator = Validator::make($req->all(),$rules);
        if($validator->fails())
            {
                return response()->json($validator->errors(),400);
             
            }
        else{
            $student = new Student;
            $student->name=$req->name;
            $student->father_name=$req->father_name;
            $student->fees=$req->fees;
            $student->save();
    
            if($student){
                return 
                [

                    "result"=>"Data Added To Database",
                    "data"=> $student
                ];
            }
            else{
                return ["Result"=>"Not Updated Error Occured"];
            }
        }

    }


    //Update Data
    function updateStudentData(Request $req, $id){

        $student =  Student::find($id);
        if($student){
            $student->name = $req->name;
            $student->father_name = $req->father_name;
            $student->fees = $req->fees;
            $student->save();
    
            if($student){
                return ["Result"=> "Student Record Updated","Updated Record"=>$student];
            }
            else{
               return ["Result"=> "Error Occured while Upating the Data"];
            }
        }
        else{
            return response()->json(["Result"=> "User Not Found"]);
        }
   }


    //Delete Student
    function deleteStudent($id) 
    {
        $student =  Student::find($id);
        if($student){
            $student->delete();
            if($student){
                return ["Result"=> "Data Deleted"];
            }
            else{
                return ["Result"=> "Error Occured"];
            }
        }
        else{
            return ["result" => "No Such Student Found"];
        }
    }


}
