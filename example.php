<?php

namespace Hasantayyar\Synonyms; 

include __DIR__.'/vendor/autoload.php';

$syn = new Synonyms('test');

$thesaurusData = $syn->getThesaurus();
$bighugelabsData = $syn->getBighugelabs();

