<?php

use GrupoCometa\Console\Log;
use PHPUnit\Framework\TestCase;

final class LogTest extends TestCase
{
    public function testLogSuccess(): void
    {
        $object = new stdClass;
        $object->name = "Um texto qualquer";
        ob_start();
        Log::success($object);
        $output = ob_get_clean();
        $this->assertStringContainsString($object->name, $output);
    }

    public function testPrintArray(): void
    {
        $array = ['um nome', 'key' => 'values', 1, 23];
        Log::success($array);
        Log::error($array);
        Log::warning($array);
        Log::info($array);
        $this->assertNull(null);
    }

    public function testPrintString(): void
    {
        $str = "Uma mensagem qualquer";
        Log::success($str);
        Log::error($str);
        Log::warning($str);
        Log::info($str);
        $this->assertNull(null);
    }
}
