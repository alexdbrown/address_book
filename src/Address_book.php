<?php
    class Contact
    {
        private $name;
        private $phone;
        private $address;

        function __construct($name, $phone, $address)
        {
            $this->name = $name;
            $this->phone = $phone;
            $this->address = $address;
        }

        function setName($new_name)
        {
            $this->name = (string) $new_name;
        }

        function getName()
        {
            return $this->name;
        }

        function setPhone($new_phone)
        {
            $this->phone = (integer) $new_phone;
        }

        function getPhone()
        {
            return $this->phone;
        }

        function setAddress($new_address)
        {
            $this->address = (string) $new_address;
        }

        function getAddress()
        {
            return $this->address;
        }

        function save()
        {
            array_push($_SESSION['list_of_addresses'], $this);
        }

        static function getAll()
        {
            return $_SESSION['list_of_addresses'];
        }

        static function deleteAll()
        {
            $_SESSION['list_of_addresses'];
        }

    }

?>
