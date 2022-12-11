<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::latest()->paginate(5);
        return view('students.index',compact('students'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nrp'  => 'required',
            'nama' => 'required',
            'email' => 'required',
            'jurusan' => 'required',
            'angkatan' => 'required',
            'foto' => 'required',
        ]);
        //store foto to storage/app/public/foto
        $nama_file = $request->file('foto')->store('foto', 'public');
        
        Student::create([
            'nrp' => $request->nrp,
            'nama' => $request->nama,
            'email' => $request->email,
            'jurusan' => $request->jurusan,
            'angkatan' => $request->angkatan,
            'foto' => $nama_file,
        ]);

        return redirect()->route('students.index')
            ->with('success','Student created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return view('students.show',compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('students.edit',compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'nrp'  => 'required',
            'nama' => 'required',
            'email' => 'required',
            'jurusan' => 'required',
            'angkatan' => 'required',
            'foto' => 'required',
        ]);
        $student->update($request->all());
        return redirect()->route('students.index')
                        ->with('success','Student updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        Storage::disk('public')->delete($student->foto);
        $student->delete();

        return redirect()->route('students.index')
        ->with('success','Student deleted successfully');
    }

    public function find(Request $request)
    {
        $request->validate([
            'keyword' => 'required',
        ]);
        //use like
        $students = Student::where('nama', 'like', '%'.$request->keyowrd.'%')->paginate(5);
        if ($students) {
            return view('students.index',compact('students'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
        } else {
            return redirect()->route('students.index')
            ->with('error','Student not found');
        }
    }
}
