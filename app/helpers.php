<?php

function getOfferTypes() {
    return [
        'single' => 'Wohnung',
        'wg' => 'WG Zimmer',
        'house' => 'Haus'
    ];
}

function getRoomFilterTypes() {
    return [
        '1' => 'mind. 1',
        '2' => 'mind. 2',
        '3' => 'mind. 3',
        '4' => 'mind. 4',
    ];
}

function getSizeFilterTypes() {
    return [
        '10' => 'mind. 10m²',
        '20' => 'mind. 20m²',
        '30' => 'mind. 30m²',
        '40' => 'mind. 40m²',
    ];
}

function getRentFilterTypes() {
    return [
        '100' => 'max. 100€',
        '200' => 'max. 200€',
        '300' => 'max. 300€',
        '400' => 'max. 400€',
    ];
}

function getSexTypes() {
    return [
        'w'=>'Weiblich',
        'm'=>'Männlich'
    ];
}