<?php
//crud ->create/read(dánhachs/chi tiết)/Update/Delete

if (!function_exists('get_str_keys')) {
    function get_str_keys($data)
    {
        $keys = array_keys($data);            // trả về một mảng chứa tất cả các khóa từ mảng được cung cấp
        return implode(',', $keys);      //được sử dụng để chuyển đổi mảng các khóa thành một chuỗi duy nhất, các phần tử trong chuỗi được ngăn cách bằng dấu phẩy (,).
    }
}
if (!function_exists('get_virtual_params')) {
    function get_virtual_params($data)
    {
        $keys = array_keys($data);

        foreach ($keys as $keyz => $key) {
            $tmp[] = ":$key";
        }
        return implode(',', $tmp);
    }
}

if (!function_exists('get_set_params')) {
    function get_set_params($data)
    {
        $keys = array_keys($data);
        $tmp = [];
        foreach ($keys as $key) {
            $tmp[] = "$key = :$key";
        }
        return implode(',', $tmp);
    }
}


if (!function_exists('insert')) {
    function insert($tableName, $data = [])
    {
        try {
            $strKeys = get_str_keys($data);

            $virtual_params = get_virtual_params($data);

            $sql = "INSERT INTO $tableName($strKeys) VALUES ($virtual_params)";

            $stmt = $GLOBALS['conn']->prepare($sql);

            foreach ($data as $fielName => &$value) {
                echo $value;
                $stmt->bindParam(":$fielName", $value);
            }
            $stmt->execute();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}




if (!function_exists('listAll')) {
    function listAll($tableName)
    {
        try {

            $sql = "SELECT * FROM $tableName";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}



if (!function_exists('showOne')) {
    function showOne($tableName, $id)
    {
        try {

            $sql = "SELECT * FROM $tableName WHERE id = :id LIMIT 1";

            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}


if (!function_exists('update')) {
    function update($tableName, $id, $data = [])
    {
        try {
            $setParams = get_set_params($data);
          
            $sql = "
            UPDATE $tableName
            SET $setParams 
            WHERE id = :id
            ";

            debug($sql);

            $stmt = $GLOBALS['conn']->prepare($sql);
            foreach ($data as $fielName => &$value) {
                $stmt->bindParam(":$fielName", $value);
            }

            $stmt->bindParam(":id", $id);

            $stmt->execute();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('delete')) {
    function delete($tableName, $id,)
    {
        try {
        
            $sql = "
            DELETE FROM $tableName
            WHERE id = :id
            ";

            debug($sql);

            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}


