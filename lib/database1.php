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

}// einde class

?>