<?php

namespace Hasantayyar\Synonyms;

include __DIR__ . '/vendor/autoload.php';

$syn = new Synonyms('money');

$thesaurusData = $syn->getThesaurus();
print_r($thesaurusData->getWords());
echo $thesaurusData->getFormatted();

echo "_______________\n";
$bighugelabsData = $syn->getBighugelabs();
echo $thesaurusData->getFormatted();

echo "_______________\n";
$turkishSynonyms = $syn->getTurkishSynonyms();
echo $thesaurusData->getFormatted();
