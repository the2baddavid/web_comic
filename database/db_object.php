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
    public function __construct($server_name,$db_name,$user,$pass)
    {
       $this->server = $server_name;
       $this->db = $db_name;
       $this->uname = $user;
       $this->upass = $pass;
       
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
    
    public function getAllRowsNum()
    {        
        return  mysql_fetch_array($this->last_result,'MYSQL_NUM');       
    }
    
    /**
     *  Returns 1 row as an associative array from the query
     * @return type Sock Array with Query Result
     */
    public function getRowSock()
    {
        return mysql_fetch_row($this->last_result);
    }
    
    /**
     *  Returns All rows from Query Result as Sock Array
     * @return array Numbered Sock Array with Query Result
     */
    public function getAllRowsSock()
    {
        return mysql_fetch_array($this->last_result,'MYSQL_ASSOC');
    }
}
?>

