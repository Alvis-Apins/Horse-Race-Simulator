<?php
//5(can add more) horse race - the track is 30 meters long(30 symbols)
//each symbol represents a horse.
//the game ends when all horses finish race
//in the end displays results.

//------------------------------------------
//------------------------------------------
//------------------------------------------
//------------------------------------------
//------------------------------------------

$horses = ['100', '154', '523', '333', '378', '764', '222', '888', '444'];
$trackLength = 30;
$raceTrack = array_fill(0, $trackLength, []);
$time = 0;
$winnersOrder = [];

$raceLinesCount = readline('How many horses You want to participate in the race?(Max 9) :');
echo PHP_EOL;
for ($i = 0; $i < $raceLinesCount; $i++) {
    echo $horses[$i] . ' / ';
}
echo PHP_EOL;
$bet = readline('Chose your horse by the representative number: ');

for ($i = 0; $i < $raceLinesCount; $i++) {
    $raceTrack[$i] = array_fill(0, $trackLength, '-');
    array_unshift($raceTrack[$i], $horses[$i]);


    foreach ($raceTrack[$i] as $track) {
        echo $track;
    }
    echo PHP_EOL;
}

while (count($winnersOrder) != $raceLinesCount) {
    echo PHP_EOL;
    echo 'Timer:' . $time . ' seconds' . PHP_EOL;
    for ($i = 0; $i < $raceLinesCount; $i++) {

        $currentPosition = array_search($horses[$i], $raceTrack[$i]);
        $currentPosition += rand(1, 3);
        $raceTrack[$i] = array_fill(0, $trackLength, '-');
        $raceTrack[$i][$currentPosition] = $horses[$i];

        if ($currentPosition > 29 && !in_array($horses[$i], $winnersOrder)) {
            $winnersOrder[] = $horses[$i];
        }

        foreach ($raceTrack[$i] as $track) {
            echo $track;
        }
        echo PHP_EOL;
    }
    $time++;
    sleep(1);
}

echo PHP_EOL;
for ($i = 0; $i < count($winnersOrder); $i++) {
    echo $i + 1 . "place - Horse Nr. $winnersOrder[$i]" . PHP_EOL;
}
if ($winnersOrder[0] == $bet) {
    echo 'You won, Your horse was first in this race' . PHP_EOL;
} else {
    echo 'You lost, Your horse was in ' . (array_search($bet, $winnersOrder) + 1) . ' place' . PHP_EOL;
}
