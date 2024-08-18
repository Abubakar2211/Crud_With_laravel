<?php

namespace App\Http\Controllers;
use App\Models\student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {
        $std = new student;
        $req->validate([
            "name"=>"required",
            "email"=>"required",
            "password"=>"required",
        ]);
        $std->name = $req->name;
        $std->email = $req->email;
        $std->password = $req->password;



        if($req->hasFile('image')){
            $image = $req->file('image');
            $imgname = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/admin'), $imgname);
            $std->image = $imgname;
        }

        $std->save();
        return redirect("view");
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $std['student'] = Student::all();
        return view("view", $std);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
    }
}
