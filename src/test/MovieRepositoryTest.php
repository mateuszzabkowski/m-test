<?php

namespace MTest\Test;

use MTest\MovieRepository;
use PHPUnit\Framework\TestCase;

class MovieRepositoryTest extends TestCase
{
    private const TEST_CONFIG = [
        "Milczenie owiec",
        "Dzień świra",
        "Blade Runner",
        "Labirynt",
        "Król Lew",
        "La La Land",
        "Whiplash",
        "Witcher",
    ];

    public function testFindThreeRandomTitleCase1(): void
    {
        $repo = new MovieRepository(self::TEST_CONFIG);

        $actual = $repo->findThreeRandomTitle();

        $this->assertIsArray($actual);
        $this->assertCount(3, $actual);
    }

    public function testFindAllByLetterCase1(): void
    {
        $repo = new MovieRepository(self::TEST_CONFIG);

        $actual = $repo->findAllByLetter('W');

        $this->assertIsArray($actual);
        $this->assertCount(1, $actual);
    }

    public function testFindAllWithOneWordCase1(): void
    {
        $repo = new MovieRepository(self::TEST_CONFIG);

        $actual = $repo->findAllWithMoreThanOneWord();

        $this->assertIsArray($actual);
        $this->assertCount(5, $actual);
    }

    public function testFindThreeRandomTitleCase2(): void
    {
        $repo = new MovieRepository([]);

        $this->expectExceptionMessage('No data found in the movies variable');

        $repo->findThreeRandomTitle();
    }

    public function testFindAllByLetterCase2(): void
    {
        $repo = new MovieRepository([]);

        $actual = $repo->findAllByLetter('W');

        $this->assertIsArray($actual);
        $this->assertCount(0, $actual);
    }

    public function testFindAllWithOneWordCase2(): void
    {
        $repo = new MovieRepository([]);

        $actual = $repo->findAllWithMoreThanOneWord();

        $this->assertIsArray($actual);
        $this->assertCount(0, $actual);
    }
}
