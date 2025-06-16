<?php
// tests/ClienteTest.php

use PHPUnit\Framework\TestCase;

class ClienteTest extends TestCase
{
    public function testNombreNoVacio()
    {
        $nombre = "José Fuentes";
        $this->assertNotEmpty($nombre);
    }

    public function testEmailValido()
    {
        $email = "jose@example.com";
        $this->assertMatchesRegularExpression("/^.+@.+\..+$/", $email);
    }
    
public function testTelefonoNumerico()
    {
        $telefono = "123456789";
        $this->assertMatchesRegularExpression("/^[0-9]+$/", $telefono);
    }
}
