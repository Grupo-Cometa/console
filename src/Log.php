<?php

namespace GrupoCometa\Console;

class Log
{
    private  $bind = [
        'integer' => 'string',
        'string' => 'string',
        'array' => 'array',
        'double' => 'string',
        'float' => 'string',
        'object' => 'object',
        'NULL' => 'string',
        'boolean' => 'string'
    ];

    public static function success(...$args)
    {
        $instance = new self;
        $instance->print('32m', $args);
    }

    public static function info(...$args)
    {
        $instance = new self;
        $instance->print('34m', $args);
    }

    public static function error(...$args)
    {
        $instance = new self;
        $instance->print('31m', $args);
    }

    public static function warning(...$args)
    {
        $instance = new self;
        $instance->print('33m', $args);
    }

    private  function array($color, $array)
    {
        print_r($array);
        echo "\n";
    }

    private  function object($color, $object)
    {
        var_dump($object);
        echo "\n";
    }

    public  function string($color, $value)
    {
        echo "\033[{$color}{$value}\033[0m\n";
    }

    private function print($color, $args)
    {
        foreach ($args as $value) {
            $type = gettype($value);
            $function = $this->bind[$type];
            $this->$function($color, $value);
        }
    }
}
