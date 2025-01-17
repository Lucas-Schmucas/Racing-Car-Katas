<?php

declare(strict_types=1);

namespace RacingCar\TextConverter;

class HtmlTextConverter
{
    public function __construct(
        private string $fullFileNameWithPath
    ) {
    }

    public function convertToHtml(): string
    {
        $f = fopen($this->fullFileNameWithPath, 'r');

        $html = '';
        while (($line = fgets($f)) !== false) {
            $line = $this->removeEmptySpace($line);
            $line = $this->convertSpecialChars($line);
            $html .= $this->setBreakAtEndOfLine($line);
        }
        return $html;
    }

    public function getFileName(): string
    {
        return $this->fullFileNameWithPath;
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
