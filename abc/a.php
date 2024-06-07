<?php

use PhpOffice\PhpWord\Element\AbstractContainer;
use PhpOffice\PhpWord\Element\Text;
use PhpOffice\PhpWord\IOFactory as WordIOFactory;

$objReader = WordIOFactory::createReader('Word2007');
$phpWord = $objReader->load('clean_code.docx'); // instance of \PhpOffice\PhpWord\PhpWord
$text = '';

function getWordText($element)
{
    $result = '';
    if ($element instanceof AbstractContainer) {
        foreach ($element->getElements() as $element) {
            $result .= getWordText($element);
        }
    } elseif ($element instanceof Text) {
        $result .= $element->getText();
    }
    // and so on for other element types (see src/PhpWord/Element)

    return $result;
}

foreach ($phpWord->getSections() as $section) {
    foreach ($section->getElements() as $element) {
        $text .= getWordText($element);
    }
}

echo $text;
