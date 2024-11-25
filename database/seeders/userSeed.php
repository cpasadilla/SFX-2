<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\staff;
use App\Models\CustomerID;
use App\Models\priceList;
use App\Models\order;
use App\Models\parcel;

use App\Models\category;
class userSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run() :void
    {
        User::create([
            'fName' => 'admin',
            'lName' => 'admin',
            'phoneNum' => '09123456789',
            'email' => 'admin@plm.edu.ph',
            'password' => Hash::make('admin1234'),
            'position' => 'Admin',
            'location' => 'Manila',
        ]);
        User::create([
            'fName' => 'Manila',
            'lName' => 'SFX',
            'phoneNum' => '09453128679',
            'email' => 'm.sfx@sfx.com',
            'password' => Hash::make('admin1234'),
            'position' => 'Staff',
            'location' => 'Manila',
        ]);


        User::create([
            'fName' => 'Batanes',
            'lName' => 'SFX',
            'phoneNum' => '09753124869',
            'email' => 'b.sfx@sfx.com',
            'password' => Hash::make('admin1234'),
            'position' => 'Engineer',
            'location' => 'Batanes',
        ]);


        CustomerID::create([
            'cID' => '0001',
            'fName' => 'Catherine',
            'lName' => 'Pasadilla',
            'phoneNum' => '09748591632',
        ]);

        category::create([
            'name' => 'FIXED PRICE',
        ]);

        category::create([
            'name' => 'GENERAL MERCHANDISE',
        ]);

        priceList::create([
            'itemName' => 'ADHESIVE BAGS',
            'category' => '1',
            'price' => '48.43',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'BARBED WIRE',
            'category' => '1',
            'price' => '151.47',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'BIHON MIKI',
            'category' => '1',
            'price' => '112.10',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'BIKE KID',
            'category' => '1',
            'price' => '140.45',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'BIKE ADULT',
            'category' => '1',
            'price' => '418.15',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'BIKE BASKET',
            'category' => '1',
            'price' => '63.23',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'BICYCLE W/ SIDECAR',
            'category' => '1',
            'price' => '811.69',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'BOWL, PAIL FLUSH',
            'category' => '1',
            'price' => '140.45',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'CEMENT',
            'category' => '1',
            'price' => '75.00',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'CIGARETTE',
            'category' => '1',
            'price' => '140.45',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'COOKING OIL',
            'category' => '1',
            'price' => '50.58',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'CWN',
            'category' => '1',
            'price' => '84.19',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'CYCLONE WIRE 4',
            'category' => '1',
            'price' => '84.03',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'CYCLONE WIRE 6',
            'category' => '1',
            'price' => '140.45',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'CURLS 5 BALES = 1 BNDL',
            'category' => '1',
            'price' => '140.45',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'DOCUMENTS',
            'category' => '1',
            'price' => '133.10',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'DRUMMING ( GASOLINE, UN, PR )',
            'category' => '1',
            'price' => '1035.30',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'EMPTY DRUM',
            'category' => '1',
            'price' => '202.25',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'EGG BUNDLE',
            'category' => '1',
            'price' => '50.58',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'E-BIKE ( 2 WHEELS )',
            'category' => '1',
            'price' => '811.69',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create(attributes: [
            'itemName' => 'EMPTY OXYGEN',
            'category' => '1',
            'price' => '140.80',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'FEEDS 25KG',
            'category' => '1',
            'price' => '69.75',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'FEEDS 50KG',
            'category' => '1',
            'price' => '139.50',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'FIRE EXTINGUISHER',
            'category' => '1',
            'price' => '139.28',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'FLOURS 25KG',
            'category' => '1',
            'price' => '69.70',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'FROZEN PER / KG',
            'category' => '1',
            'price' => '5.00',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'FUNCHUM / ZESTO',
            'category' => '1',
            'price' => '15.54',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'GARLIC',
            'category' => '1',
            'price' => '135.00',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'GROCERIES',
            'category' => '1',
            'price' => '50.58',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'GUTTER',
            'category' => '1',
            'price' => '34.32',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'HELMET',
            'category' => '1',
            'price' => '140.45',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'HOLLOWBLOCKS',
            'category' => '1',
            'price' => '39.93',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'JUG EMPTY / GALLON 30LTRS',
            'category' => '1',
            'price' => '28.03',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'KEROSENE IN JUG',
            'category' => '1',
            'price' => '93.46',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'LINOLEUM',
            'category' => '1',
            'price' => '270.57',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'LPG SMALL 11KG',
            'category' => '1',
            'price' => '72.60',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'LPG MEDIUM 22KG',
            'category' => '1',
            'price' => '148.50',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'LPG BIG 50KG',
            'category' => '1',
            'price' => '330.00',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'LPG EMPTY SMALL ',
            'category' => '1',
            'price' => '32.91',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'LPG EMPTY MEDIUM ',
            'category' => '1',
            'price' => '70.40',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'LPG EMPTY BIG / OXYGEN EMPTY ',
            'category' => '1',
            'price' => '140.80',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'MACARONI',
            'category' => '1',
            'price' => '112.06',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'MOTOR OIL',
            'category' => '1',
            'price' => '84.03',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'MOTOR SMALL ( MIO / BEAT / CLICK )',
            'category' => '1',
            'price' => '2833.57',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'MOTOR MEDIUM ( TMX / XRM / WAVE )',
            'category' => '1',
            'price' => '4035.60',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'MOTORCYCLE BIG',
            'category' => '1',
            'price' => '4885.27',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'MOTORCYCLE W/SIDECAR',
            'category' => '1',
            'price' => '10095.84',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create(attributes: [
            'itemName' => 'OXYGEN TANK',
            'category' => '1',
            'price' => '276.46',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'PAIL LARD ( SMALL )',
            'category' => '1',
            'price' => '112.06',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'PAIL LARD ( BIG ) 16L',
            'category' => '1',
            'price' => '140.45',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'PAINTS SMALL BOX',
            'category' => '1',
            'price' => '84.03',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'PAINTS PAIL',
            'category' => '1',
            'price' => '140.45',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'PARCEL',
            'category' => '1',
            'price' => '133.10',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'PLYWOOD 1/4',
            'category' => '1',
            'price' => '45.92',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'PLYWOOD 1/2',
            'category' => '1',
            'price' => '91.84',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'PLYWOOD 3/4',
            'category' => '1',
            'price' => '137.76',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'PLYWOOD 1',
            'category' => '1',
            'price' => '183.88',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'RICE 25KG',
            'category' => '1',
            'price' => '69.75',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'RICE 50KG',
            'category' => '1',
            'price' => '139.50',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'RIDGE ROLL',
            'category' => '1',
            'price' => '34.32',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'RTW',
            'category' => '1',
            'price' => '168.19',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'ROOT CROPS',
            'category' => '1',
            'price' => '84.03',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'SAND',
            'category' => '1',
            'price' => '1850.00',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'SUPERKALAN',
            'category' => '1',
            'price' => '29.51',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'SKIMCOAT',
            'category' => '1',
            'price' => '35.74',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'STOOL CHAIR PLASTIC',
            'category' => '1',
            'price' => '27.42',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'SKIMCOAT',
            'category' => '1',
            'price' => '35.74',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'TILES ( ALL SIZE )',
            'category' => '1',
            'price' => '84.03',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'TIRE 13',
            'category' => '1',
            'price' => '160.29',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'TIRE 14',
            'category' => '1',
            'price' => '224.65',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'TIRE 15',
            'category' => '1',
            'price' => '275.50',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'TIRE 16',
            'category' => '1',
            'price' => '306.64',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'TIRE 20',
            'category' => '1',
            'price' => '688.71',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'TIRE ( BICYCLE )',
            'category' => '1',
            'price' => '16.39',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'TIRE ( MOTORCYCLE )',
            'category' => '1',
            'price' => '44.28',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'TUMBLER BIG W/CONTENT',
            'category' => '1',
            'price' => '557.54',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'TUMBLER MEDIUM W/CONTENT',
            'category' => '1',
            'price' => '421.34',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'TUMBLER EMPTY REGULAR',
            'category' => '1',
            'price' => '70.04',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'TUMBLER EMPTY BIG',
            'category' => '1',
            'price' => '140.45',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'VARIOUS UKAY 45KG',
            'category' => '1',
            'price' => '419.78',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'VARIOUS UKAY 50KG',
            'category' => '1',
            'price' => '466.43',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'VARIOUS UKAY 100KG',
            'category' => '1',
            'price' => '839.58',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'WELDED WIRE',
            'category' => '1',
            'price' => '140.45',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'WOODEN DOOR',
            'category' => '1',
            'price' => '140.45',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => '5KL TANK',
            'category' => '1',
            'price' => '20460.00',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'SMALL BOX',
            'category' => '1',
            'price' => '84.03',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'REGULAR BOX',
            'category' => '1',
            'price' => '140.45',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'CHARTERED 10FTR',
            'category' => '1',
            'price' => '31484.00',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'CHARTERED 20FTR',
            'category' => '1',
            'price' => '62968.02',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        $orderId = "BL0001";
        parcel::create([
            'itemName' => 'CHARTERED 20FTR',
            'quantity' => '1',
            'price' => '62968.02',
            'total' => '62968.02',
            'orderId' => $orderId,
        ]);

        date_default_timezone_set('Asia/Manila');
        $date = date("F d 20y - g:i a");
        order::create([
            'shipNum'=> '3',
            'origin' => 'Manila',
            'destination' => 'Batanes',
            'totalAmount' => '381.63',
            'cID' => '0001',
            'orderId' => $orderId,
            'orderCreated' => $date,
            'consigneeName' => 'Janus',
            'consigneeNum' => '09451278396',
            'voyageNum' => '2',
            'containerNum' => '2',
            'cargoNum' => '2',
            'value' => '123'

        ]);
    }
}
