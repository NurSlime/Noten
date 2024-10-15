<?php
require_once 'GradeModel.php';

session_start();

if (!isset($_SESSION['gradeModel'])) {
    $_SESSION['gradeModel'] = new GradeModel();
}

$gradeModel = $_SESSION['gradeModel'];
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add'])) {
        $studentName = htmlspecialchars($_POST['student']);
        $email = htmlspecialchars($_POST['email']);
        $subject = htmlspecialchars($_POST['subject']);
        $grade = htmlspecialchars($_POST['grade']);
        $examDate = htmlspecialchars($_POST['examDate']);

        if ($gradeModel->addGrade($studentName, $email, $subject, $grade, $examDate)) {
            $message = "Die eingegebenen Daten sind in Ordnung!";
        } else {
            $message = "Ungültige Note. Bitte eine Zahl zwischen 1 und 5 eingeben.";
        }
    } elseif (isset($_POST['delete'])) {
        $gradeModel->deleteGrades();
        $message = "Alle Noten wurden gelöscht.";
    }
}

$grades = $gradeModel->getGrades();

include 'view.php';
?>
