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
class Thesaurus {

    /**
     * base url with slash "/" at the end
     * @var string
     */
    public $base_url = 'http://thesaurus.com/browse/';

    /**
     * 
     * @return array
     */
    public function getWords($word) {
        $suggestions = array();
        $html = new Htmldom($this->base_url . $word);
        $listDiv = $html->find('.relevancy-list', 0);
        for ($i = 0; $i <= 5; ++$i) {
            $list = $listDiv->find('ul', $i);
            if (!$list) {
                continue;
            }
            $suggestions[$i]['data'] = array();
            foreach ($list->find('li') as $element) {
                $data = array();
                $linkElement = $element->find('a', 0);
                $linkSpan = $element->find('a', 0)->find('span', 0);
                $linkHref = $linkElement->href;
                $dataCategory = html_entity_decode($linkElement->getAttribute('data-category'));
                $data['link'] = $linkHref;
                $data['word'] = $linkSpan->innertext;
                $data['extra_data'] = $dataCategory;
                $suggestions[$i]['data'][] = $data;
            }
        }
        return $suggestions;
    }

}
