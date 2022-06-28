<?php
require_once './classes/Email.php';
use PHPUnit\Framework\TestCase;

//run testes
//php .\vendor\bin\phpunit .\classes\EmailTest.php

final class EmailTest extends TestCase{

    protected $EmailClass;

    protected function setUp(): void{
        $this->EmailClass = new Email();
    }

    public function testEmailValido(): void{
        $Email = 'user@exemplo.com';

        $this->assertEquals(true, $this->EmailClass->verificarSeEmailValido($Email));
    }
    
    public function testEmailValidoComSame(): void{
        $Email = 'user@exemplo.com';

        $this->assertSame(true, $this->EmailClass->verificarSeEmailValido($Email));
    }

    public function testEmailInvalido(): void{
        $Email = 'userexemplo.com';

        $this->expectException(InvalidArgumentException::class);
        $this->EmailClass->verificarSeEmailValido($Email);
    }

    public function testEmailVazio(): void{
        $Email = '';

        $this->expectException(InvalidArgumentException::class);
        $this->EmailClass->verificarSeEmailValido($Email);
    }

    public function testEmailNulo(): void{
        $Email = null;

        $this->expectException(InvalidArgumentException::class);
        $this->EmailClass->verificarSeEmailValido($Email);
    }

    public function testEmailComNumerosInt(): void{
        $Email = 1234569812738;

        $this->expectException(InvalidArgumentException::class);
        $this->EmailClass->verificarSeEmailValido($Email);
    }

    public function testEmailComNumerosDouble(): void{
        $Email = 12.34;

        $this->expectException(InvalidArgumentException::class);
        $this->EmailClass->verificarSeEmailValido($Email);
    }

    public function testEmailComNumerosString(): void{
        $Email = '1234569812738';

        $this->expectException(InvalidArgumentException::class);
        $this->EmailClass->verificarSeEmailValido($Email);
    }

    public function testEmailComEspacoAntesDoDominio(): void{
        $Email = 'us er@exemplo.com';

        $this->expectException(InvalidArgumentException::class);
        $this->EmailClass->verificarSeEmailValido($Email);
    }

    public function testEmailComEspacoNoDominio(): void{
        $Email = 'user@exe mplo.com';

        $this->expectException(InvalidArgumentException::class);
        $this->EmailClass->verificarSeEmailValido($Email);
    }

    public function testChamadaDeMetodoSemParametros(): void{
        $this->expectException(ArgumentCountError::class);
        $this->EmailClass->verificarSeEmailValido();
    }

    public function testMockEmailExistente(): void{
        // $Email = 'user@exemplo.com';

        // $EmailMock = $this->createMock(Email::class);
        // $NovoRetorno = true;

        // $EmailMock->method('verificarSeEmailExisteNoBanco')->willReturn($NovoRetorno);
        // $EmailExisteNoBanco = $EmailMock->verificarSeEmailExisteNoBanco($Email);

        // $this->assertEquals(true, $EmailExisteNoBanco);

        $this->markTestIncomplete('Teste marcado como incompleto pois nao funciona no PHP 8.1.2');
    }
}