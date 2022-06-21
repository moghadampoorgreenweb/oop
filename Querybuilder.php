<?php

namespace DB;

trait  Querybuilder
{

    protected $table;
    protected $column=[];

    public function selectall($column = null)
    {
        if (isset($column)) {
            $column_name = explode('.', $column);
            $out = "SELECT ";
            $out .= implode(' , ', $column_name);
            $out .= " FROM" . ' ' . $this->table;
            return $out;
        } else {
            $out = "SELECT ";
            $out .= "*";
            $out .= " FROM" . ' ' . $this->table;
            return $out;
        }
    }

    public function selectwhere($where = null)
    {
         $out =  $this->selectall();
         $oo=  str_replace(',','/',$where);
        preg_match('/(?<=(email\=))(\w+(@)\w+(.)\w+)/', $oo, $email);
      //  var_dump();
        preg_match('/(?<=(password\=))((\*)?[\/\][`?",.\'+-._*%\^\$#&\!@\(\)|0-9]*)/', $oo, $password);
        $out .= " WHERE  $email[1]'$email[0]'".' '." $password[1]'$password[0]'";
     var_dump($out);

   //  $out .= " WHERE ". implode(' AND ',$wheres);
//$params=explode('=',$out);
//var_dump($out);
   //  var_dump($out);
    }
}