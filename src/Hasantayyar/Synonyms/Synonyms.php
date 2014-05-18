<?php

namespace Hasantayyar\Synonyms;
use Yangqi\Htmldom;
/**
 *  
 *
 * @author Hasan Tayyar BEŞİK <tayyar.besik@gmail.com>
 * @author Hasan Tayyar BEŞİK 
 * @version 0.1
 * @package Synonyms 
 */
class Synonyms {

    private $url;
    private $word;

    public function __construct($word) {
        $this->word = $word;
    }

    public function getThesaurus() {
        $this->url = 'http://thesaurus.com/browse/' . $this->word;
        $html = new Htmldom($this->$url);
        $listDiv = $html->find('.relevancy-list', 0);
        for ($i = 0; $i <= 5; ++$i) {
            echo "\n\nLEVEL " . $i . "\n";
            $list = $listDiv->find('ul', $i);
            if ($list) {
                foreach ($list->find('li') as $element) {
                    $linkElement = $element->find('a', 0);
                    $linkHref = $linkElement->href;
                    $dataCategory = html_entity_decode($linkElement->getAttribute('data-category'));
                    echo $linkHref . "\n";
                }
            }
        }
    }

}
