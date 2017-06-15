<?php
//
//$parser = xml_parser_create('utf-8');
//
//function startElement($parser, $tag, $attr)
//{
//    if ($tag == 'CATALOG' || $tag == 'BOOK') {
//        echo "<li>$tag";
//        echo "<ul>";
//    } else {
//        if (isset($attr['CURRENCY'])) {
//            echo "<li>$tag: {$attr['CURRENCY']}";
//        } else {
//            echo "<li>$tag:";
//        }
//
//    }
//}
//function onEnd($parser, $tag)
//{
//    if ($tag == 'CATALOG' || $tag == 'BOOK') {
//        echo "</li></ul>";
//    } else {
//        echo '</li>';
//    }
//}
//
//function onText($parser, $text)
//{
//    echo $text;
//}
//
//$parserHandler = xml_set_element_handler($parser, 'startElement', 'onEnd');
//
//xml_set_character_data_handler($parser, 'onText');
//
//$file = file_get_contents('new.xml');
//echo '<ul>';
//xml_parse($parser, $file);
//echo '</ul>';
$dom=new DOMDocument();

$dom->load('new.xml');
var_dump($dom->childNodes->item(0));
