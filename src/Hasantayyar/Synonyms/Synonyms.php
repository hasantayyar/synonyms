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
    private $words;
    public $suggestions = array();

    public function __construct($word) {
        $this->word = $word;
    }

    public function getWords() {
        return $this->words;
    }

    public function getFormatted() {
        if (!is_array($this->words)) {
            return FALSE;
        }
        $formattedString = '';
        foreach ($this->words as $level) {
            foreach ($level['data'] as $item) {
                $formattedString.= $item['word'] . "\n";
            }
        }
        return $formattedString;
    }

    /**
     * get and get Thesaurus.com data
     */
    public function getThesaurus($word = NULL) {
        $word = !$word ? $this->word : $word;
        $service = new Services\Thesaurus();
        $this->words = $service->getWords($word);
        return $this;
    }

    public function getBighugelabs($word = NULL) {
        $word = !$word ? $this->word : $word;
        $service = new Services\Bighugelabs();
        $this->words = $service->getWords($word);
        return $this;
    }

    public function getTurkishSynonyms($word = NULL) {
        $word = !$word ? $this->word : $word;
        $service = new Services\TurkishSynonyms();
        $this->words = $service->getWords($word);
        return $this;
    }

    public function getWordnik($word = NULL) {
        //https://www.wordnik.com/fragments/tags/test
        return NULL;
    }

    /**
     * @todo get google suggestions
     */
    public function getGoogleSuggestions($word = NULL) {
        return NULL;
    }

}
