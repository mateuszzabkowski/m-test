<?php

namespace MTest;

class MovieRepository 
{
    public function __construct(private readonly array $movies) 
    {
    }

    public function findThreeRandomTitle(): array
    {
        if (!$this->movies) {
            throw new \Exception('No data found in the movies variable');
        }

        return \array_map(
            fn(string $key) => $this->movies[$key],
            \array_rand($this->movies, 3)
        );
    }

    public function findAllByLetter(string $letter): array
    {
        return \array_filter(
            $this->movies, 
            fn(string $movieName) => 
                0 === strpos($movieName, $letter) && 0 === (strlen($movieName) % 2)
        );
    }

    public function findAllWithMoreThanOneWord(): array
    {
        return \array_filter($this->movies, fn(string $movieName) => false !== strpos($movieName, ' '));
    }
}
