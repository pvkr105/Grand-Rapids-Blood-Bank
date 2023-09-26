<?php
   class MyDB extends SQLite3
   {
      function __construct()
      {
         $this->open('donors.db');
      }
   }
   $db = new MyDB();
   if(!$db){
      echo $db->lastErrorMsg();
   } else {
      echo "Opened database successfully\n";
   }

   $sql =<<<EOF
      CREATE TABLE DONOR
      (name           TEXT    NOT NULL,
      email           TEXT    NOT NULL,
      phone            INT     NOT NULL,
      message        CHAR(100));
EOF;

   $ret = $db->exec($sql);
   if(!$ret){
      echo $db->lastErrorMsg();
   } else {
      echo "Table created successfully\n";
   }
   $db->close();
?>