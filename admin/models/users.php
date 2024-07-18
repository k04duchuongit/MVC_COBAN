<?php

if (!function_exists('checkUniqueEmail')) {
    function checkUniqueEmail($tableName, $email)
    {
        try {

            $sql = "SELECT * FROM $tableName WHERE email = :email";

            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            $data = $stmt->fetch();
            return !empty($data) ? true : false;
        } catch (\Exception $e) {
            debug($e);
        }
    }
}


if (!function_exists('checkUniqueEmailUpdate')) {
    function checkUniqueEmailUpdate($tableName,$id, $email)
    {
        try {

            $sql = "SELECT * FROM $tableName WHERE email = :email and id <> :id";

            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            $data = $stmt->fetch();
            return !empty($data) ? true : false;
        } catch (\Exception $e) {
            debug($e);
        }
    }
}
