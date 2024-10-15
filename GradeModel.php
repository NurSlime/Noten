<?php

class GradeModel {
    private $grades = [];

    public function addGrade($studentName, $email, $subject, $grade, $examDate) {
        if ($this->validateGrade($grade)) {
            $this->grades[] = [
                'student' => $studentName,
                'email' => $email,
                'subject' => $subject,
                'grade' => $grade,
                'examDate' => $examDate
            ];
            return true;
        }
        return false;
    }

    public function getGrades() {
        return $this->grades;
    }

    public function deleteGrades() {
        $this->grades = [];
    }

    private function validateGrade($grade) {
        return is_numeric($grade) && $grade >= 1 && $grade <= 5;
    }
}
?>
