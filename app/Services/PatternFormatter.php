<?php

namespace App\Services;

class PatternFormatter
{
    private const PATTERNS = [
        'keyword' => [
            '/--' => '---------------------------------------------------------------------------------------------------------------',
        ],
        'styling' => [
            '```' => 'class="mb-4 p-3 text-green-700 bg-green-100"',
        ],
    ];

    /*
     * Format text that matches keywords and/or styling wanted
     */
    public static function convert($text): string
    {
        $text = self::convertKeywords($text);

        return self::convertCodeBlock($text);
    }

    /*
     * Replace matched pattern with new value
     */
    private static function convertKeywords(string $text): string
    {
        foreach (self::PATTERNS['keyword'] as $key => $value) {
            $text = str_replace($key, $value, $text);
        }

        return $text;
    }

    /*
     * Wrap text with styled div if pattern matches
     */
    private static function convertCodeBlock(string $text): string
    {
        $output = '';

        foreach (self::PATTERNS['styling'] as $key => $stylingValue) {
            // Split on triple backticks
            $parts = explode($key, $text);

            foreach ($parts as $index => $part) {
                // Even index = normal text, odd index = code block
                if ($index % 2 === 0) {
                    $output .= trim($part); // preserve text outside backticks
                } else {
                    $content = trim($part); // trim line breaks or extra spaces
                    $output .= '<div '.$stylingValue.'>'.htmlspecialchars($content).'</div>';
                }
            }
        }

        return $output ?: $text;
    }
}
