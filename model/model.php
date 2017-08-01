<?php
/**
 * @author Łukasz Socha <kontakt@lukasz-socha.pl>
 * @version: 1.0
 * @license http://www.gnu.org/copyleft/lesser.html
 */

/**
 * change pdo to mysqli by JA
 */

/**
 * This class includes methods for models.
 *
 * @abstract
 */
abstract class model{
    /**
     * object of the class ...?
     *
     * @var object
     */
    protected $connection;

    /**
     * It sets connect with the database.
     *
     * @return void
     */
    public function  __construct() {
        try {
//            require 'config/db.php';
            $this->connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
//            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(DBException $e) {
            echo 'The connect can not create: ' . $e->getMessage();
        }
    }
    /**
     * It loads the object with the model.
     *
     * @param string $name name class with the class
     * @param string $path pathway to the file with the class
     *
     * @return object
     */
    public function loadModel($name, $path='model/') {
        $path=$path.$name.'.php';
        $name=$name.'_model';
        try {
            if(is_file($path)) {
                require $path;
                $ob=new $name();
            } else {
                throw new Exception('Can not open model '.$name.' in: '.$path);
            }
        }
        catch(Exception $e) {
            echo $e->getMessage().'<br />
                File: '.$e->getFile().'<br />
                Code line: '.$e->getLine().'<br />
                Trace: '.$e->getTraceAsString();
            exit;
        }
        return $ob;
    }
    /**
     * It selects data from the database.
     *
     * @param string $from Table
     * @param <type> $select Records to select (default * (all))
     * @param <type> $where Condition to query
     * @param <type> $order Order ($record ASC/DESC)
     * @param <type> $limit LIMIT
     * @return array
     */
    public function select($from, $select='*', $where=NULL, $order=NULL, $limit=NULL) {
        $query='SELECT '.$select.' FROM '.$from;
        if($where!=NULL)
            $query=$query.' WHERE '.$where;
        if($order!=NULL)
            $query=$query.' ORDER BY '.$order;
        if($limit!=NULL)
            $query=$query.' LIMIT '.$limit;

        $result_of_select = $this->db_connection->query($query);

        while($row = mysqli_fetch_row($result_of_select)){
            $data[]=$row;

        }

        return $data;
    }
}