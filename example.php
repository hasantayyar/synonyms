<?php

namespace Hasantayyar\Synonyms;

include __DIR__ . '/vendor/autoload.php';

$syn = new Synonyms('deneme');

$thesaurusData = $syn->getThesaurus();
$bighugelabsData = $syn->getBighugelabs();
$turkishSynonyms = $syn->getTurkishSynonyms();

