<?php

require 'vendor/autoload.php';

use MTest\MovieRepository;

global $movies;

require_once __DIR__ . '/config/movies.php';

$repository = new MovieRepository($movies);

$result = $repository->findThreeRandomTitle();

echo sprintf(
    "Three random titles (%s): %s \n\n",
    count($result),
    implode(', ', $result)
);

$result = $repository->findAllByLetter('W');

echo sprintf(
    "The titles starts with 'W' (%s): %s \n\n",
    count($result),
    implode(', ', $result)
);

$result = $repository->findAllWithMoreThanOneWord();

echo sprintf(
    "The titles with more than one word (%s): %s \n\n",
    count($result),
    implode(', ', $result)
);
