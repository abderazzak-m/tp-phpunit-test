<?php

namespace TpUnit\Tests;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use TpUnit\Stagiaire;

class StagiaireTest extends TestCase
{
    public function testCreationStagiaire(): void
    {
        $stagiaire = new Stagiaire('Sadik', 20, 15.5);

        $this->assertSame('Sadik', $stagiaire->getNom());
        $this->assertSame(20, $stagiaire->getAge());
        $this->assertSame(15.5, $stagiaire->getMoyenne());
    }

    public function testNomEstNettoye(): void
    {
        $stagiaire = new Stagiaire('  Sadik  ', 20, 15.0);

        $this->assertSame('Sadik', $stagiaire->getNom());
    }

    public function testNomVideEstRefuse(): void
    {
        $this->expectException(InvalidArgumentException::class);

        new Stagiaire('', 20, 15.0);
    }

    public function testAgeInvalideEstRefuse(): void
    {
        $this->expectException(InvalidArgumentException::class);

        new Stagiaire('Sadik', 15, 15.0);
    }

    public function testMoyenneInvalideEstRefusee(): void
    {
        $this->expectException(InvalidArgumentException::class);

        new Stagiaire('Sadik', 20, 21.0);
    }

    public function testStagiaireEstAdmis(): void
    {
        $stagiaire = new Stagiaire('Sadik', 20, 12.0);

        $this->assertTrue($stagiaire->estAdmis());
    }

    public function testStagiaireEstRefuse(): void
    {
        $stagiaire = new Stagiaire('Ali', 19, 8.0);

        $this->assertFalse($stagiaire->estAdmis());
    }

    public function testMentionTresBien(): void
    {
        $stagiaire = new Stagiaire('Sara', 21, 17.0);

        $this->assertSame('Tres bien', $stagiaire->mention());
    }

    public function testMentionBien(): void
    {
        $stagiaire = new Stagiaire('Sara', 21, 14.5);

        $this->assertSame('Bien', $stagiaire->mention());
    }

    public function testMentionAssezBien(): void
    {
        $stagiaire = new Stagiaire('Sara', 21, 12.5);

        $this->assertSame('Assez bien', $stagiaire->mention());
    }

    public function testMentionPassable(): void
    {
        $stagiaire = new Stagiaire('Sara', 21, 10.0);

        $this->assertSame('Passable', $stagiaire->mention());
    }

    public function testMentionInsuffisant(): void
    {
        $stagiaire = new Stagiaire('Sara', 21, 9.0);

        $this->assertSame('Insuffisant', $stagiaire->mention());
    }
}