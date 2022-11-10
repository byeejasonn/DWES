<?php
    namespace Form;

    class StudentManager {
        private static $list = [];
        private static $instance;
        private $keys = ['name', 'surname', 'user', 'password', 'mail', 'phone', 'gender', 'birthdate', 'grade'];

        public static function singleton() {
            if(!isset(self::$instance)) {
                self::$instance = new \Form\StudentManager();
            }
            return self::$instance;
        }

        public function fetchStudents() {
            $students = @file_get_contents(
                "list.csv"
            );
            
            if ($students != false) {
                // Si recupera el archivo
                $students = explode("\n", $students);
                array_pop($students);

                foreach ($students as $student) {
                    $student = array_combine($this->keys, explode(',',$student));
                    self::$list[] = new \Form\Student($student);
                }
                // foreach ($aux as $student) {
                //     $student = explode(",", $student);
                //     // Hardcodear es mi pasión
                //     self::$list[] = new \Form\Student($student[0], $student[1], $student[2], $student[3], $student[4], $student[5], $student[6], $student[7], $student[8]);
                // }

            } else {
                // Si no existe el archivo, lo crea
                self::$list = file_put_contents("list.csv");    
            }

            return self::$list;
        }

        public function saveAlumnos(\Form\Student $student) {
            file_put_contents(
                "list.csv",
                $student->getName().",".
                $student->getSurname().",".
                $student->getUser().",".
                $student->getPassword().",".
                $student->getMail().",".
                $student->getPhone().",".
                $student->getGender().",".
                $student->getBirthdate().",".
                $student->getGrade()."\n",
                FILE_APPEND
            );
        }

        static function printList() {
            foreach (self::$list as $alumno) {
                echo @$alumno->__toString();
            }
        }
    }
?>