    <?php
    class connexion
    {
        public function cnxBase()
        {
            $pdo = new PDO("mysql:host=localhost;dbname=produit;charset=utf8", "root", "");
            return $pdo;
        }
    }
    ?>