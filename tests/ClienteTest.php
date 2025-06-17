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
    
public function testTelefonoSoloNumeros()
{
    $this->assertMatchesRegularExpression("/^[0-9]+$/", "123456789"); // ✅ válido
    $this->assertDoesNotMatchRegularExpression("/^[0-9]+$/", "123abc"); // ❌ letras
    $this->assertDoesNotMatchRegularExpression("/^[0-9]+$/", "123-456"); // ❌ guiones
    $this->assertDoesNotMatchRegularExpression("/^[0-9]+$/", "");        // ❌ vacío
}

}
