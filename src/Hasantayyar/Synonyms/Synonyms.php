<?php

namespace Hasantayyar\Synonyms;

use Yangqi\Htmldom\Htmldom as Htmldom;

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
    public $suggestions = array();

    public function __construct($word) {
        $this->word = $word;
    }

    /**
     * get and print Thesaurus.com data
     */
    public function printThesaurus() {
        $this->getThesaurus();
        print_r($this->suggestions);
    }

    public function getThesaurus() {
        $this->url = 'http://thesaurus.com/browse/' . $this->word;
        $html = new Htmldom($this->url);
        $listDiv = $html->find('.relevancy-list', 0);
        for ($i = 0; $i <= 5; ++$i) {
            $list = $listDiv->find('ul', $i);
            if (!$list) {
                continue;
            }
            $this->suggestions[$i]['data'] = array();
            foreach ($list->find('li') as $element) {
                $data = array();
                $linkElement = $element->find('a', 0);
                $linkSpan = $element->find('a', 0)->find('span', 0);
                $linkHref = $linkElement->href;
                $dataCategory = html_entity_decode($linkElement->getAttribute('data-category'));
                $data['link'] = $linkHref;
                $data['word'] = $linkSpan->innertext;
                $data['extra_data'] = $dataCategory;
                $this->suggestions[$i]['data'][] = $data;
            }
        }
        return $this->suggestions;
    }

    public function getBighugelabs() {
        $this->url = 'http://words.bighugelabs.com/' . $this->word;
        $html = new Htmldom($this->url);
        $list = $html->find('ul[class=words]', 0);

        $this->suggestions[0]['data'] = array();
        foreach ($list->find('li') as $element) {
            $data = array();
            $linkElement = $element->find('a', 0);
            $linkHref = $linkElement->href;
            $data['link'] = $linkHref;
            $data['word'] = $linkElement->innertext;
            $this->suggestions[0]['data'][] = $data;
        }
        return $this->suggestions;
    }

    public function getWordnik() {

        return NULL;
    }

    /**
     * @todo get google suggestions
     */
    public function getGoogleSuggestions() {
        $this->url = '' . $this->word;
        return NULL;
    }

}
