<?php

if (!function_exists('formatContentToParagraphs')) {
    /**
     * Format content into paragraphs.
     *
     * @param string $text
     * @return string
     */
    function formatContentToParagraphs($text)
    {
        $paragraphs = preg_split('/\n\s*\n/', trim($text)); // split by empty lines
        return collect($paragraphs)->map(fn($p) => "<p>" . e($p) . "</p>")->implode('<br><br>');
    }
}