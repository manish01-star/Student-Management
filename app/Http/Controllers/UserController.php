<?php

namespace App\Http\Controllers;

use App\Models\Student;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Spatie\FlareClient\View;
use Symfony\Component\Console\Output\TrimmedBufferOutput;

class UserController extends Controller
{

    function index()
    {
        $student = Student::all();

        return view('index', ['student' => $student]);
    }

    function add()
    {
        return view('add');
    }

    function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'course' => 'required|string',
            'photo' => 'nullable|image',
        ]);

        $student = new Student();
        $student->name = $request->name;
        $student->email = $request->email;
        $student->course = $request->course;

        //photo upload logic
        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'),$fileName);
            $student->photo = $fileName;
        }

         $student->save();


        return Redirect('/')->with('success', 'Student Created Successfully!');
    }

    function edit($id)
    {
        $student = Student::findOrFail($id);
        return View('edit', ['student' => $student]);
    }

    function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);
        $student->update($request->all());

        return Redirect('/')->with('success', 'Student updated Successfully!');
    }

    function delete($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return Redirect('/')->with('success', 'Student Record Deleted Successfully!');
    }
}
