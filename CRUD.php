<?php

  class CRUD {

    /* Connection to the db */
    private $con = null;

    /* Query generator */
    private $queryBuilder = "";

    public function __construct($server, $username, $password, $database)
    {

      $this->con = mysqli_connect($server, $username, $password, $database);

      if(!$this->con)
        throw new Exception("Error Processing Request. Connection to database failed.");
    }

    public function getQuery()
    {
      return $this->queryBuilder;
    }


    public function getConnection()
    {
       return $this->con;
    }

    /* Function to insert data */
    public function insert($tableName, $columnNames, $values)
    {
      if(!is_array($columnNames))
      {
        throw new Exception("Second argument of function 'insert' must be an array");
      }

      if(!is_array($values))
      {
        throw new Exception("Third argument of function 'insert' must be an array");
      }

      $this->queryBuilder .= "INSERT INTO " . $tableName . "(";
      for ( $i = 0; $i < count($columnNames); $i++ ) {
        $this->queryBuilder .=  ( $i == count($columnNames) - 1 ) ? $columnNames[$i] . ") VALUES ('" : $columnNames[$i] . ", ";
      }

      for ( $i = 0; $i < count($values); $i++ ) {
        $this->queryBuilder .=  ( $i == count($values) - 1) ? $values[$i] . "')"  : $values[$i] . "', '";
      }

      mysqli_query($this->con, $this->queryBuilder)or die(mysqli_error($this->con));

      $this->queryBuilder = "";
    }

    /* Function to update data */
    /* NOTE: first value of second parameter is a PK column */
    /* NOTE: first value of third parameter is a PK value */
    public function update($tableName, $columnNames, $values)
    {
      if(!is_array($columnNames))
      {
        throw new Exception("Second argument of function 'update' must be an array");
      }

      if(!is_array($values))
      {
        throw new Exception("Third argument of function 'update' must be an array");
      }

      $this->queryBuilder .= "UPDATE " . $tableName . " SET ";
      for ( $i = 1; $i < count($columnNames); $i++ ) {
        $this->queryBuilder .= ( $i == count($columnNames) - 1 ) ? $columnNames[$i] . " = '" . $values[$i] . "' WHERE " . $columnNames[0] . " = " . $values[0] :  $columnNames[$i] . " = '" . $values[$i] . "', ";
      }
      mysqli_query($this->con, $this->queryBuilder)or die(mysqli_error($this->con));
      
      //$this->queryBuilder = "";
    }

    /* NOTE: second parameter is a PK Column of a table */
    public function delete($tableName, $PKColumn , $id)
    {
      $this->queryBuilder .= "DELETE FROM " . $tableName . " WHERE " . $PKColumn . " = " . $id;
      mysqli_query($this->con, $this->queryBuilder);
      $this->queryBuilder = "";
    }

    /* Retrieve all data from a table */
    public function retrieveAll($tableName)
    {
      $this->queryBuilder .= "SELECT * FROM " . $tableName;
      $result = mysqli_query($this->con, $this->queryBuilder)or die(mysqli_error($this->con));

      $data = [];
      while($row = mysqli_fetch_array($result))
      {
        $data[] = $row;
      }

      $this->queryBuilder = "";
      return $result;
    }

    /* Retrieve a specific row */
    public function retrieve($tableName, $columnNames, $id)
    {
      if(!is_array($columnNames))
      {
        throw new Exception("Second argument of function 'retrieve' must be an array");
      }

      $this->queryBuilder = "SELECT ";

      for ( $i = 1; $i < count($columnNames); $i++ ) {
        $this->queryBuilder .= ( $i == count($columnNames) - 1 ) ? $columnNames[$i] . " FROM " . $tableName . " WHERE " . $columnNames[0] . " = " . $id : $columnNames[$i] . ", ";
      }

      $result = mysqli_query($this->con, $this->queryBuilder);
      $data = [];
      while($row = mysqli_fetch_array($result))
      {
        $data[] = $row;
      }

      $this->queryBuilder = "";
      return $result;
    }

    // FIXME: Cannot overload function
    /* Retrieve a specific column
    function retrieve($tableName, $columnNames)
    {
        $this->queryBuilder = "SELECT ";

        for ( $i = 1; $i < count($columnNames); $i++ ) {
          $this->queryBuilder .= ( $i == count($columnNames) - 1 ) ? $columnNames[$i] . " FROM " . $tableName : $columnNames[$i] . ", ";
        }

        $result = mysqli_query($this->con, $this->queryBuilder);
        $data = [];
        while($row = mysqli_fetch_array($result))
        {
          $data[] = $row;
        }

        echo $this->queryBuilder;
        return json_encode($data);
    }
    */
}
 ?>
