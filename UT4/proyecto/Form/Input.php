<?php
    namespace Form;

    class Input {
        // [type=text]
        public const NAME = "/^[a-zA-ZÀ-ÿ\s]{2,25}$/";
        public const SURNAME = "/^[a-zA-ZÀ-ÿ\s]{2,25}$/";
        private const USER = "/^[a-zA-Z0-9]{3,15}$/";
        // [type=password]
        private const PASSWORD = "/^[\w]{8,64}$/";
        // [type=mail]
        private const MAIL = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";
        // [type=number]
        private const PHONE = "/^[69]{1}[0-9]{8}$/";
        //[type=date]
        private static $MIN_EDAD = 16;
        //[type=radio]
        private static $GENDERS = ["Hombre", "Mujer", "Todos los dias"];
        //[select]
        private static $GRADES = ["SMR", "DAW", "DAM", "ASIR"];

        // Array de errores
        private static $errors = [];

        private static function cleanData(mixed $data): mixed {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data, ENT_QUOTES, "UTF-8");

            return $data;
        }

        public static function clearName(string $data) {
            $data = self::cleanData($data);

            if (!empty($data)) {
                if (!preg_match(self::NAME, $data)) {
                    self::$errors["name"] = "El nombre tiene que tener de 2 a 25 caracteres";
                }
            } else {
                self::$errors["name"] = "El nombre no puede estar vacío";
            }
            
            return $data;
        }

        public static function clearSurname(string $data) {
            $data = self::cleanData($data);

            if (!empty($data)) {
                if (!preg_match(self::SURNAME, $data)) {
                    self::$errors["name"] = "Los apellidos tienen que tener de 2 a 25 caracteres";
                }
            } else {
                self::$errors["name"] = "Los apellidos no pueden estar vacíos";
            }
            
            return $data;
        }

        public static function clearUser(string $data) {
            $data = self::cleanData($data);

            if (!empty($data)) {
                if (!preg_match(self::USER, $data)) {
                    self::$errors["user"] = "El usuario tiene que tener de 3 a 15 caracteres";
                }
            } else {
                self::$errors["user"] = "El usuario no puede estar vacío";
            }

            return $data;
        }

        public static function clearPassword(string $data) {
            $data = self::cleanData($data);

            if (!empty($data)) {
                if (!preg_match(self::PASSWORD, $data)) {
                    self::$errors["password"] = "La contraseña tiene que tener como mínimo 8 caracteres y máximo 64";
                }
            } else {
                self::$errors["password"] = "La contraseña no puede estar vacía";
            }

            return password_hash($data, PASSWORD_DEFAULT);
        }

        public static function clearMail(string $data) {
            $data = self::cleanData($data);

            if (!empty($data)) {
                if (!preg_match(self::MAIL, $data)) {
                    self::$errors["mail"] = "El correo introducido no es un correo válido";
                }
            } else {
                self::$errors["mail"] = "El correo no puede estar vacío";
            }
            
            return $data;
        }

        public static function clearPhone(string $data) {
            $data = self::cleanData($data);

            if (!empty($data)) {
                if (!preg_match(self::PHONE, $data)) {
                    self::$errors["phone"] = "No es un teléfono válido";
                }
            } else {
                self::$errors["phone"] = "El teléfono no puede estar vacío";
            }

            return $data;
        }

        public static function clearDate(string $data) {
            if (!empty($data)) {
                // La fecha de hoy
                $sysdate = new \DateTime('now');
                $sysdate->format('Y-m-d');
    
                // Diferencia entre ambas fechas
                $diff = $sysdate->diff(new \DateTime($data));

                if ($data > $sysdate || $diff->y < self::$MIN_EDAD) {
                    self::$errors["birthdate"] = "El alumno tiene que ser mayor de " . self::$MIN_EDAD . " años";
                }
            } else {
                self::$errors["birthdate"] = "El cumpleaños no puede estar vacío";
            }

            return $data;
        }

        public static function clearRadio($data) {
            if (!in_array($data, self::$GENDERS)) {
                self::$errors["gender"] = "Sexo inválido";
            }

            return $data;
        }

        public static function clearSelect($data) {
            if (!in_array($data, self::$GRADES)) {
                self::$errors["grade"] = "Ciclo inválido";
            }

            return $data;
        }

        public static function getErrors() {
            return self::$errors;
        }

        public static function getGenders() {
            return self::$GENDERS;
        }

        public static function getGrades() {
            return self::$GRADES;
        }
    }
?>