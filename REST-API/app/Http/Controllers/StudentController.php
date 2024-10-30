<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // variable menampung fungsi untuk menampilkan semua data
        $students = Student::all();
        
        // menampung hasil data dan pesan
        $response = [
            'message' => 'Success Showing All Students Data',
            'data' => $students
        ];

        return response()->json($response, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = [
            'name' => $request->name,
            'nim' => $request->nim,
            'email' => $request->email,
            'majority' => $request->majority
           ];
    
           $students = Student::create($input);
    
           $response = [
            'message' => 'Successfully create new student',
            'data' => $students
           ];
           
           return response()->json($response, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Cari student berdasarkan ID
    $student = Student::find($id);

    if (!$student) {
        return response()->json(['message' => 'Student not found'], 404);
    }

    // Update data student
    $student->update($request->only(['name', 'nim', 'email', 'majority']));

    $response = [
        'message' => 'Successfully updated student',
        'data' => $student
    ];

    return response()->json($response, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Cari student berdasarkan ID
    $student = Student::find($id);

    if (!$student) {
        return response()->json(['message' => 'Student not found'], 404);
    }

    // Hapus data student
    $student->delete();

    $response = [
        'message' => 'Successfully deleted student',
        'data' => $student
    ];

    return response()->json($response, 200);
    }
}
