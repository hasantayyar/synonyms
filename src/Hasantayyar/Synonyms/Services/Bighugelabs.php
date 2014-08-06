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
class Bighugelabs {

    /**
     *
     * @var string
     */
    public $base_url = 'http://words.bighugelabs.com/';

    /**
     * 
     * @return array
     */
    public function getWords($word) {
        $suggestions = array();
        $html = new Htmldom($this->base_url . $word);
        $list = $html->find('ul[class=words]', 0);
        $suggestions[0]['data'] = array();
        if(!$list){
            return FALSE;
        }
        foreach ($list->find('li') as $element) {
            $data = array();
            $linkElement = $element->find('a', 0);
            $linkHref = $linkElement->href;
            $data['link'] = $linkHref;
            $data['word'] = $linkElement->innertext;
            $suggestions[0]['data'][] = $data;
        }
        return $suggestions;
    }

}
