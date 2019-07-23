<?php
session_start();
date_default_timezone_set('Europe/Paris');

class Controller
{
    public $db = null;
    public $model = null;

    /**
     * When a controller is created, opens a database connection too, to have 1 connection that can be used
     * by multiple models (some frameworks open 1 connection per model).
     */
    function __construct($DB_N, $DB_T, $DB_H, $DB_U, $DB_P)
    {
        /**
         * set the (optional) options of the PDO connection.
         */
        $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
        /**
         * Open the database connection with the credentials, using the PDO connector
         */
        $this->db = new PDO($DB_T . ':host=' . $DB_H . ';dbname=' . $DB_N, $DB_U, $DB_P, $options);
        /**
         * create new "model" (and pass the database connection)
         */
        require APP . '/model/model.php';
        $this->model = new Model($this->db);
    }
}
