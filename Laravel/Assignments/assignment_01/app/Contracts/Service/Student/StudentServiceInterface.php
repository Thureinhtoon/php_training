<?php
namespace App\Contracts\Service\Student;

use Illuminate\Http\Request;

interface StudentServiceInterface {
    public function storeStudent(Request $request);

    public function updateStudent(Request $request, $id);

    public function destroyStudent($id);

    public function getStudents(Request $request);

    public function studentList();
}