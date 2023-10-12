<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    //
    public function index()
    {
        $employees=Employee::get();
        return view('index',compact('employees'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $employee=new Employee();
     
            if($request->file()) {
                $files= $request->file('proof');;
                $fileName = time().'_'.$files->getClientOriginalName();
                $files->move('assets/uploads',$fileName);
                $employee->proof= $fileName;
            }
    
        if($request->hasFile('image'))
        {
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $filename=time().'.'.$ext;
            $file->move('assets/employee',$filename);
            $employee->image=$filename;
        }

        $employee->name= $request->input('name');
        $employee->email= $request->input('email');
        $employee->address= $request->input('address');
        $employee->gender = $request->input('gender') == TRUE ? '1' : '2';
        $employee->position = $request->input('position');
        $employee->salary = $request->input('salary');
        $employee->number = $request->input('number');
        $employee->save();

        return redirect('index')->with('status','Employee Added Successfully');
    }

    public function download($id)
    {
        //   return $id;
        $data=Employee::where('id',$id)->first();
        // return $data->proof;
        $filepath=public_path('assets/uploads/'.$data->proof);
        // return $filepath;
        return Response::download($filepath);
    }

    public function edit($id)
    {
        $employee=Employee::where('id',$id)->first();
        return view('edit',compact('employee'));
    }


    public function update(Request $request, $id){
          
        // return $request;
     
        $employee = Employee::find($id);
   
        if($request->image != ''){        
             $path = public_path().'\assets\employee';
            //  return $path;
   
             //code for remove old file
             if($employee->image != ''  && $employee->image != null){
                  $file_old = $path.$employee->image;
                //   unlink($file_old);
                Storage::disk('public')->delete($file_old);

             }
   
             //upload new file
             $file = $request->image;
             $filename = $file->getClientOriginalName();
             $file->move($path, $filename);
   
             //for update in table
         $employee->update(['image' => $filename]);
        }
        
        if($request->proof != ''){        
            $path = public_path().'\assets\uploads';
           //  return $path;
  
            //code for remove old file
            if($employee->proof != ''  && $employee->proof != null){
                 $file_old = $path.$employee->proof;
               //   unlink($file_old);
               Storage::disk('public')->delete($file_old);

            }
  
            //upload new file
            $file = $request->proof;
            $filename = $file->getClientOriginalName();
            $file->move($path, $filename);
  
            //for update in table
            $employee->update(['proof' => $filename]);
       }
        $employee->name= $request->input('name');
        $employee->email= $request->input('email');
        $employee->address= $request->input('address');
        $employee->gender = $request->input('gender');
        $employee->position = $request->input('position');
        $employee->salary = $request->input('salary');
        $employee->number = $request->input('number');
        $employee->update();

        return redirect('index')->with('status','Employee Updated Successfully');
   }


   public function delete($id)
   {
      $employee = Employee::where('id',$id)->delete();
      return redirect('index')->with('status','Employee Deleted Successfully');
   }
}
