<?
define('HOST','localhost');
define('DBNAME','****');
define('UNAME','');
define('PASSWD','');
define('CHARSET','utf8');

class Model extends PDO{
    public function __construct()
    {
        try{
            parent::__construct('mysql:host='.HOST.';dbname='.DBNAME,UNAME,PASSWD);
            $this->query('SET CHARSET SET '.CHARSET);
            $this->query('SET NAMES '.CHARSET);
            $this->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $this->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
        }catch(PDOException $error){
            $error->getMessage();
        }
    }

    public function fetchAll(){
        return $this->query('SELECT * from *** order by kitap_id asc LIMIT 0,50');
    }
}
?>