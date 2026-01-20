<?php
require_once __DIR__ . '/../core/Auth.php';
require_once __DIR__ . '/../models/Grade.php';
require_once __DIR__ . '/../models/Course.php';

class GradeController
{
    private $gradeModel;
    private $courseModel;

    public function __construct()
    {
        $this->gradeModel = new Grade();
        $this->courseModel = new Course();
    }

    // Teacher: My Courses
    public function myCourses()
    {
        Auth::teacher();

        $teacher_id = $_SESSION['user']['id'];
        $courses = $this->courseModel->getByTeacher($teacher_id);

        require __DIR__ . '/../views/grades/my_courses.php';
    }

    // Teacher: Students in Course
    public function students($course_id)
    {
        Auth::teacher();

        $teacher_id = $_SESSION['user']['id'];

        // 🔒 Ensure course belongs to teacher
        if (!$this->courseModel->belongsToTeacher($course_id, $teacher_id)) {
            header("Location: /school_management/public/grades");
            exit;
        }

        $students = $this->gradeModel->getStudentsByCourse($course_id);

        require __DIR__ . '/../views/grades/students.php';
    }

    // Teacher: Save Grade
    public function save()
    {
        Auth::teacher();

        $teacher_id = $_SESSION['user']['id'];
        $course_id = $_POST['course_id'];

        // 🔒 Ensure course belongs to teacher
        if (!$this->courseModel->belongsToTeacher($course_id, $teacher_id)) {
            header("Location: /school_management/public/grades");
            exit;
        }

        $this->gradeModel->save(
            $_POST['student_id'],
            $course_id,
            $_POST['grade']
        );

        header("Location: /school_management/public/grades/course?course_id=" . $course_id);
        exit;
    }

}
