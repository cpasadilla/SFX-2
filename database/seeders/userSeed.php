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

        category::create([
            'name' => 'VOLUME',
        ]);

        category::create([
            'name' => 'APPLIANCES / FURNITURES',
        ]);

        category::create([
            'name' => 'CONSTRUCTION MATERIALS',
        ]);

        category::create([
            'name' => 'STEEL PRODUCTS',
        ]);

        category::create([
            'name' => 'SHEET',
        ]);

        category::create([
            'name' => 'PLYWOOD / LUMBER',
        ]);

        category::create([
            'name' => 'FUEL / LPG',
        ]);

        category::create([
            'name' => 'VEHICLES',
        ]);

        category::create([
            'name' => 'BACK LOAD',
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
            'itemName' => 'TILES ( ALL SIZE )',
            'category' => '1',
            'price' => '84.03',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'TILE ADHESIVE',
            'category' => '1',
            'price' => '35.74',
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
            'price' => '368.95',
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

        priceList::create([
            'itemName' => 'BALIKBAYAN BOX',
            'category' => '2',
            'price' => '419.78',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'BEER, LIGHTS, FULL',
            'category' => '2',
            'price' => '50.88',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'BEER, PILSEN, FULL',
            'category' => '2',
            'price' => '50.88',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'BEER, REDHORSE 1L, FULL',
            'category' => '2',
            'price' => '50.88',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'BEER, REDHORSE 500ml, FULL',
            'category' => '2',
            'price' => '50.88',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'BIHON / MIKI',
            'category' => '2',
            'price' => '112.06',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'BISCUITS',
            'category' => '2',
            'price' => '50.58',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'CHARCOAL SACKS',
            'category' => '2',
            'price' => '50.58',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'CIGARETTE',
            'category' => '2',
            'price' => '140.45',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'COKE 1.5L',
            'category' => '2',
            'price' => '50.58',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);    

        priceList::create([
            'itemName' => 'COKE 1.5L PET',
            'category' => '2',
            'price' => '50.58',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);       

        priceList::create([
            'itemName' => 'COKE 1.75L',
            'category' => '2',
            'price' => '50.58',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);       

        priceList::create([
            'itemName' => 'COKE 12oz',
            'category' => '2',
            'price' => '50.58',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);      

        priceList::create([
            'itemName' => '	COKE 2L',
            'category' => '2',
            'price' => '50.58',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);       

        priceList::create([
            'itemName' => 'COKE 8oz',
            'category' => '2',
            'price' => '50.58',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'COKE IN CANS',
            'category' => '2',
            'price' => '50.58',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'COKE LIT',
            'category' => '2',
            'price' => '50.58',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'CONTAINER JUG, BUNDLE',
            'category' => '2',
            'price' => '291.89',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'CONTAINER, 10 FOOTER & BELOW, FULL',
            'category' => '2',
            'price' => '31484.00',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'CONTAINER, 20 FOOTER, FULL',
            'category' => '2',
            'price' => '62968.02',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'COOKING OIL',
            'category' => '2',
            'price' => '50.58',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'CURLS ( 5 bales = 1 bundle )',
            'category' => '2',
            'price' => '140.45',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'DEXTROSE / MEDICINE',
            'category' => '2',
            'price' => '84.03',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'EGG / 5 bundle',
            'category' => '2',
            'price' => '50.58	',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'FEEDS 25 kg',
            'category' => '2',
            'price' => '69.75',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'FEEDS 50 kg',
            'category' => '2',
            'price' => '139.50',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'FIBER GLASS',
            'category' => '2',
            'price' => '140.45',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'FLOUR 25 kg',
            'category' => '2',
            'price' => '69.75',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'FOAM ( 4 x 36 x 75)',
            'category' => '2',
            'price' => '142.76',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'FOAM ( 4 x 48 x 75 )',
            'category' => '2',
            'price' => '169.11',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'FOAM ( 4 x 54 x 75 )',
            'category' => '2',
            'price' => '196.92',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'FOAM ( 4 x 60 x 75 )',
            'category' => '2',
            'price' => '237.92',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'FOLDING BED',
            'category' => '2',
            'price' => '84.03',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'FUNCHUM / BIGGY / ZEST-O',
            'category' => '2',
            'price' => '15.54',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'GIN',
            'category' => '2',
            'price' => '50.58',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'GLASSWARES ( SMALL )',
            'category' => '2',
            'price' => '84.03',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'GROCERIES',
            'category' => '2',
            'price' => '50.58',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'JUG EMPTY',
            'category' => '2',
            'price' => '28.03',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'LINOLEUM',
            'category' => '2',
            'price' => '270.57',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'LUCKY ME ( CARGO )',
            'category' => '2',
            'price' => '50.58',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'MACARONI',
            'category' => '2',
            'price' => '112.06',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'MATADOR 1L',
            'category' => '2',
            'price' => '50.58',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'MATADOR 750 ml',
            'category' => '2',
            'price' => '50.58',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'MOTOR OIL',
            'category' => '2',
            'price' => '84.03',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'PAIL, LARD ( BIG ) 16L',
            'category' => '2',
            'price' => '140.45',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'PAIL, LARD ( SMALL )',
            'category' => '2',
            'price' => '112.06',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'PLASTIC CHAIR W/ARM',
            'category' => '2',
            'price' => '84.03',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'PLASTIC CHAIR W/O ARM',
            'category' => '2',
            'price' => '50.95',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'PLASTIC TABLE',
            'category' => '2',
            'price' => '140.07',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);
        priceList::create([
            'itemName' => 'PLASTIC WARES ( REGULAR )',
            'category' => '2',
            'price' => '140.45',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'PLASTIC WARES ( SMALL )',
            'category' => '2',
            'price' => '84.03',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);


        priceList::create([
            'itemName' => 'PRIMERA',
            'category' => '2',
            'price' => '50.58',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'RICE 25 kg',
            'category' => '2',
            'price' => '69.75',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'RICE 50 kg',
            'category' => '2',
            'price' => '139.50',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'RTW',
            'category' => '2',
            'price' => '168.19',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'SCHOOL / OFFICE SUPPLIES',
            'category' => '2',
            'price' => '84.03',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'SLIPPERS',
            'category' => '2',
            'price' => '557.54',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'SLIPPERS ( 89 x 82 x 26 )',
            'category' => '2',
            'price' => '343.79',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'SLIPPERS ( 100 x 45 x 97 )',
            'category' => '2',
            'price' => '781.34',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'SOFTDRINKS',
            'category' => '2',
            'price' => '50.58',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'STOOL CHAIR PLASTIC',
            'category' => '2',
            'price' => '27.42',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'TIRE 13',
            'category' => '2',
            'price' => '160.26 ',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'TIRE 14',
            'category' => '2',
            'price' => '224.65',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);
        
        priceList::create([
            'itemName' => 'TIRE 15',
            'category' => '2',
            'price' => '275.50',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'TIRE 16',
            'category' => '2',
            'price' => '306.64',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'TIRE 20',
            'category' => '2',
            'price' => '688.71',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => '	TIRE, BICYCLE',
            'category' => '2',
            'price' => '16.39',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => '	TIRE, MOTORCYCLE',
            'category' => '2',
            'price' => '44.28',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'TRAVELLING BAG',
            'category' => '2',
            'price' => '140.45',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'TUMBLER EMPTY BIG W/CONTENT',
            'category' => '2',
            'price' => '557.54',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'TUMBLER EMPTY REGULAR',
            'category' => '2',
            'price' => '70.04',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'TUMBLER EMPTY BIG',
            'category' => '2',
            'price' => '140.45',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'TUMBLER MEDIUM W/CONTENT',
            'category' => '2',
            'price' => '421.34',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'UKAY-UKAY ( REGULAR SIZE ) 45 kg',
            'category' => '2',
            'price' => ' ',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'VARIOUS ( REGULAR )',
            'category' => '2',
            'price' => '140.45',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'VARIOUS ( SACKS )',
            'category' => '2',
            'price' => '140.45',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);      

        priceList::create([
            'itemName' => 'APPLIANCES ( HIGH VALUE )',
            'category' => '3',
            'price' => '0.00',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '3950.00'
        ]);

        priceList::create([
            'itemName' => 'APPLIANCES ( LOW VALUE )',
            'category' => '3',
            'price' => '0.00',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '2960.00'
        ]);

        priceList::create([
            'itemName' => 'ENGINES',
            'category' => '3',
            'price' => '0.00',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '5900.00'
        ]);
        
        priceList::create([
            'itemName' => 'FURNITURE',
            'category' => '3',
            'price' => '0.00',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '2960.00'
        ]);

        priceList::create([
            'itemName' => 'GLASS JALOUSSIE BLADE ( CRATE )',
            'category' => '3',
            'price' => '0.00',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '3940.00'
        ]);

        priceList::create([
            'itemName' => 'GLASS WINDOW / DOOR / PANEL',
            'category' => '3',
            'price' => '0.00',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '3940.00'
        ]);

        priceList::create([
            'itemName' => 'GLASSWARE ( VOLUME )',
            'category' => '3',
            'price' => '0.00',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '2960.00'
        ]);

        priceList::create([
            'itemName' => 'HARDWARE ( VOLUME )',
            'category' => '3',
            'price' => '0.00',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '2960.00'
        ]);

        priceList::create([
            'itemName' => 'HEAVY LIFT ( per CBM )',
            'category' => '3',
            'price' => '0.00',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '5960.00'
        ]);


        priceList::create([
            'itemName' => 'HEAVY LIFT ( per TON )',
            'category' => '3',
            'price' => '0.00',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '5420.00'
        ]);      

        priceList::create([
            'itemName' => 'HIGH VALUE SPECIAL ITEMS',
            'category' => '3',
            'price' => '0.00',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '7880.00'
        ]);

        priceList::create([
            'itemName' => 'KITCHENWARE',
            'category' => '3',
            'price' => '0.00',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1970.00'
        ]);

        priceList::create([
            'itemName' => 'MOTORCYCLES',
            'category' => '3',
            'price' => '0.00',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '3935.00'
        ]);
        
        priceList::create([
            'itemName' => 'PLASTIC PRODUCTS / CABINETS',
            'category' => '3',
            'price' => '0.00',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1970.00'
        ]);

        priceList::create([
            'itemName' => 'RTW',
            'category' => '3',
            'price' => '0.00',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1630.00'
        ]);

        priceList::create([
            'itemName' => 'SALA SET ( VOLUME )',
            'category' => '3',
            'price' => '0.00',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '2960.00'
        ]);

        priceList::create([
            'itemName' => 'SLIPPERS',
            'category' => '3',
            'price' => '0.00',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1970.00'
        ]);

        priceList::create([
            'itemName' => 'SOFA',
            'category' => '3',
            'price' => '0.00',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '2960.00'
        ]);

        priceList::create([
            'itemName' => 'STYRO FOAM / ICE CHEST',
            'category' => '3',
            'price' => '0.00',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1310.00'
        ]);

        priceList::create([
            'itemName' => 'VARIOUS ( VOLUME )',
            'category' => '3',
            'price' => '0.00',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '2960.00'
        ]);

        priceList::create([
            'itemName' => 'VECHICLES',
            'category' => '3',
            'price' => '0.00',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '2130.00'
        ]);

        priceList::create([
            'itemName' => 'WATER TANK',
            'category' => '3',
            'price' => '0.00',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1970.00'
        ]);

        priceList::create([
            'itemName' => 'AIRCON WINDOW TYPE',
            'category' => '4',
            'price' => '622.39 ',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'AIRCON PACKAGE TYPE ( 2 pcs )',
            'category' => '4',
            'price' => '3045.45',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'AIRCON SPLIT TYPE 1 HP ( 2 pcs )',
            'category' => '4',
            'price' => '987.50',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'AIRCON SPLIT TYPE 2 HP ( 2 pcs )',
            'category' => '4',
            'price' => '1060.97',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'APPLIANCES ( SMALL ) LOW VALUE',
            'category' => '4',
            'price' => '140.45',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '2960.00'
        ]);

        priceList::create([
            'itemName' => 'BAMBOO SET',
            'category' => '4',
            'price' => '1400.60',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'FILING CABINET, STEEL',
            'category' => '4',
            'price' => '1258.18',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'FLAT TELEVISION 14',
            'category' => '4',
            'price' => '229.57',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'FLAT TELEVISION 17',
            'category' => '4',
            'price' => '278.76',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'FLAT TELEVISION 21',
            'category' => '4',
            'price' => '311.56',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'FLAT TELEVISION 24',
            'category' => '4',
            'price' => '383.04',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'FLAT TELEVISION 29',
            'category' => '4',
            'price' => ' ',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'FLAT TELEVISION 32',
            'category' => '4',
            'price' => '524.73',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'FLAT TELEVISION 40',
            'category' => '4',
            'price' => '655.92',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);
        
        priceList::create([
            'itemName' => 'FLAT TELEVISION 43',
            'category' => '4',
            'price' => '709.07',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);
        
        priceList::create([
            'itemName' => 'FLAT TELEVISION 46',
            'category' => '4',
            'price' => '758.41',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'FLAT TELEVISION 55',
            'category' => '4',
            'price' => '906.95',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'PLASTIC CABINET 4L',
            'category' => '4',
            'price' => '693.32',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'PLASTIC CABINET 5L',
            'category' => '4',
            'price' => '787.86',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'PLASTIC CABINET 6L',
            'category' => '4',
            'price' => '895.32',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'REFRIGERATOR 5 CuFt',
            'category' => '4',
            'price' => '1411.26',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'REFRIGERATOR 6 CuFt',
            'category' => '4',
            'price' => '1882.85',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);
        priceList::create([
            'itemName' => 'REFRIGERATOR 7 CuFt',
            'category' => '4',
            'price' => '2691.14',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'REFRIGERATOR 8 CuFt',
            'category' => '4',
            'price' => '3079.42',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'REFRIGERATOR 9 CuFt',
            'category' => '4',
            'price' => '3209.38',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => '	RICE DISPENSER',
            'category' => '4',
            'price' => '201.28',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'SALA SET ( REGULAR )',
            'category' => '4',
            'price' => '2800.78',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '2960.00'
        ]);

        priceList::create([
            'itemName' => 'TELEVISION 14',
            'category' => '4',
            'price' => '459.15',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'TELEVISION 17',
            'category' => '4',
            'price' => '557.54',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'TELEVISION 21',
            'category' => '4',
            'price' => '623.13',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'TELEVISION 24',
            'category' => '4',
            'price' => '766.07',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'TELEVISION 29',
            'category' => '4',
            'price' => '951.08',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'TELEVISION 32',
            'category' => '4',
            'price' => '1049.47',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'TELEVISION 40',
            'category' => '4',
            'price' => '1311.84',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'TELEVISION 46',
            'category' => '4',
            'price' => '1516.81',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'WASHING MACHINE ( 48 x 87 x 58 )',
            'category' => '4',
            'price' => '956.69',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'WASHING MACHINE',
            'category' => '4',
            'price' => '1049.47',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'AMAZON GREEN SCREEN',
            'category' => '5',
            'price' => '140.45',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'BARBED WIRE',
            'category' => '5',
            'price' => '151.47',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'BOWL, PAIL, FLUSH',
            'category' => '5',
            'price' => '140.45',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);

        priceList::create([
            'itemName' => 'CEMENT 40 kg',
            'category' => '5',
            'price' => '75.00',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);
        
        priceList::create([
            'itemName' => 'CWN',
            'category' => '5',
            'price' => '84.19',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);
        
        priceList::create([
            'itemName' => 'CYCLONE WIRE 4',
            'category' => '5',
            'price' => '84.03',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ])
        
        ;priceList::create([
            'itemName' => 'CYCLONE WIRE 6',
            'category' => '5',
            'price' => '140.45',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);
        
        priceList::create([
            'itemName' => 'GUTTER',
            'category' => '5',
            'price' => '34.32',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);
        
        priceList::create([
            'itemName' => 'HARDWARES (REGULAR)',
            'category' => '5',
            'price' => '140.45',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '2960.00'
        ]);
        
        priceList::create([
            'itemName' => 'HARDWARES (SMALL)',
            'category' => '5',
            'price' => '84.03',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '2960.00'
        ]);
        
        priceList::create([
            'itemName' => 'HOG WIRE',
            'category' => '5',
            'price' => '140.45',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);
        
        priceList::create([
            'itemName' => 'LADDER, ALUMINUM',
            'category' => '5',
            'price' => '421.34',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);
        
        priceList::create([
            'itemName' => 'PAINTS',
            'category' => '5',
            'price' => '84.03',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);
        
        priceList::create([
            'itemName' => 'PIPE HDPE 1"(32mm) x 100m',
            'category' => '5',
            'price' => '404.48',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);
        
        priceList::create([
            'itemName' => 'PIPE HDPE 1-1/4"(40mm) x 60m',
            'category' => '5',
            'price' => '379.20',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);
        
        priceList::create([
            'itemName' => 'PIPE HDPE 1-1/2"(50mm) x 60m',
            'category' => '5',
            'price' => '592.50',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);
        
        priceList::create([
            'itemName' => 'PIPE HDPE 2"(63mm) x 60m',
            'category' => '5',
            'price' => '940.10',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);
        
        priceList::create([
            'itemName' => 'PIPE HDPE 2-1/2"(75mm) x 60m',
            'category' => '5',
            'price' => '1333.13',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);
        
        priceList::create([
            'itemName' => 'PIPE HDPE 3"(90mm) x 6m',
            'category' => '5',
            'price' => '191.97',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);
        
        priceList::create([
            'itemName' => 'PIPE HDPE 4"(110mm) x 6m',
            'category' => '5',
            'price' => '286.77',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);
        
        priceList::create([
            'itemName' => 'PVC DOOR',
            'category' => '5',
            'price' => '280.25',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);
        
        priceList::create([
            'itemName' => 'PVC MOLDING',
            'category' => '5',
            'price' => '3.00',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);
        
        priceList::create([
            'itemName' => 'PVC PIPE 1/2(20mm) x 3m',
            'category' => '5',
            'price' => '9.32',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);
        
        priceList::create([
            'itemName' => 'PVC PIPE 3/4(25mm) x 3m',
            'category' => '5',
            'price' => '12.30',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);
        
        priceList::create([
            'itemName' => 'PVC PIPE 1(32mm) x 3m',
            'category' => '5',
            'price' => '16.39',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);
        
        priceList::create([
            'itemName' => 'PVC PIPE 2(63mm) x 3m',
            'category' => '5',
            'price' => '31.22',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);
        
        priceList::create([
            'itemName' => 'PVC PIPE 3(90mm) x 3m',
            'category' => '5',
            'price' => '62.96',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);
        
        priceList::create([
            'itemName' => 'PVC PIPE 4(110mm) x 3m',
            'category' => '5',
            'price' => '70.83',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);
        
        priceList::create([
            'itemName' => 'PVC PIPE 6(160mm) x 3m',
            'category' => '5',
            'price' => '149.55',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);
        
        priceList::create([
            'itemName' => 'ROOF TILES',
            'category' => '5',
            'price' => '10.00',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);
        
        priceList::create([
            'itemName' => 'TIE WIRE 25 kg',
            'category' => '5',
            'price' => '102.50',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);
        
        priceList::create([
            'itemName' => 'TIE WIRE 30 kg',
            'category' => '5',
            'price' => '123.00',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);
        
        priceList::create([
            'itemName' => 'TIE WIRE 45 kg',
            'category' => '5',
            'price' => '184.50',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);
        
        priceList::create([
            'itemName' => 'TILE ADHESIVE 20 kg',
            'category' => '5',
            'price' => '35.74',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);
        
        priceList::create([
            'itemName' => 'TILES 8 x 12 (20cm x 30 cm)',
            'category' => '5',
            'price' => ' ',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);priceList::create([
            'itemName' => 'TILES 8 x 8 (20cm x 20cm)',
            'category' => '5',
            'price' => ' ',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);priceList::create([
            'itemName' => 'WASHING',
            'category' => '4',
            'price' => ' ',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);priceList::create([
            'itemName' => 'WASHING',
            'category' => '4',
            'price' => ' ',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);priceList::create([
            'itemName' => 'WASHING',
            'category' => '4',
            'price' => ' ',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);priceList::create([
            'itemName' => 'WASHING',
            'category' => '4',
            'price' => ' ',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);priceList::create([
            'itemName' => 'WASHING',
            'category' => '4',
            'price' => ' ',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);priceList::create([
            'itemName' => 'WASHING',
            'category' => '4',
            'price' => ' ',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);priceList::create([
            'itemName' => 'WASHING',
            'category' => '4',
            'price' => ' ',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);priceList::create([
            'itemName' => 'WASHING',
            'category' => '4',
            'price' => ' ',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);priceList::create([
            'itemName' => 'WASHING',
            'category' => '4',
            'price' => ' ',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);priceList::create([
            'itemName' => 'WASHING',
            'category' => '4',
            'price' => ' ',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);priceList::create([
            'itemName' => 'WASHING',
            'category' => '4',
            'price' => ' ',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);priceList::create([
            'itemName' => 'WASHING',
            'category' => '4',
            'price' => ' ',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);priceList::create([
            'itemName' => 'WASHING',
            'category' => '4',
            'price' => ' ',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);priceList::create([
            'itemName' => 'WASHING',
            'category' => '4',
            'price' => ' ',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);priceList::create([
            'itemName' => 'WASHING',
            'category' => '4',
            'price' => ' ',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);priceList::create([
            'itemName' => 'WASHING',
            'category' => '4',
            'price' => ' ',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);priceList::create([
            'itemName' => 'WASHING',
            'category' => '4',
            'price' => ' ',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);priceList::create([
            'itemName' => 'WASHING',
            'category' => '4',
            'price' => ' ',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);priceList::create([
            'itemName' => 'WASHING',
            'category' => '4',
            'price' => ' ',
            'length' => '1.00',
            'width' => '1.00',
            'height' => '1.00',
            'multiplier' => '1.00'
        ]);
///////end
        $orderId = "BL1-01";
        parcel::create([
            'itemName' => 'CHARTERED 20FTR',
            'quantity' => '1',
            'unit' => 'KG',
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
