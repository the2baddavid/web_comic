<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class DB_OBJECT
{
    private $server,$db,$uname,$upass,$link,$last_result;
    
    public function __construct($var1,$var2,$var3,$var4)
    {
       $this->server = $var1;
       $this->db = $var2;
       $this->uname = $var3;
       $this->upass = $var4;
       
       $this->link = mysql_connect($this->server,$this->uname,$this->upass);
       mysql_select_db($this->db);
    }
    
    public function __destruct()
    {
        mysql_close($this->link);
        $this->link=null;
    }
    
    public function query($query)
    {
        $this->last_result = mysql_query($query);
    }
    
    public function getRowSock()
    {
        return mysql_fetch_assoc($this->last_result);
    }
    
    public function getAllRowsSock()
    {
        $my_array = array();
        foreach($this->last_result as $temp)
        {
            array_push($temp,$my_array);
        }
        return $my_array;
    }
}
?>

