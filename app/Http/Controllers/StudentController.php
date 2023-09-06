<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\Student;

class StudentController extends Controller
{
    /**
     * @OA\Post(
     *     path="/api/students",
     *     security={{ "auth_basic": {} }},
     *     tags={"Students"},
     *     summary="Create a student and return an id",
     *     description="Create a student",
     *     @OA\RequestBody(
     *      description="Student object that needs to be added to the store",
     *      required=true,
     *     @OA\JsonContent(
     *         @OA\Property(property="name", type="string", example="John"),
     *         @OA\Property(property="surname", type="string", example="Doe"),
     *         @OA\Property(property="age", type="integer", example="20"),
     *         @OA\Property(property="email", type="string", example="marc@gmail.com"),
     *         @OA\Property(property="phone", type="string", example="698765432"),
     *         @OA\Property(property="address", type="string", example="Yaounde"),
     *     ),
     *    ),
     *      @OA\Response(
     *         response=201,
     *         description="Successfull Operation"
     *      ),
     *      @OA\Response(
     *         response=422,
     *         description="Invalid input"
     *      ),
     *      @OA\Response(
     *         response=401,
     *         description="Unauthorized"
     *     )
     * )
     *
     */
    public function store(StudentRequest $request)
    {
        $student = Student::create($request->validated());
        return response()->json([
            "message" => "Student created successfully",
            "matricule" => $student->id,
        ], 201);
    }

    /**
     * @OA\Get(
     *      path="/api/students",
     *      security={{ "auth_basic": {} }},
     *      tags={"Students"},
     *      summary="Get list of students",
     *      description="Returns list of students",
     *      @OA\Response(
     *          response=200,
     *          description="Successfull Operation"
     *       ),
     *       @OA\Response(
     *          response=401,
     *          description="Unauthorized"
     *      )
     *     )
     *
     * Returns list of students
     */
    public function index()
    {
        return response()->json(Student::all());
    }


    /**
     * @OA\Get(
     *     path="/api/students/{student}",
     *     tags={"Students"},
     *     security={{ "auth_basic": {} }},
     *     summary="Get a student by id",
     *     description="Returns a single student",
     *     @OA\Parameter(
     *     name="student",
     *     in="path",
     *     description="id of student to return",
     *     required=true,
     *  ),
     *      @OA\Response(
     *      response=200,
     *      description="Successfull Operation"
     *  ),
     *      @OA\Response(
     *      response=404,
     *      description="Student Not Found"
     *  ),
     * )
     */

    public function show(string $student)
    {
        $student = Student::find($student);
        if($student == null){
            return response()->json([
                "message" => "Student not found"
            ], 404);
        }
        return response()->json($student);
    }
}
