<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Validator;



class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Menampilkan semua data student
    $students = Student::all();
    
    // Cek apakah data student kosong
    if ($students->isEmpty()) {
        // Jika tidak ada student, kembalikan respons dengan status 404
        return response()->json([
            'message' => 'No students found'
        ], 404);
    }
    
    // Jika ada student, kembalikan data dengan status 200
    return response()->json([
        'message' => 'Success Showing All Students Data',
        'data' => $students
    ], 200);
    } 

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'nim' => 'numeric | required',
            'email' => 'email | required',
            'majority' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation errors',
                'errors' => $validator->errors()
            ], 422);
        }

        $student = Student::create($request->all());

        $data = [
            'message' => 'Student is created successfully',
            'data' => $request,
        ];

        return response()->json($data, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // cari id student yang ingin di dapatkan
        $student = Student::find($id);

        if ($student) {
            $data = [
                'message' => 'Get detail student',
                'data' => $student,
            ];

            // Mengembalikan data (json) dan kode 200
            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Student not found',
            ];

            //Mengembalikan data (json) dan kode 404
            return response()->json($data, 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Cari student berdasarkan ID
    $student = Student::find($id);

    if ($student) {
        
        $input = [
            'name' => $request->name ?? $student->name,
            'nim' => $request->nim ?? $student->nim,
            'email' => $request->email ?? $student->email,
            'majority' => $request->majority ?? $student->majority,
        ];

    // Update data student
    $student->update($input);

    $data = [
        'message' => 'Student is updated',
        'data' => $student
    ];

    // mengembalikan data (json) dan kode 200
    return response()->json($data, 200);
    } else {
        $data = [
            'message' => 'Student not found'
        ];

        return response()->json($data, 404);
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Cari student berdasarkan ID
    $student = Student::find($id);

    if ($student) {
        // Hapus student tersebut
        $student->delete();

        $data = [
            'message' => 'Student is deleted'
        ];

        // Mengembalikan data (json) dan kode 200
        return response()->json($data, 200);
    } else {
        $data = [
            'message' => 'Student not found'
        ];

        return response()->json($data, 404);
    }
    }
}
