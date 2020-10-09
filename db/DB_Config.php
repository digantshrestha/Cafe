<?php

    class DB_Config{
        private $host, $port, $dbname, $credentials;
        private $db;
        private $query, $stmt, $items, $item;
        private $name, $price, $quantity, $imagePath, $imageName, $availableData;

        public function __construct(){}

        public function setConnection($host, $port, $dbname, $credentials){
            $this->host = $host;
            $this->port = $port;
            $this->dbname = $dbname;
            $this->credentials = $credentials;
        }

        public function connect(){
            pg_connect("$this->host $this->port $this->dbname $this->credentials");
        }

        public function connection(){
            $db = pg_connect("$this->host $this->port $this->dbname $this->credentials");
            return $db;
        }

        public function setQuery($query){
            $this->query = $query;
        }

        public function getQuery(){
            return $this->query;
        }

        public function setValue($name, $price, $quantity, $imagePath, $imageName, $availableData){
            $this->name = $name;
            $this->price = $price;
            $this->quantity = $quantity;
            $this->imagePath = $imagePath;
            $this->imageName = $imageName;
            $this->availableData = $availableData;
        }

        public function getValue(){
            $params = [
                $this->name,
                $this->price,
                $this->quantity,
                $this->imagePath,
                $this->imageName,
                $this->availableData
            ];
            return $params;
        }

        public function getName(){
            return $this->name;
        }

        public function getPrice(){
            return $this->price;
        }

        public function getQuantity(){
            return $this->quantity;
        }

        public function getImagePath(){
            return $this->imagePath;
        }

        public function getImageName(){
            return $this->imageName;
        }

        public function getAvailability(){
            return $this->availableData;
        }

        public function addItem(){
            pg_prepare($this->connection(), 'crud-query', $this->getQuery());
            pg_execute($this->connection(), 'crud-query', $this->getValue());
        }

        public function getItems(){
            $stmt = pg_query($this->connection(), $this->getQuery());
            $result = pg_fetch_all($stmt);
            return $result;
        }

        public function getItem($id){
            $stmt = pg_query_params($this->connection(), $this->getQuery(), [$id]);
            $result = pg_fetch_all($stmt);
            return $result;
        }

        public function delItem($id){
            pg_prepare($this->connection(), 'crud-query', $this->getQuery());
            pg_execute($this->connection(), 'crud-query', [$id]);
        }

        public function getPath($id){
            $stmt = pg_query_params($this->connection(), 'SELECT image_path FROM menus WHERE id = $1', [$id]);
            $result = pg_fetch_all($stmt);
            return $result;

            // $stmt = $this->connection()->prepare('SELECT image_path FROM menus WHERE id = ?');
            // $stmt->execute([$id]);
            // return $stmt->fetch();
        }

        public function getImgName($id){
            $stmt = pg_query_params($this->connection(), 'SELECT image_name FROM menus WHERE id = $1', [$id]);
            $result = pg_fetch_all($stmt);
            return $result;

            // $stmt = $this->connection()->prepare('SELECT image_name FROM menus WHERE id = ?');
            // $stmt->execute([$id]);
            // return $stmt->fetch();
        }

        public function getRow($user){
            $stmt = pg_query_params($this->connection(), 'SELECT * FROM admin where username = $1', [$user]);
            $result = pg_num_rows($stmt);
            return $result;

            // $stmt = $this->connection()->prepare('SELECT * FROM admin where username = ?');
            // $stmt->execute([$user]);
            // return $stmt->rowCount();            
        }

        public function getUserData($user){
            $stmt = pg_query_params($this->connection(), $this->getQuery(), [$user]);
            $result = pg_fetch_all($stmt);
            return $result;

            // $stmt = $this->connection()->prepare($this->getQuery());
            // $stmt->execute([$user]);
            // return $stmt->fetch();
        }

        public function update($data, $id){
            pg_prepare($this->connection(), 'crud-query', $this->getQuery());
            pg_execute($this->connection(), 'crud-query', [$data, $id]);

            // $stmt = $this->connection()->prepare($this->getQuery());
            // $stmt->execute([$data, $id]);
            // return true;
        }

        public function updateImg($data1, $data2, $id){
            pg_prepare($this->connection(), 'crud-query', $this->getQuery());
            pg_execute($this->connection(), 'crud-query', [$data1, $data2, $id]);

            // $stmt = $this->connection()->prepare($this->getQuery());
            // $stmt->execute([$data1, $data2, $id]);
            // return true;
        }

        public function updateMap($data1, $data2, $data3, $id){
            pg_prepare($this->connection(), 'crud-query', $this->getQuery());
            pg_execute($this->connection(), 'crud-query', [$data1, $data2, $data3, $id]);

            // $stmt = $this->connection()->prepare($this->getQuery());
            // $stmt->execute([$data1, $data2, $data3, $id]);
        }

        public function updateLink($data1, $data2, $data3, $id){
            pg_prepare($this->connection(), 'crud-query', $this->getQuery());
            pg_execute($this->connection(), 'crud-query', [$data1, $data2, $data3, $id]);

            // $stmt = $this->connection()->prepare($this->getQuery());
            // $stmt->execute([$data1, $data2, $data3, $id]);
        }
    
    }

    

?>