<?php 

class Dao
{
    protected $connection;
    private $options = [];
    private string $dsn;
    private $file;

    public function __construct()
    {      
    }

    private function setFile($file = 'config-database.ini')
    {
        $this->file = parse_ini_file($file);

        if(empty($this->file))
        {
            throw new Error("The file is empty!");
        }
    }

    private function getFile()
    {
        $this->setFile();
        return $this->file;
    }

    private function setDsn()
    {
        $database = $this->getFile();

        $driver = $database['driver'];
        $dbname = $database['dbname'];
        $host = $database['host'];
        $port = $database['port'];

        $this->dsn = "$driver:host=$host;dbname=$dbname;port=$port";
    }

    private function getDsn()
    {
        $this->setDsn();
        return $this->dsn;
    }

    private function setOptions()
    {
        $this->options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
            PDO::CASE_LOWER => true
        ];
    }

    private function getOptions()
    {
        $this->setOptions();
        return $this->options;
    }

    private function setConnection()
    {
        try {
            $database = $this->getFile();

            $username = $database['username'];
            $password = $database['password'];
            
            $dsn = $this->getDsn();
            $options = $this->getOptions();

            $this->connection = new PDO($dsn, $username, $password, $options);

        } catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }
    protected function getConnection()
    {            
        $this->setConnection();
        return $this->connection;
    }   

    protected function closeConnection()
    {
        $this->connection = null;
    }

    protected function validateQuery($result)
    {
        if ($result->rowCount() < 0) {
            throw new Error("Nenhum resultado encontrado!");
        }
        return $result;
    }

    // RUN ONLY SELECT QUERY's
    public function runQuery($query, $parameters = null)
    {
        try {
            $this->getConnection();

            if($parameters != null){
                $stmt = $this->connection->prepare($query);
                $stmt->execute($parameters);
                $result = $stmt;
            } else 
            {
                $stmt = $this->connection->prepare($query);
                $stmt->execute();
                $result = $stmt;
                
            }
        } catch (PDOException $e) {     
            $result = "SQL STATE: " . $e->getMessage();
            return $result;
        }

        $this->closeConnection();
        return $this->validateQuery($result);
    }

    public function run_non_query($query)
    {
        try
        {
            $this->getConnection();

            $result = $this->connection->exec($query);
            
            if($result !== 1)
            {
                return false;
            }
            return $result;

        } catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }
}

?>
