<?php

declare(strict_types=1);

namespace RacingCar\TextConverter;

class HtmlTextConverter
{
    public function __construct(
        private string $fullFileNameWithPath
    ) {
    }

    public function convertFileToHtml(): string
    {
        $f = fopen($this->fullFileNameWithPath, 'r');

        $html = '';
        while (($line = fgets($f)) !== false) {
            $html .= $this->convertStringToHtml($line);
        }
        return $html;
    }

    public function getFileName(): string
    {
        return $this->fullFileNameWithPath;
    }

    public function convertStringToHtml(string $string): string
    {
        $string = $this->removeEmptySpace($string);
        $string = $this->convertSpecialChars($string);
        return $this->setBreakAtEndOfLine($string);
    }
    public function removeEmptySpace(string $line): string
    {
        return rtrim($line);
    }

    public function convertSpecialChars(string $line): string
    {
        return htmlspecialchars($line, ENT_QUOTES | ENT_HTML5);
    }

    public function setBreakAtEndOfLine($line): string
    {
        return $line . '<br>';
    }
}
