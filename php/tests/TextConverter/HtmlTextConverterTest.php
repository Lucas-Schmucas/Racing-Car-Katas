<?php

declare(strict_types=1);

namespace Tests\TextConverter;

use PHPUnit\Framework\TestCase;
use RacingCar\TextConverter\HtmlTextConverter;

class HtmlTextConverterTest extends TestCase
{
    public function testSetFileName(): void
    {
        $converter = new HtmlTextConverter('foo');
        $this->assertSame('foo', $converter->getFileName());
        $converter->setFileName('bar');
        $this->assertSame('bar', $converter->getFileName());
    }
    public function testRemoveEmptySpaces(): void
    {
        $converter = new HtmlTextConverter('foo');
        $result = $converter->removeEmptySpace('3_spaces_on_the_end   ');
        $this->assertStringContainsString('3_spaces_on_the_end', $result);
        $this->assertStringNotContainsString(' ', $result);
    }

    public function testConvertSpecialChars() : void
    {
        $converter = new HtmlTextConverter('foo');
        $result = $converter->convertSpecialChars('<p>foo</p>');
        $this->assertStringContainsString('&lt;p&gt;foo&lt;/p&gt;', $result);
    }

    public function testSetBreakAtEndOfLine() : void
    {
        $converter = new HtmlTextConverter('foo');
        $result = $converter->setBreakAtEndOfLine('this is a line');
        $this->assertStringEndsWith('<br>', $result);
    }

    public function testConvertToHtml() : void
    {
        $fileName = 'tests/TextConverter/convert_me_sensei';
        $converter = new HtmlTextConverter($fileName);
        $this->assertSame($converter->getFileName(), $fileName);


        $result = $converter->convertFileToHtml();

        $this->assertSame($result, '<br>two breaks, one special char &quot; and two spaces at the end<br>');
    }
}
