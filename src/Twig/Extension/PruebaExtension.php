<?php

namespace App\Twig\Extension;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class PruebaExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            // If your filter generates SAFE HTML, you should add a third
            // parameter: ['is_safe' => ['html']]
            // Reference: https://twig.symfony.com/doc/3.x/advanced.html#automatic-escaping
            new TwigFilter('fizzBuzz', [$this, 'fizzBuzz']),
        ];
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('fizzBuzz', [$this, 'fizzBuzz']),
        ];
    }

    public function fizzBuzz($number)
    {
        $result = '';
        $limit = 30 + $number;
        for ($i = $number; $i <= $limit; $i++) {
            if ($i % 3 === 0 && $i % 5 === 0) {
                $result .= "FizzBuzz\n";
            } else if ($i % 3 === 0) {
                $result .= "Fizz\n";
            } else if ($i % 5 === 0) {
                $result .= "Buzz\n";
            } else {
                $result .= "$i\n";
            }
        }
        return $result;
    }
}
