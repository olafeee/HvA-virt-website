<?php

/**
* 
*/
class Database1 extends PDO
{
	
	public function __construct()
	{
		parent::__construct(DB_TYPE.':host='.DB_HOST1.';port=3307;dbname='.DB_NAME1, DB_USER1, DB_PASS1);
	}

	public function select($sql, $array, $fetchMode = PDO::FETCH_ASSOC)
    {
        $sth = $this->prepare($sql);
        foreach ($array as $key => $value) {
            $sth->bindValue("$key", $value);
        }
        
        $sth->execute();
        return $sth->fetchAll($fetchMode);
    }

	public function selectAll($sql, $fetchMode = PDO::FETCH_ASSOC)
    {
        $sth = $this->prepare($sql);
        
        $sth->execute();
        return $sth->fetchAll($fetchMode);
    }
    /**
     * update
     * @param string $table A name of table to insert into
     * @param string $data An associative array
     * @param string $where the WHERE query part
     */
    public function update($table, $data, $where)
    {
        ksort($data);
        print_r($data);
        $fieldDetails = NULL;
        foreach($data as $key=> $value) {
            $fieldDetails .= "`$key`=:$key,";
        }
        $fieldDetails = rtrim($fieldDetails, ',');
        print_r($fieldDetails);
        $sth = $this->prepare("UPDATE $table SET $fieldDetails WHERE $where");
        
        foreach ($data as $key => $value) {
            $sth->bindValue(":$key", $value);
        }
        echo"<br/>";
        print_r($sth);
        $sth->execute();
           echo"<br/>";
        print_r($sth);     
    }

    public function updateGI($adstr, $adzip, $adcit, $CSID){
        $sth = $this->prepare("UPDATE  `user_db_plaintech`.`CSUsers` 
                                SET  `adstr` =  '$adstr', `adzip` =  '$adzip', `adcit` =  '$adcit' 
                                WHERE  `CSUsers`.`CSID` =  '$CSID';");   
        return $sth->execute();
    }

    public function insert($table, $data)
    {
        ksort($data);
        
        $fieldNames = implode('`, `', array_keys($data));
        $fieldValues = ':' . implode(', :', array_keys($data));
        
        $sth = $this->prepare("INSERT INTO $table (`$fieldNames`) VALUES ($fieldValues)");
        
        foreach ($data as $key => $value) {
            $sth->bindValue(":$key", $value);
        }
        
        $sth->execute();
    }

    public function insertRole($role_id, $CSID)
    {
        $sth = $this->prepare("INSERT INTO `user_db_plaintech`.`privileges` (`rol_id`, `CSID`) VALUES ('$role_id', '$CSID') ");   
        return $sth->execute();
    }

    public function delete($role_id, $CSID)
    {
        return $this->exec("DELETE FROM `user_db_plaintech`.`privileges` WHERE `privileges`.`rol_id` = '$role_id' AND `privileges`.`CSID` = '$CSID'");
    }

    public function INU($CSID, $PArray){
        $data = $PArray;
        ksort($data);
        print_r($data);
        echo"<br/><br/>";
        $this->beginTransaction();
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sth = $this->prepare(" INSERT INTO `user_db_plaintech`.`privileges` (`rol_id`, `CSID`) 
                                VALUES ('7','$CSID')");
        $fieldNames = implode('`, `', array_keys($data));
        $fieldValues = ':' . implode(', :', array_keys($data));
        
        $sth1 = $this->prepare("INSERT INTO `user_db_plaintech`.`CSUsers` (`$fieldNames`) VALUES ($fieldValues)");
        
        foreach ($data as $key => $value) {
            $sth1->bindValue(":$key", $value);
        }

        $sth1->execute();        
        $sth->execute();
        $this->commit();
        return TRUE;
       
    }

    public function IOU($CSID, $data){
        ksort($data);
        $this->beginTransaction();
        $fieldNames = implode('`, `', array_keys($data));
        $fieldValues = ':' . implode(', :', array_keys($data));

        $sth = $this->prepare(" INSERT INTO `user_db_plaintech`.`privileges` (`rol_id`, `CSID`) 
                                VALUES ('7','$CSID')");
        
        $sth1 = $this->prepare("INSERT INTO `user_db_plaintech`.`CSUsers` (`$fieldNames`) VALUES ($fieldValues)");
        
        foreach ($data as $key => $value) {
            $sth1->bindValue(":$key", $value);
        }

        $sth1->execute();        
        $sth->execute();
        $this->commit();
       
    }




}// einde class

?>