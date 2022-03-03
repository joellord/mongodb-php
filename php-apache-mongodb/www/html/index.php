<?php
require_once __DIR__ . '/vendor/autoload.php';

$client = new MongoDB\Client(
    'mongodb+srv://blog:blog@cluster0.2grje.mongodb.net/myFirstDatabase?authSource=admin&replicaSet=atlas-v6xmes-shard-0&w=majority&readPreference=primary&appname=MongoDB%20Compass&retryWrites=true&ssl=true'
);
$db = $client->perfectMatch;
$collection = $db->speakers;
$collection->drop();

$newSpeaker = [
    "name" => "Joel Lord",
    "bio" => "Joel Lord is a developer advocate at MongoDB…",
    "socials" => [
        "Twitter" => "https://twitter.com/joel__lord",
        "Github" => "https://github.com/joellord"
    ]
];

$result = $collection->insertOne($newSpeaker);
echo("New user inserted in the database with id ".$result->getInsertedId());
echo("<br/>");

$otherSpeakers = [
  [ "name" => "Rob Richardson" ],
  [ "name" => "Hans-Christian Otto" ]
];

$result = $collection->insertMany($otherSpeakers);
echo("Added ".$result->getInsertedCount()." documents");
echo("<br/>");

$speaker = $collection->findOne();
echo("The first speaker found in the collection is ".$speaker->name);
echo("<br/>");

foreach ($speaker->socials as $social => $link) {
  echo($social." (".$link.")");
  echo("<br/>");
}

$speaker = $collection->findOne([ "name" => "Rob Richardson" ]);
echo("Found a match with id ".$speaker->_id);
echo("<br/>");

$speaker = $collection->findOne([ "name" => "Unknown Speaker" ]);
echo(is_null($speaker));
echo("<br/>");

$speakers = $collection->find()->toArray();
echo("This collection contains ".count($speakers)." documents");
echo("<br/>");

$result = $collection->updateOne(
  [ "name" => "Joel Lord" ], 
  ['$set' => [ "bio" => "New bio for Joel" ]]
);
$speaker = $collection->findOne([ "name" => "Joel Lord" ]);
echo("Speaker: ".$speaker->name);
echo("Bio: ".$speaker->bio);
echo("<br/>");

$result = $collection->deleteOne([ "name" => "Rob Richardson" ]);
$speakers = $collection->find()->toArray();
echo("This collection contains ".count($speakers)." documents");
echo("<br/>");

// $data = file_get_contents("")