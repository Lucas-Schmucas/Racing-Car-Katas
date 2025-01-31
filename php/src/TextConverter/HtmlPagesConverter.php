<?php

declare(strict_types=1);

namespace RacingCar\TextConverter;

class HtmlPagesConverter
{
    /**
     * @var int[]
     */
    private array $breaks;

    public function __construct(
        private readonly string $filename,
        public HtmlTextConverter $htmlTextConverter
    ) {
       $this->findBreakPositions();
    }

    public function getFileName(): string
    {
        return $this->filename;
    }

    public function getHtmlPage(int $page): string
    {
        $f = fopen($this->filename, 'r');
        $pageStart = $this->breaks[$page];
        $pageEnd = $this->breaks[$page + 1];
        fseek($f, $pageStart);
        $html = '';
        while (ftell($f) !== $pageEnd) {
            $line = rtrim(fgets($f));
            if (str_contains($line, 'PAGE_BREAK')) {
                break;
            }
            $html .= $this->htmlTextConverter->convertStringToHtml($line);
        }
        fclose($f);
        return $html;
    }
    public function findBreakPositions(): void
    {
        $f = fopen($this->filename, 'r');
        $this->breaks = [0];
        $lineNumber = 0;
        while (($line = fgets($f)) !== false) {
            if (str_contains($line, 'PAGE_BREAK')) {
                $this->breaks[] = $lineNumber;
            }
            $lineNumber += strlen($line);
        }
        $this->breaks[] = $lineNumber;
        fclose($f);
    }
}
