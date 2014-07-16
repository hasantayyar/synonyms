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
     * get and get Thesaurus.com data
     */
    public function getThesaurus($word = NULL) {
        $word = !$word ? $this->word : $word;
        $service = new Services\Thesaurus();
        return $service->getWords($word);
    }

    public function getBighugelabs($word = NULL) {
        $word = !$word ? $this->word : $word;
        $service = new Services\Bighugelabs();
        return $service->getWords($word);
    }

    public function getTurkishSynonyms($word = NULL) {
        $word = !$word ? $this->word : $word;
        $service = new Services\TurkishSynonyms();
        return $service->getWords($word);
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
