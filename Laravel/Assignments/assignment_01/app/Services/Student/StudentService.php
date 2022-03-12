<?php 

namespace App\Services\Student;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Contracts\Dao\Student\StudentDaoInterface;
use App\Contracts\Service\Student\StudentServiceInterface;

class StudentService implements StudentServiceInterface {

    private $studentDaoInterface;

    public function __construct(StudentDaoInterface $studentDaoInterface)
    {
        $this->studentDaoInterface = $studentDaoInterface;
    }

    public function storeStudent(Request $request){
        return $this->studentDaoInterface->storeStudent($request);
    }

    public function updateStudent(Request $request, $id){
        return $this->studentDaoInterface->updateStudent($request,$id);
    }

    public function destroyStudent($id){
        return $this->studentDaoInterface->destroyStudent($id);
    }

    public function getStudents(Request $request)
    {
        return $this->studentDaoInterface->getStudents($request);
    }

    public function studentList()
    {
        return $this->studentDaoInterface->studentList();
    }

    public function majorCreate(){
        return $this->studentDaoInterface->majorCreate();
    }

    public function findStudent($id){
        return $this->studentDaoInterface->findStudent($id);
    }

    public function sendCreateMail($email)
    {
        $details = [
                    'title' => 'Mail from BIB Company',
                    'body' => 'Your data is created successfully'
                ];
               
                Mail::to("$email")->send(new \App\Mail\CreateMail($details));
    }

    public function sendDeleteMail($email)
    {
        $details = [
            'title' => 'Mail from BIB Company',
            'body' => 'Your data is deleted successfully'
        ];
       
        Mail::to("$email")->send(new \App\Mail\DeleteMail($details));
    }
}