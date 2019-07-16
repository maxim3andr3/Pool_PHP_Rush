<?php
    class Database
    {
       private $_host = 'mysql:host=127.0.0.1;port=3306;dbname=pool_php_rush;charset=utf8';
       private $_username = 'root';
       private $_password = '';
       private $_bdd;

        public function getHost()
        {
            return $this->_host;
        }

        public function setHost($host)
        {
            $this->_host = $host;
        }

        public function getUsername()
        {
            return $this->_username;
        }

        public function setUsername($username)
        {
            $this->_username = $username;
        }

        public function getPassword()
        {
            return $this->_password;
        }

        public function setPassword($password)
        {
            $this->_password = $password;
        }

        public function getBdd()
        {
            return $this->_bdd;
        }

        public function setBdd($bdd)
        {
            $this->_bdd = $bdd;
        }

        // Connexion to database
        function connexion()
        {
            try {
                $this->setBdd(new PDO($this->getHost(), $this->getUsername(), $this->getPassword()));
            } catch (Exception $e) {
                die ('Error : ' . $e->getMessage());
            }
        }

        // Query to add a member
        function addMember()
        {
            return 'INSERT INTO users(username, email, password) VALUES (:username, :email, :password)';
        }

        // Query to select all members
        function selectAllMembers()
        {
            return 'SELECT * FROM users';
        }

        // Query to display a member by his id
        function selectMemberId()
        {
            return 'SELECT * FROM users WHERE id = :id';
        }

        // Query to display a member by his email
        function selectMemberEmail()
        {
            return 'SELECT * FROM users WHERE email = :email';
        }

        // Query to edit a member by his id
        function updateMemberId()
        {
            return 'UPDATE users SET username = :username, email = :email WHERE id = :id';
        }

        // Query to delete a member by his id
        function deleteMemberId()
        {
            return 'DELETE FROM users WHERE id = :id';
        }
    }