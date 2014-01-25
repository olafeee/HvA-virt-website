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
        
        $fieldDetails = NULL;
        foreach($data as $key=> $value) {
            $fieldDetails .= "`$key`=:$key,";
        }
        $fieldDetails = rtrim($fieldDetails, ',');
        
        $sth = $this->prepare("UPDATE $table SET $fieldDetails WHERE $where");
        
        foreach ($data as $key => $value) {
            $sth->bindValue(":$key", $value);
        }
        
        $sth->execute();
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

    public function INU($postArray, $loginArray){
        if($postArray['reseller'] == true){
            $reseller = TRUE;
        }else{
            $reseller = FALSE;
        }

        $this->beginTransaction();
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sth = $this->prepare(" INSERT INTO `user_db_plaintech`.`privileges` (`rol_id`, `CSID`) 
                                VALUES ('7', '$CSID')");
        $sth1 = $this->prepare("INSERT INTO `user_db_plaintech`.`CSUsers` 
                                            (`CSID`, `username`,`firstname`,`lastname`,`adstr`,`adzip`,`adcit`,`country`,`phone`,`reseller`) 
                                    VALUES (?,?,?,?,?,?,?,?,?,?)");
        $sth1->bind_param(   $loginArray['userid'],
                            $loginArray['username'],
                            $loginArray['firstname'],
                            $loginArray['lastname'],
                            $postArray['adstr'],
                            $postArray['adzip'],
                            $postArray['adcit'],
                            $postArray['country'],
                            $postArray['phone'],
                            $reseller
                            );
        $sth->execute();
        $sth1->execute();  
        $this->commit();
        return TRUE;
       
    }

    public function jan(){
        $this->beginTransaction();
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sth = $this->prepare(" INSERT INTO `user_db_plaintech`.`privileges` (`rol_id`, `CSID`) 
                                VALUES ('3', '1150da1b-6580-4321-954a-47ef7fc09372')");

        $sth1 = $this->prepare("INSERT INTO `user_db_plaintech`.`users` (`id`, `login`,`password`) 
                                    VALUES ('3', 'jan', 'kaas')");
        $sth->execute();
        $sth1->execute();  
        $this->commit();
        return "het werkt of niet";
    }




}// einde class

?>