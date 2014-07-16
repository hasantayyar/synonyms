<?php

namespace Hasantayyar\Synonyms\Services;

use Yangqi\Htmldom\Htmldom as Htmldom;

/**
 *  
 *
 * @author Hasan Tayyar BEŞİK <tayyar.besik@gmail.com>
 * @author Hasan Tayyar BEŞİK 
 * @version 0.1
 * @package Synonyms 
 */
class TurkishSynonyms {

    public $base_url = 'http://www.tdk.gov.tr/index.php?option=com_esanlamlar&arama=esanlam&keyword=';

    public function getWords($word) {
        $suggestions = array();
        $html = new Htmldom($this->base_url . $word);
        $data= array();
        foreach ($html->find('.meaning') as $element) {
            foreach (explode("/", $element->innertext) as $synonym) {
                $data['data'][] = array('word' => trim($synonym));
            }
            $suggestions[] = $data;
        }
        return $suggestions;
    }

}
