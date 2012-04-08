<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class DB_OBJECT
{
    private $server,$db,$uname,$upass,$link,$last_result;
    
    /**
     *  Creates Object for working with database.
     *  When using query functions, you will need to pass it
     * @param type $var1    server or 'localhost'
     * @param type $var2    database name
     * @param type $var3    db username
     * @param type $var4    db password
     */
    public function __construct($var1,$var2,$var3,$var4)
    {
       $this->server = $var1;
       $this->db = $var2;
       $this->uname = $var3;
       $this->upass = $var4;
       
       $this->link = mysql_connect($this->server,$this->uname,$this->upass);
       mysql_select_db($this->db);
    }
    
    /**
     *  Closes the database and unsets its link 
     */
    public function __destruct()
    {
        mysql_close($this->link);
        $this->link=null;
    }
    
    /**
     *  Use this for querying the database
     * @param type $query string of the query to call
     */
    public function query($query)
    {
        $this->last_result = mysql_query($query);
    }
    
    /**
     *  Returns 1 row as an associative array from the query
     * @return type Sock Array with Query Result
     */
    public function getRowSock()
    {
        return mysql_fetch_assoc($this->last_result);
    }
    
    /**
     *  Returns All rows from Query Result as Sock Array
     * @return array Numbered Sock Array with Query Result
     */
    public function getAllRowsSock()
    {
        $my_array = array();
        foreach($this->last_result as $temp)
        {
            $pushme = mysql_fetch_assoc($temp);
            array_push($pushme,$my_array);
        }
        return $my_array;
    }
}
?>

