 <?php

    function getAllUser()
    {
        try {
            $sql = 'SELECT * FROM users';
            $stmt = $GLOBALS['conn']->prepare($sql);  // su dung bien global
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }
    }


    function getUserByID($id)
    {
        try {
            $sql = 'SELECT * FROM users WHERE id = :id';
            $stmt = $GLOBALS['conn']->prepare($sql);  // su dung bien global
           $stmt -> bindParam(':id',$id); //chống sql enjection
            $stmt->execute();
            return $stmt->fetch();
        } catch (\Exception $e) {
            debug($e);
        }
    }
