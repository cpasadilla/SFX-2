<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\MySqlConnection;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\staff;
use App\Models\CustomerID;
use App\Models\priceList;
use App\Models\order;
use App\Models\parcel;

use App\Models\category;
use App\Models\ship;
use App\Models\voyage;

class userSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run() :void
    {
        User::create([
            'fName' => 'ANTONIO',
            'lName' => 'CASTRO',
            'phoneNum' => '09123414588',
            'email' => 'admin@sfx.com',
            'password' => Hash::make('admin1234'),
            'position' => 'Admin',
            'location' => 'Manila',
        ]);
        User::create([
            'fName' => 'JENNALYN',
            'lName' => 'OLI',
            'phoneNum' => '09453128689',
            'email' => 'oli@sfx.com',
            'password' => Hash::make('admin1234'),
            'position' => 'Admin',
            'location' => 'Manila',
        ]);

        User::create([
            'fName' => 'JOLINA',
            'lName' => 'FLORES',
            'phoneNum' => '09753124869',
            'email' => 'flores@sfx.com',
            'password' => Hash::make('admin1234'),
            'position' => 'Staff',
            'location' => 'Manila',
        ]);

        User::create([
            'fName' => 'JHENELL',
            'lName' => 'DE GUZMAN',
            'email' => 'deguzman.sfx@sfx.com',
            'password' => Hash::make('admin1234'),
            'position' => 'Staff',
            'location' => 'Manila',
        ]);

        User::create([
            'fName' => 'MARY JOY',
            'lName' => 'IMBON',
            'email' => 'imbonx@sfx.com',
            'password' => Hash::make('admin1234'),
            'position' => 'Staff',
            'location' => 'Manila',
        ]);

        User::create([
            'fName' => 'CATHERINE',
            'lName' => 'PASADILLA',
            'email' => 'pasadilla@sfx.com',
            'password' => Hash::make('admin1234'),
            'position' => 'Admin',
            'location' => 'Manila',
        ]);

        CustomerID::create([
            'cID' => '0001',
            'fName' => 'CATHERINE',
            'lName' => 'PASADILLA',
            'phoneNum' => '09748591632'
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
            'price' => '53.27'
        ]);

        priceList::create([
            'itemName' => 'BARBED WIRE',
            'category' => '1',
            'price' => '166.62'
        ]);

        priceList::create([
            'itemName' => 'BIHON MIKI',
            'category' => '1',
            'price' => '123.31'
        ]);

        priceList::create([
            'itemName' => 'BIKE KID',
            'category' => '1',
            'price' => '154.50'
        ]);

        priceList::create([
            'itemName' => 'BIKE ADULT',
            'category' => '1',
            'price' => '459.97'
        ]);

        priceList::create([
            'itemName' => 'BIKE BASKET',
            'category' => '1',
            'price' => '69.55'
        ]);

        priceList::create([
            'itemName' => 'BICYCLE W/ SIDECAR',
            'category' => '1',
            'price' => '892.86'
        ]);

        priceList::create([
            'itemName' => 'BOWL, PAIL FLUSH',
            'category' => '1',
            'price' => '154.50'
        ]);

        priceList::create([
            'itemName' => 'CEMENT',
            'category' => '1',
            'price' => '82.50'
        ]);

        priceList::create([
            'itemName' => 'CIGARETTE',
            'category' => '1',
            'price' => '154.50'
        ]);

        priceList::create([
            'itemName' => 'COOKING OIL',
            'category' => '1',
            'price' => '55.64'
        ]);

        priceList::create([
            'itemName' => 'CWN',
            'category' => '1',
            'price' => '92.61'
        ]);

        priceList::create([
            'itemName' => 'CYCLONE WIRE 4',
            'category' => '1',
            'price' => '92.43'
        ]);

        priceList::create([
            'itemName' => 'CYCLONE WIRE 6',
            'category' => '1',
            'price' => '154.50'
        ]);

        priceList::create([
            'itemName' => 'CURLS 5 BALES = 1 BNDL',
            'category' => '1',
            'price' => '154.50'
        ]);

        priceList::create([
            'itemName' => 'DOCUMENTS',
            'category' => '1',
            'price' => '146.41'
        ]);

        priceList::create([
            'itemName' => 'DRUMMING ( GASOLINE, UN, PR )',
            'category' => '1',
            'price' => '1138.83'
        ]);

        priceList::create([
            'itemName' => 'EMPTY DRUM',
            'category' => '1',
            'price' => '222.48'
        ]);

        priceList::create([
            'itemName' => 'EGG BUNDLE',
            'category' => '1',
            'price' => '55.64'
        ]);

        priceList::create([
            'itemName' => 'E-BIKE ( 2 WHEELS )',
            'category' => '1',
            'price' => '892.86'
        ]);

        priceList::create(attributes: [
            'itemName' => 'EMPTY OXYGEN',
            'category' => '1',
            'price' => '154.88'
        ]);

        priceList::create([
            'itemName' => 'FEEDS 25KG',
            'category' => '1',
            'price' => '76.73'
        ]);

        priceList::create([
            'itemName' => 'FEEDS 50KG',
            'category' => '1',
            'price' => '153.45'
        ]);

        priceList::create([
            'itemName' => 'FIRE EXTINGUISHER',
            'category' => '1',
            'price' => '153.21'
        ]);

        priceList::create([
            'itemName' => 'FLOURS 25KG',
            'category' => '1',
            'price' => '76.67'
        ]);

        priceList::create([
            'itemName' => 'FROZEN PER / KG',
            'category' => '1',
            'price' => '5.50'
        ]);

        priceList::create([
            'itemName' => 'FUNCHUM / ZESTO',
            'category' => '1',
            'price' => '17.09'
        ]);

        priceList::create([
            'itemName' => 'GARLIC',
            'category' => '1',
            'price' => '148.50'
        ]);

        priceList::create([
            'itemName' => 'GROCERIES',
            'category' => '1',
            'price' => '55.64'
        ]);

        priceList::create([
            'itemName' => 'GUTTER',
            'category' => '1',
            'price' => '37.75'
        ]);

        priceList::create([
            'itemName' => 'HELMET',
            'category' => '1',
            'price' => '154.50'
        ]);

        priceList::create([
            'itemName' => 'HOLLOWBLOCKS',
            'category' => '1',
            'price' => '43.92'
        ]);

        priceList::create([
            'itemName' => 'JUG EMPTY / GALLON 30LTRS',
            'category' => '1',
            'price' => '30.83'
        ]);

        priceList::create([
            'itemName' => 'KEROSENE IN JUG',
            'category' => '1',
            'price' => '102.81'
        ]);

        priceList::create([
            'itemName' => 'LINOLEUM',
            'category' => '1',
            'price' => '297.63'
        ]);

        priceList::create([
            'itemName' => 'LPG SMALL 11KG',
            'category' => '1',
            'price' => '79.86'
        ]);

        priceList::create([
            'itemName' => 'LPG MEDIUM 22KG',
            'category' => '1',
            'price' => '163.35'
        ]);

        priceList::create([
            'itemName' => 'LPG BIG 50KG',
            'category' => '1',
            'price' => '363.00'
        ]);

        priceList::create([
            'itemName' => 'LPG EMPTY SMALL ',
            'category' => '1',
            'price' => '36.20'
        ]);

        priceList::create([
            'itemName' => 'LPG EMPTY MEDIUM ',
            'category' => '1',
            'price' => '77.44'
        ]);

        priceList::create([
            'itemName' => 'LPG EMPTY BIG / OXYGEN EMPTY ',
            'category' => '1',
            'price' => '154.88'
        ]);

        priceList::create([
            'itemName' => 'MACARONI',
            'category' => '1',
            'price' => '123.27'
        ]);

        priceList::create([
            'itemName' => 'MOTOR OIL',
            'category' => '1',
            'price' => '92.43'
        ]);

        priceList::create([
            'itemName' => 'MOTOR SMALL ( MIO / BEAT / CLICK )',
            'category' => '1',
            'price' => '3116.93'
        ]);

        priceList::create([
            'itemName' => 'MOTOR MEDIUM ( TMX / XRM / WAVE )',
            'category' => '1',
            'price' => '4439.16'
        ]);

        priceList::create([
            'itemName' => 'MOTORCYCLE BIG',
            'category' => '1',
            'price' => '5373.80'
        ]);

        priceList::create([
            'itemName' => 'MOTORCYCLE W/SIDECAR',
            'category' => '1',
            'price' => '11105.42'
        ]);

        priceList::create(attributes: [
            'itemName' => 'OXYGEN TANK',
            'category' => '1',
            'price' => '304.11'
        ]);

        priceList::create([
            'itemName' => 'PAIL LARD ( SMALL )',
            'category' => '1',
            'price' => '123.27'
        ]);

        priceList::create([
            'itemName' => 'PAIL LARD ( BIG ) 16L',
            'category' => '1',
            'price' => '154.50'
        ]);

        priceList::create([
            'itemName' => 'PAINTS SMALL BOX',
            'category' => '1',
            'price' => '92.43'
        ]);

        priceList::create([
            'itemName' => 'PAINTS PAIL',
            'category' => '1',
            'price' => '154.50'
        ]);

        priceList::create([
            'itemName' => 'PARCEL',
            'category' => '1',
            'price' => '146.41'
        ]);

        priceList::create([
            'itemName' => 'PLYWOOD 1/4',
            'category' => '1',
            'price' => '50.15'
        ]);

        priceList::create([
            'itemName' => 'PLYWOOD 1/2',
            'category' => '1',
            'price' => '101.02'
        ]);

        priceList::create([
            'itemName' => 'PLYWOOD 3/4',
            'category' => '1',
            'price' => '151.54'
        ]);

        priceList::create([
            'itemName' => 'PLYWOOD 1',
            'category' => '1',
            'price' => '202.27'
        ]);

        priceList::create([
            'itemName' => 'RICE 25KG',
            'category' => '1',
            'price' => '76.73'
        ]);

        priceList::create([
            'itemName' => 'RICE 50KG',
            'category' => '1',
            'price' => '153.45'
        ]);

        priceList::create([
            'itemName' => 'RIDGE ROLL',
            'category' => '1',
            'price' => '37.75'
        ]);

        priceList::create([
            'itemName' => 'RTW',
            'category' => '1',
            'price' => '185.01'
        ]);

        priceList::create([
            'itemName' => 'ROOT CROPS',
            'category' => '1',
            'price' => '92.43'
        ]);

        priceList::create([
            'itemName' => 'SAND',
            'category' => '1',
            'price' => '2035.00'
        ]);

        priceList::create([
            'itemName' => 'SUPERKALAN',
            'category' => '1',
            'price' => '32.46'
        ]);

        priceList::create([
            'itemName' => 'SKIMCOAT',
            'category' => '1',
            'price' => '39.31'
        ]);

        priceList::create([
            'itemName' => 'STOOL CHAIR PLASTIC',
            'category' => '1',
            'price' => '30.16'
        ]);

        priceList::create([
            'itemName' => 'TILES ( ALL SIZE )',
            'category' => '1',
            'price' => '92.43'
        ]);

        priceList::create([
            'itemName' => 'TILE ADHESIVE',
            'category' => '1',
            'price' => '39.31'
        ]);

        priceList::create([
            'itemName' => 'TIRE 13',
            'category' => '1',
            'price' => '176.32'
        ]);

        priceList::create([
            'itemName' => 'TIRE 14',
            'category' => '1',
            'price' => '247.12'
        ]);

        priceList::create([
            'itemName' => 'TIRE 15',
            'category' => '1',
            'price' => '303.05'
        ]);

        priceList::create([
            'itemName' => 'TIRE 16',
            'category' => '1',
            'price' => '337.30'
        ]);

        priceList::create([
            'itemName' => 'TIRE 20',
            'category' => '1',
            'price' => '757.58'
        ]);

        priceList::create([
            'itemName' => 'TIRE ( BICYCLE )',
            'category' => '1',
            'price' => '18.03'
        ]);

        priceList::create([
            'itemName' => 'TIRE ( MOTORCYCLE )',
            'category' => '1',
            'price' => '48.71'
        ]);

        priceList::create([
            'itemName' => 'TUMBLER BIG W/CONTENT',
            'category' => '1',
            'price' => '613.29'
        ]);

        priceList::create([
            'itemName' => 'TUMBLER MEDIUM W/CONTENT',
            'category' => '1',
            'price' => '463.47'
        ]);

        priceList::create([
            'itemName' => 'TUMBLER EMPTY REGULAR',
            'category' => '1',
            'price' => '77.04'
        ]);

        priceList::create([
            'itemName' => 'TUMBLER EMPTY BIG',
            'category' => '1',
            'price' => '154.50'
        ]);

        priceList::create([
            'itemName' => 'VARIOUS UKAY 45KG',
            'category' => '1',
            'price' => '461.76'
        ]);

        priceList::create([
            'itemName' => 'VARIOUS UKAY 50KG',
            'category' => '1',
            'price' => '513.07'
        ]);

        priceList::create([
            'itemName' => 'VARIOUS UKAY 100KG',
            'category' => '1',
            'price' => '923.54'
        ]);

        priceList::create([
            'itemName' => 'WELDED WIRE',
            'category' => '1',
            'price' => '154.50'
        ]);

        priceList::create([
            'itemName' => 'WOODEN DOOR',
            'category' => '1',
            'price' => '405.85'
        ]);

        priceList::create([
            'itemName' => '5KL TANK',
            'category' => '1',
            'price' => '22506.00'
        ]);

        priceList::create([
            'itemName' => 'SMALL BOX',
            'category' => '1',
            'price' => '92.43'
        ]);

        priceList::create([
            'itemName' => 'REGULAR BOX',
            'category' => '1',
            'price' => '154.50'
        ]);

        priceList::create([
            'itemName' => 'CHARTERED 10FTR',
            'category' => '1',
            'price' => '34632.40'
        ]);

        priceList::create([
            'itemName' => 'CHARTERED 20FTR',
            'category' => '1',
            'price' => '69264.82'
        ]);

        priceList::create([
            'itemName' => 'BALIKBAYAN BOX',
            'category' => '2',
            'price' => '461.76',
            'multiplier' => '3256.00'
        ]);

        priceList::create([
            'itemName' => 'BEER, LIGHTS, FULL',
            'category' => '2',
            'price' => '55.97'
        ]);

        priceList::create([
            'itemName' => 'BEER, PILSEN, FULL',
            'category' => '2',
            'price' => '55.64'
        ]);

        priceList::create([
            'itemName' => 'BEER, REDHORSE 1L, FULL',
            'category' => '2',
            'price' => '55.64'
        ]);

        priceList::create([
            'itemName' => 'BEER, REDHORSE 500ml, FULL',
            'category' => '2',
            'price' => '55.64'
        ]);

        priceList::create([
            'itemName' => 'BIHON / MIKI',
            'category' => '2',
            'price' => '123.27'
        ]);

        priceList::create([
            'itemName' => 'BISCUITS',
            'category' => '2',
            'price' => '55.64'
        ]);

        priceList::create([
            'itemName' => 'CHARCOAL SACKS',
            'category' => '2',
            'price' => '55.64'
        ]);

        priceList::create([
            'itemName' => 'CIGARETTE',
            'category' => '2',
            'price' => '154.50'
        ]);

        priceList::create([
            'itemName' => 'COKE 1.5L',
            'category' => '2',
            'price' => '55.64'
        ]);

        priceList::create([
            'itemName' => 'COKE 1.5L PET',
            'category' => '2',
            'price' => '55.64'
        ]);

        priceList::create([
            'itemName' => 'COKE 1.75L',
            'category' => '2',
            'price' => '55.64'
        ]);

        priceList::create([
            'itemName' => 'COKE 12oz',
            'category' => '2',
            'price' => '55.64'
        ]);

        priceList::create([
            'itemName' => '	COKE 2L',
            'category' => '2',
            'price' => '55.64'
        ]);

        priceList::create([
            'itemName' => 'COKE 8oz',
            'category' => '2',
            'price' => '55.64'
        ]);

        priceList::create([
            'itemName' => 'COKE IN CANS',
            'category' => '2',
            'price' => '55.64'
        ]);

        priceList::create([
            'itemName' => 'COKE LIT',
            'category' => '2',
            'price' => '55.64'
        ]);

        priceList::create([
            'itemName' => 'CONTAINER JUG, BUNDLE',
            'category' => '2',
            'price' => '321.08'
        ]);

        priceList::create([
            'itemName' => 'CONTAINER, 10 FOOTER & BELOW, FULL',
            'category' => '2',
            'price' => '34632.40'
        ]);

        priceList::create([
            'itemName' => 'CONTAINER, 20 FOOTER, FULL',
            'category' => '2',
            'price' => '69264.82'
        ]);

        priceList::create([
            'itemName' => 'COOKING OIL',
            'category' => '2',
            'price' => '55.64'
        ]);

        priceList::create([
            'itemName' => 'CURLS ( 5 bales = 1 bundle )',
            'category' => '2',
            'price' => '154.50'
        ]);

        priceList::create([
            'itemName' => 'DEXTROSE / MEDICINE',
            'category' => '2',
            'price' => '92.43'
        ]);

        priceList::create([
            'itemName' => 'EGG / 5 bundle',
            'category' => '2',
            'price' => '55.64'
        ]);

        priceList::create([
            'itemName' => 'FEEDS 25 kg',
            'category' => '2',
            'price' => '76.73'
        ]);

        priceList::create([
            'itemName' => 'FEEDS 50 kg',
            'category' => '2',
            'price' => '153.45'
        ]);

        priceList::create([
            'itemName' => 'FIBER GLASS',
            'category' => '2',
            'price' => '154.50'
        ]);

        priceList::create([
            'itemName' => 'FLOUR 25 kg',
            'category' => '2',
            'price' => '76.73'
        ]);

        priceList::create([
            'itemName' => 'FOAM ( 4 x 36 x 75)',
            'category' => '2',
            'price' => '157.04',
            'multiplier' => '1441.00'
        ]);

        priceList::create([
            'itemName' => 'FOAM ( 4 x 48 x 75 )',
            'category' => '2',
            'price' => '186.02',
            'multiplier' => '1441.00'
        ]);

        priceList::create([
            'itemName' => 'FOAM ( 4 x 54 x 75 )',
            'category' => '2',
            'price' => '216.61',
            'multiplier' => '1441.00'
        ]);

        priceList::create([
            'itemName' => 'FOAM ( 4 x 60 x 75 )',
            'category' => '2',
            'price' => '261.71',
            'multiplier' => '1441.00'
        ]);

        priceList::create([
            'itemName' => 'FOLDING BED',
            'category' => '2',
            'price' => '92.43'
        ]);

        priceList::create([
            'itemName' => 'FUNCHUM / BIGGY / ZEST-O',
            'category' => '2',
            'price' => '17.09'
        ]);

        priceList::create([
            'itemName' => 'GIN',
            'category' => '2',
            'price' => '55.64'
        ]);

        priceList::create([
            'itemName' => 'GLASSWARES ( SMALL )',
            'category' => '2',
            'price' => '92.43',
            'multiplier' => '3256.00'
        ]);

        priceList::create([
            'itemName' => 'GROCERIES',
            'category' => '2',
            'price' => '55.64',
            'multiplier' => '1793.00'
        ]);

        priceList::create([
            'itemName' => 'JUG EMPTY',
            'category' => '2',
            'price' => '30.83'
        ]);

        priceList::create([
            'itemName' => 'LINOLEUM',
            'category' => '2',
            'price' => '297.63'
        ]);

        priceList::create([
            'itemName' => 'LUCKY ME ( CARGO )',
            'category' => '2',
            'price' => '55.64'
        ]);

        priceList::create([
            'itemName' => 'MACARONI',
            'category' => '2',
            'price' => '123.27'
        ]);

        priceList::create([
            'itemName' => 'MATADOR 1L',
            'category' => '2',
            'price' => '55.64'
        ]);

        priceList::create([
            'itemName' => 'MATADOR 750 ml',
            'category' => '2',
            'price' => '55.64'
        ]);

        priceList::create([
            'itemName' => 'MOTOR OIL',
            'category' => '2',
            'price' => '92.43'
        ]);

        priceList::create([
            'itemName' => 'PAIL, LARD ( BIG ) 16L',
            'category' => '2',
            'price' => '154.50'
        ]);

        priceList::create([
            'itemName' => 'PAIL, LARD ( SMALL )',
            'category' => '2',
            'price' => '123.27'
        ]);

        priceList::create([
            'itemName' => 'PLASTIC CHAIR W/ARM',
            'category' => '2',
            'price' => '92.43'
        ]);

        priceList::create([
            'itemName' => 'PLASTIC CHAIR W/O ARM',
            'category' => '2',
            'price' => '56.05'
        ]);

        priceList::create([
            'itemName' => 'PLASTIC TABLE',
            'category' => '2',
            'price' => '154.08
            '
        ]);
        priceList::create([
            'itemName' => 'PLASTIC WARES ( REGULAR )',
            'category' => '2',
            'price' => '154.50',
            'multiplier' => '2167.00'
        ]);

        priceList::create([
            'itemName' => 'PLASTIC WARES ( SMALL )',
            'category' => '2',
            'price' => '92.43',
            'multiplier' => '2167.00'
        ]);

        priceList::create([
            'itemName' => 'PRIMERA',
            'category' => '2',
            'price' => '55.64'
        ]);

        priceList::create([
            'itemName' => 'RICE 25 kg',
            'category' => '2',
            'price' => '76.73'
        ]);

        priceList::create([
            'itemName' => 'RICE 50 kg',
            'category' => '2',
            'price' => '153.45'
        ]);

        priceList::create([
            'itemName' => 'RTW',
            'category' => '2',
            'price' => '185.01'
        ]);

        priceList::create([
            'itemName' => 'SCHOOL / OFFICE SUPPLIES',
            'category' => '2',
            'price' => '92.43'
        ]);

        priceList::create([
            'itemName' => 'SLIPPERS',
            'category' => '2',
            'price' => '613.29',
            'multiplier' => '2167.00'
        ]);

        priceList::create([
            'itemName' => 'SLIPPERS ( 89 x 82 x 26 )',
            'category' => '2',
            'price' => '378.17',
            'multiplier' => '2167.00'
        ]);

        priceList::create([
            'itemName' => 'SLIPPERS ( 100 x 45 x 97 )',
            'category' => '2',
            'price' => '859.47',
            'multiplier' => '2167.00'
        ]);

        priceList::create([
            'itemName' => 'SOFTDRINKS',
            'category' => '2',
            'price' => '55.64'
        ]);

        priceList::create([
            'itemName' => 'STOOL CHAIR PLASTIC',
            'category' => '2',
            'price' => '30.16'
        ]);

        priceList::create([
            'itemName' => 'TIRE 13',
            'category' => '2',
            'price' => '176.29'
        ]);

        priceList::create([
            'itemName' => 'TIRE 14',
            'category' => '2',
            'price' => '247.12'
        ]);

        priceList::create([
            'itemName' => 'TIRE 15',
            'category' => '2',
            'price' => '303.05'
        ]);

        priceList::create([
            'itemName' => 'TIRE 16',
            'category' => '2',
            'price' => '337.30'
        ]);

        priceList::create([
            'itemName' => 'TIRE 20',
            'category' => '2',
            'price' => '757.58'
        ]);

        priceList::create([
            'itemName' => '	TIRE, BICYCLE',
            'category' => '2',
            'price' => '18.03'
        ]);

        priceList::create([
            'itemName' => '	TIRE, MOTORCYCLE',
            'category' => '2',
            'price' => '48.71'
        ]);

        priceList::create([
            'itemName' => 'TRAVELLING BAG',
            'category' => '2',
            'price' => '154.50'
        ]);

        priceList::create([
            'itemName' => 'TUMBLER EMPTY BIG W/CONTENT',
            'category' => '2',
            'price' => '613.29'
        ]);

        priceList::create([
            'itemName' => 'TUMBLER EMPTY REGULAR',
            'category' => '2',
            'price' => '77.04'
        ]);

        priceList::create([
            'itemName' => 'TUMBLER EMPTY BIG',
            'category' => '2',
            'price' => '154.50'
        ]);

        priceList::create([
            'itemName' => 'TUMBLER MEDIUM W/CONTENT',
            'category' => '2',
            'price' => '463.47'
        ]);

        priceList::create([
            'itemName' => 'UKAY-UKAY ( REGULAR SIZE ) 45 kg',
            'category' => '2',
            'price' => '461.76',
        ]);

        priceList::create([
            'itemName' => 'VARIOUS ( REGULAR )',
            'category' => '2',
            'price' => '154.50'
        ]);

        priceList::create([
            'itemName' => 'VARIOUS ( SACKS )',
            'category' => '2',
            'price' => '154.50'
        ]);

        priceList::create([
            'itemName' => 'APPLIANCES ( HIGH VALUE )',
            'category' => '3',
            'price' => '0.00',
            'multiplier' => '4345.00'
        ]);

        priceList::create([
            'itemName' => 'APPLIANCES ( LOW VALUE )',
            'category' => '3',
            'price' => '0.00',
            'multiplier' => '3256.00'
        ]);

        priceList::create([
            'itemName' => 'ENGINES',
            'category' => '3',
            'price' => '0.00',
            'multiplier' => '6490.00'
        ]);

        priceList::create([
            'itemName' => 'FURNITURE',
            'category' => '3',
            'price' => '0.00',
            'multiplier' => '3256.00'
        ]);

        priceList::create([
            'itemName' => 'GLASS JALOUSSIE BLADE ( CRATE )',
            'category' => '3',
            'price' => '0.00',
            'multiplier' => '4334.00'
        ]);

        priceList::create([
            'itemName' => 'GLASS WINDOW / DOOR / PANEL',
            'category' => '3',
            'price' => '0.00',
            'multiplier' => '4334.00'
        ]);

        priceList::create([
            'itemName' => 'GLASSWARE ( VOLUME )',
            'category' => '3',
            'price' => '0.00',
            'multiplier' => '3256.00'
        ]);

        priceList::create([
            'itemName' => 'HARDWARE ( VOLUME )',
            'category' => '3',
            'price' => '0.00',
            'multiplier' => '3256.00'
        ]);

        priceList::create([
            'itemName' => 'HEAVY LIFT ( per CBM )',
            'category' => '3',
            'price' => '0.00',
            'multiplier' => '6556.00'
        ]);


        priceList::create([
            'itemName' => 'HEAVY LIFT ( per TON )',
            'category' => '3',
            'price' => '0.00',
            'multiplier' => '5962.00'
        ]);

        priceList::create([
            'itemName' => 'HIGH VALUE SPECIAL ITEMS',
            'category' => '3',
            'price' => '0.00',
            'multiplier' => '8668.00'
        ]);

        priceList::create([
            'itemName' => 'KITCHENWARE',
            'category' => '3',
            'price' => '0.00',
            'multiplier' => '2167.00'
        ]);

        priceList::create([
            'itemName' => 'MOTORCYCLES',
            'category' => '3',
            'price' => '0.00',
            'multiplier' => '4328.50'
        ]);

        priceList::create([
            'itemName' => 'PLASTIC PRODUCTS / CABINETS',
            'category' => '3',
            'price' => '0.00',
            'multiplier' => '2167.00'
        ]);

        priceList::create([
            'itemName' => 'RTW',
            'category' => '3',
            'price' => '0.00',
            'multiplier' => '1793.00'
        ]);

        priceList::create([
            'itemName' => 'SALA SET ( VOLUME )',
            'category' => '3',
            'price' => '0.00',
            'multiplier' => '3256.00'
        ]);

        priceList::create([
            'itemName' => 'SLIPPERS',
            'category' => '3',
            'price' => '0.00',
            'multiplier' => '2167.00'
        ]);

        priceList::create([
            'itemName' => 'SOFA',
            'category' => '3',
            'price' => '0.00',
            'multiplier' => '3256.00'
        ]);

        priceList::create([
            'itemName' => 'STYRO FOAM / ICE CHEST',
            'category' => '3',
            'price' => '0.00',
            'multiplier' => '1441.00'
        ]);

        priceList::create([
            'itemName' => 'VARIOUS ( VOLUME )',
            'category' => '3',
            'price' => '0.00',
            'multiplier' => '3256.00'
        ]);

        priceList::create([
            'itemName' => 'VECHICLES',
            'category' => '3',
            'price' => '0.00',
            'multiplier' => '2343.00'
        ]);

        priceList::create([
            'itemName' => 'WATER TANK',
            'category' => '3',
            'price' => '0.00',
            'multiplier' => '2167.00'
        ]);

        priceList::create([
            'itemName' => 'AIRCON WINDOW TYPE',
            'category' => '4',
            'price' => '684.63'
        ]);

        priceList::create([
            'itemName' => 'AIRCON PACKAGE TYPE ( 2 pcs )',
            'category' => '4',
            'price' => '3350.00'
        ]);

        priceList::create([
            'itemName' => 'AIRCON SPLIT TYPE 1 HP ( 2 pcs )',
            'category' => '4',
            'price' => '1086.25'
        ]);

        priceList::create([
            'itemName' => 'AIRCON SPLIT TYPE 2 HP ( 2 pcs )',
            'category' => '4',
            'price' => '1167.07'
        ]);

        priceList::create([
            'itemName' => 'APPLIANCES ( SMALL ) LOW VALUE',
            'category' => '4',
            'price' => '154.50',
            'multiplier' => '3256.00'
        ]);

        priceList::create([
            'itemName' => 'BAMBOO SET',
            'category' => '4',
            'price' => '154.07'
        ]);

        priceList::create([
            'itemName' => 'FILING CABINET, STEEL',
            'category' => '4',
            'price' => '1384.00'
        ]);

        priceList::create([
            'itemName' => 'FLAT TELEVISION 14',
            'category' => '4',
            'price' => '252.53'
        ]);

        priceList::create([
            'itemName' => 'FLAT TELEVISION 17',
            'category' => '4',
            'price' => '306.64'
        ]);

        priceList::create([
            'itemName' => 'FLAT TELEVISION 21',
            'category' => '4',
            'price' => '342.72'
        ]);

        priceList::create([
            'itemName' => 'FLAT TELEVISION 24',
            'category' => '4',
            'price' => '421.34'
        ]);

        priceList::create([
            'itemName' => 'FLAT TELEVISION 29',
            'category' => '4',
            'price' => '523.09'
        ]);

        priceList::create([
            'itemName' => 'FLAT TELEVISION 32',
            'category' => '4',
            'price' => '577.20'
        ]);

        priceList::create([
            'itemName' => 'FLAT TELEVISION 40',
            'category' => '4',
            'price' => '721.51'
        ]);

        priceList::create([
            'itemName' => 'FLAT TELEVISION 43',
            'category' => '4',
            'price' => '779.98'
        ]);

        priceList::create([
            'itemName' => 'FLAT TELEVISION 46',
            'category' => '4',
            'price' => '834.25'
        ]);

        priceList::create([
            'itemName' => 'FLAT TELEVISION 55',
            'category' => '4',
            'price' => '997.65'
        ]);

        priceList::create([
            'itemName' => 'PLASTIC CABINET 4L',
            'category' => '4',
            'price' => '762.65'
        ]);

        priceList::create([
            'itemName' => 'PLASTIC CABINET 5L',
            'category' => '4',
            'price' => '866.65'
        ]);

        priceList::create([
            'itemName' => 'PLASTIC CABINET 6L',
            'category' => '4',
            'price' => '984.85'
        ]);

        priceList::create([
            'itemName' => 'REFRIGERATOR 5 CuFt',
            'category' => '4',
            'price' => '1552.39'
        ]);

        priceList::create([
            'itemName' => 'REFRIGERATOR 6 CuFt',
            'category' => '4',
            'price' => '2071.14'
        ]);

        priceList::create([
            'itemName' => 'REFRIGERATOR 7 CuFt',
            'category' => '4',
            'price' => '2960.25'
        ]);

        priceList::create([
            'itemName' => 'REFRIGERATOR 8 CuFt',
            'category' => '4',
            'price' => '3387.36'
        ]);

        priceList::create([
            'itemName' => 'REFRIGERATOR 9 CuFt',
            'category' => '4',
            'price' => '3530.32'
        ]);

        priceList::create([
            'itemName' => '	RICE DISPENSER',
            'category' => '4',
            'price' => '221.41'
        ]);

        priceList::create([
            'itemName' => 'SALA SET ( REGULAR )',
            'category' => '4',
            'price' => '3080.86',
            'multiplier' => '3256.00'
        ]);

        priceList::create([
            'itemName' => 'TELEVISION 14',
            'category' => '4',
            'price' => '505.07'
        ]);

        priceList::create([
            'itemName' => 'TELEVISION 17',
            'category' => '4',
            'price' => '613.29'
        ]);

        priceList::create([
            'itemName' => 'TELEVISION 21',
            'category' => '4',
            'price' => '685.44'
        ]);

        priceList::create([
            'itemName' => 'TELEVISION 24',
            'category' => '4',
            'price' => '842.68'
        ]);

        priceList::create([
            'itemName' => 'TELEVISION 29',
            'category' => '4',
            'price' => '1046.19'
        ]);

        priceList::create([
            'itemName' => 'TELEVISION 32',
            'category' => '4',
            'price' => '1154.42'
        ]);

        priceList::create([
            'itemName' => 'TELEVISION 40',
            'category' => '4',
            'price' => '1443.02'
        ]);

        priceList::create([
            'itemName' => 'TELEVISION 46',
            'category' => '4',
            'price' => '1668.49'
        ]);

        priceList::create([
            'itemName' => 'WASHING MACHINE ( 48 x 87 x 58 )',
            'category' => '4',
            'price' => '1052.36'
        ]);

        priceList::create([
            'itemName' => 'WASHING MACHINE, TWIN TUB',
            'category' => '4',
            'price' => '2201.62'
        ]);

        priceList::create([
            'itemName' => 'WASHING MACHINE',
            'category' => '4',
            'price' => '1154.42'
        ]);

        priceList::create([
            'itemName' => 'AMAZON GREEN SCREEN',
            'category' => '5',
            'price' => '154.50'
        ]);

        priceList::create([
            'itemName' => 'BARBED WIRE',
            'category' => '5',
            'price' => '166.62'
        ]);

        priceList::create([
            'itemName' => 'BOWL, PAIL, FLUSH',
            'category' => '5',
            'price' => '154.50'
        ]);

        priceList::create([
            'itemName' => 'CEMENT 40 kg',
            'category' => '5',
            'price' => '82.50'
        ]);

        priceList::create([
            'itemName' => 'CWN',
            'category' => '5',
            'price' => '92.61'
        ]);

        priceList::create([
            'itemName' => 'CYCLONE WIRE 4',
            'category' => '5',
            'price' => '92.43'
        ])

        ;priceList::create([
            'itemName' => 'CYCLONE WIRE 6',
            'category' => '5',
            'price' => '154.50'
        ]);

        priceList::create([
            'itemName' => 'GUTTER',
            'category' => '5',
            'price' => '37.75 '
        ]);

        priceList::create([
            'itemName' => 'HARDWARES (REGULAR)',
            'category' => '5',
            'price' => '154.50',
            'multiplier' => '3256.00'
        ]);

        priceList::create([
            'itemName' => 'HARDWARES (SMALL)',
            'category' => '5',
            'price' => '92.43',
            'multiplier' => '3256.00'
        ]);

        priceList::create([
            'itemName' => 'HOG WIRE',
            'category' => '5',
            'price' => '154.50'
        ]);

        priceList::create([
            'itemName' => 'LADDER, ALUMINUM',
            'category' => '5',
            'price' => '463.47'
        ]);

        priceList::create([
            'itemName' => 'PAINTS',
            'category' => '5',
            'price' => '92.43'
        ]);

        priceList::create([
            'itemName' => 'PIPE HDPE 1"(32mm) x 100m',
            'category' => '5',
            'price' => '444.93'
        ]);

        priceList::create([
            'itemName' => 'PIPE HDPE 1-1/4"(40mm) x 60m',
            'category' => '5',
            'price' => '417.12'
        ]);

        priceList::create([
            'itemName' => 'PIPE HDPE 1-1/2"(50mm) x 60m',
            'category' => '5',
            'price' => '651.75'
        ]);

        priceList::create([
            'itemName' => 'PIPE HDPE 2"(63mm) x 60m',
            'category' => '5',
            'price' => '1034.11'
        ]);

        priceList::create([
            'itemName' => 'PIPE HDPE 2-1/2"(75mm) x 60m',
            'category' => '5',
            'price' => '1466.44'
        ]);

        priceList::create([
            'itemName' => 'PIPE HDPE 3"(90mm) x 6m',
            'category' => '5',
            'price' => '211.17'
        ]);

        priceList::create([
            'itemName' => 'PIPE HDPE 4"(110mm) x 6m',
            'category' => '5',
            'price' => '315.45'
        ]);

        priceList::create([
            'itemName' => 'PVC DOOR',
            'category' => '5',
            'price' => '308.28'
        ]);

        priceList::create([
            'itemName' => 'PVC MOLDING',
            'category' => '5',
            'price' => '3.30'
        ]);

        priceList::create([
            'itemName' => 'PVC PIPE 1/2(20mm) x 3m',
            'category' => '5',
            'price' => '10.25'
        ]);

        priceList::create([
            'itemName' => 'PVC PIPE 3/4(25mm) x 3m',
            'category' => '5',
            'price' => '13.53'
        ]);

        priceList::create([
            'itemName' => 'PVC PIPE 1(32mm) x 3m',
            'category' => '5',
            'price' => '18.03'
        ]);

        priceList::create([
            'itemName' => 'PVC PIPE 2(63mm) x 3m',
            'category' => '5',
            'price' => '34.34'
        ]);

        priceList::create([
            'itemName' => 'PVC PIPE 3(90mm) x 3m',
            'category' => '5',
            'price' => '69.26'
        ]);

        priceList::create([
            'itemName' => 'PVC PIPE 4(110mm) x 3m',
            'category' => '5',
            'price' => '77.91'
        ]);

        priceList::create([
            'itemName' => 'PVC PIPE 6(160mm) x 3m',
            'category' => '5',
            'price' => '164.51'
        ]);

        priceList::create([
            'itemName' => 'ROOF TILES',
            'category' => '5',
            'price' => '11.00'
        ]);

        priceList::create([
            'itemName' => 'TIE WIRE 25 kg',
            'category' => '5',
            'price' => '112.75'
        ]);

        priceList::create([
            'itemName' => 'TIE WIRE 30 kg',
            'category' => '5',
            'price' => '135.30'
        ]);

        priceList::create([
            'itemName' => 'TIE WIRE 45 kg',
            'category' => '5',
            'price' => '202.95'
        ]);

        priceList::create([
            'itemName' => 'TILE ADHESIVE 20 kg',
            'category' => '5',
            'price' => '39.31'
        ]);

        priceList::create([
            'itemName' => 'TILES 8 x 12 (20cm x 30 cm)',
            'category' => '5',
            'price' => '0.00',
            'multiplier' => '4334.00'
        ]);

        priceList::create([
            'itemName' => 'TILES 8 x 8 (20cm x 20cm)',
            'category' => '5',
            'price' => '0.00'
        ]);

        priceList::create([
            'itemName' => 'TILES (ALL SIZES) ctn',
            'category' => '5',
            'price' => '92.43'
        ]);

        priceList::create([
            'itemName' => 'TILES 12 x 12 (30cm x 30cm)',
            'category' => '5',
            'price' => '0.00'
        ]);

        priceList::create([
            'itemName' => 'TILES 16 x 16 (40cm x 40cm)',
            'category' => '5',
            'price' => '0.00'
        ]);

        priceList::create([
            'itemName' => 'TILES 24 x 24 (60cm x 60cm)',
            'category' => '5',
            'price' => '0.00'
        ]);

        priceList::create([
            'itemName' => 'TRAILER HAND (SMALL)',
            'category' => '5',
            'price' => '0.00'
        ]);

        priceList::create([
            'itemName' => 'TRAILER HAND (REGULAR)',
            'category' => '5',
            'price' => '0.00'
        ]);

        priceList::create([
            'itemName' => 'WATER CLOSET, 2 PCS/SET',
            'category' => '5',
            'price' => ' 0.00'
        ]);

        priceList::create([
            'itemName' => 'WATER TANK',
            'category' => '5',
            'price' => '2167.00'
        ]);

        priceList::create([
            'itemName' => 'WELDED WIRE',
            'category' => '5',
            'price' => '154.50'
        ]);

        priceList::create([
            'itemName' => 'WOODEN DOOR',
            'category' => '5',
            'price' => '405.85'
        ]);

        priceList::create([
            'itemName' => 'ANGLE BAR, 1/2(12) x 3 x 6',
            'category' => '6',
            'price' => '347.60'
        ]);

        priceList::create([
            'itemName' => 'ANGLE BAR, 1/2(12) x 4 x 6',
            'category' => '6',
            'price' => '463.46'
        ]);

        priceList::create([
            'itemName' => 'ANGLE BAR, 1/2(12) x 6 x 6',
            'category' => '6',
            'price' => '695.20'
        ]);

        priceList::create([
            'itemName' => 'ANGLE BAR, 1/4(6.0) x 1-1/2 x 6',
            'category' => '6',
            'price' => '86.92'
        ]);

        priceList::create([
            'itemName' => 'ANGLE BAR, 1/4(6.0) x 2 x 6',
            'category' => '6',
            'price' => '115.87'
        ]);

        priceList::create([
            'itemName' => 'ANGLE BAR, 1/4(6.0) x 2-1/2 x 6',
            'category' => '6',
            'price' => '114.85'
        ]);

         priceList::create([
            'itemName' => 'ANGLE BAR, 1/4(6.0) x 3 x 6',
            'category' => '6',
            'price' => '173.80'
        ]);

        priceList::create([
            'itemName' => 'ANGLE BAR, 1/4(6.0) x 4 x 6',
            'category' => '6',
            'price' => '231.73'
        ]);

        priceList::create([
            'itemName' => 'ANGLE BAR, 1/4(6mm) x 1 x 6',
            'category' => '6',
            'price' => '57.93'
        ]);

        priceList::create([
            'itemName' => 'ANGLE BAR, 1/8(3.175) x 1 x 6',
            'category' => '6',
            'price' => '30.63'
        ]);

        priceList::create([
            'itemName' => 'ANGLE BAR, 1/8(3.175) x 1-1/2 x 6',
            'category' => '6',
            'price' => '45.93'
        ]);

        priceList::create([
            'itemName' => 'ANGLE BAR, 1/8(3.175) x 2 x 6',
            'category' => '6',
            'price' => '61.30'
        ]);

        priceList::create([
            'itemName' => 'ANGLE BAR, 1/8(3.175) x 2-1/2 x 6',
            'category' => '6',
            'price' => '76.63'
        ]);

        priceList::create([
            'itemName' => 'ANGLE BAR, 1/8(3.175) x 3 x 6',
            'category' => '6',
            'price' => '91.96'
        ]);

        priceList::create([
            'itemName' => 'ANGLE BAR, 1/8(3.175) x 4 x 6',
            'category' => '6',
            'price' => '122.63'
        ]);

        priceList::create([
            'itemName' => 'ANGLE BAR, 3/16(4.76) x 1 x 6',
            'category' => '6',
            'price' => '45.93'
        ]);

        priceList::create([
            'itemName' => 'ANGLE BAR, 3/16(4.76) x 1-1/2 x 6',
            'category' => '6',
            'price' => '68.92'
        ]);

        priceList::create([
            'itemName' => 'ANGLE BAR, 3/16(4.76) x 2 x 6',
            'category' => '6',
            'price' => '91.92'
        ]);

        priceList::create([
            'itemName' => 'ANGLE BAR, 3/16(4.76) x 2-1/2 x 6',
            'category' => '6',
            'price' => '114.80'
        ]);

        priceList::create([
            'itemName' => 'ANGLE BAR, 3/16(4.76) x 3 x 6',
            'category' => '6',
            'price' => '137.88'
        ]);

        priceList::create([
            'itemName' => 'ANGLE BAR, 3/16(4.76) x 4 x 6',
            'category' => '6',
            'price' => '183.84'
        ]);

        priceList::create([
            'itemName' => 'CHANNEL BAR, 1/4(6.0) x 3 x 6',
            'category' => '6',
            'price' => '144.85'
        ]);

        priceList::create([
            'itemName' => 'CHANNEL BAR, 1/4(6.0) x 4 x 6',
            'category' => '6',
            'price' => '173.80'
        ]);

        priceList::create([
            'itemName' => 'CHANNEL BAR, 3/16(4.76) x 3 x 6',
            'category' => '6',
            'price' => '144.88'
        ]);

        priceList::create([
            'itemName' => 'CHANNEL BAR, 3/16(4.76) x 4 x 6',
            'category' => '6',
            'price' => '137.84'
        ]);

        priceList::create([
            'itemName' => 'FLAT BAR, 1/4(6.0) x 1 x 6',
            'category' => '6',
            'price' => '28.99'
        ]);

        priceList::create([
            'itemName' => 'FLAT BAR, 1/4(6.0) x 1-1/2 x 6',
            'category' => '6',
            'price' => '43.46'
        ]);

        priceList::create([
            'itemName' => 'FLAT BAR, 1/4(6.0) x 2 x 6',
            'category' => '6',
            'price' => '57.93'
        ]);

        priceList::create([
            'itemName' => 'FLAT BAR, 1/4(6.0) x 2-1/2 x 6',
            'category' => '6',
            'price' => '72.41'
        ]);

         priceList::create([
            'itemName' => 'FLAT BAR, 1/4(6.0) x 3 x 6',
            'category' => '6',
            'price' => '86.92'
        ]);

        priceList::create([
            'itemName' => 'FLAT BAR, 1/4(6.0) x 4 x 6',
            'category' => '6',
            'price' => '115.87'
        ]);

        priceList::create([
            'itemName' => 'FLAT BAR, 1/8(3.175) x 1 x 6',
            'category' => '6',
            'price' => '15.33'
        ]);

        priceList::create([
            'itemName' => 'FLAT BAR, 1/8(3.175) x 1-1/2 x 6',
            'category' => '6',
            'price' => '23.00'
        ]);

        priceList::create([
            'itemName' => 'FLAT BAR, 1/8(3.175) x 2 x 6',
            'category' => '6',
            'price' => '30.67'
        ]);

        priceList::create([
            'itemName' => 'FLAT BAR, 1/8(3.175) x 2-1/2 x 6',
            'category' => '6',
            'price' => '38.34'
        ]);

        priceList::create([
            'itemName' => 'FLAT BAR, 1/8(3.175) x 3 x 6',
            'category' => '6',
            'price' => '46.00'
        ]);

        priceList::create([
            'itemName' => 'FLAT BAR, 1/8(3.175) x 4 x 6',
            'category' => '6',
            'price' => '61.30'
        ]);

        priceList::create([
            'itemName' => 'FLAT BAR, 3/16(4.76) x 1 x 6',
            'category' => '6',
            'price' => '22.96'
        ]);

        priceList::create([
            'itemName' => 'FLAT BAR, 3/16(4.76) x 1-1/2 x 6',
            'category' => '6',
            'price' => '34.48'
        ]);

        priceList::create([
            'itemName' => 'FLAT BAR, 3/16(4.76) x 2 x 6',
            'category' => '6',
            'price' => '45.96'
        ]);

        priceList::create([
            'itemName' => 'FLAT BAR, 3/16(4.76) x 2-1/2 x 6',
            'category' => '6',
            'price' => '57.40'
        ]);

        priceList::create([
            'itemName' => 'FLAT BAR, 3/16(4.76) x 3 x 6',
            'category' => '6',
            'price' => '68.92'
        ]);

        priceList::create([
            'itemName' => 'FLAT BAR, 3/16(4.76) x 4 x 6',
            'category' => '6',
            'price' => '91.92'
        ]);

        priceList::create([
            'itemName' => 'GI PIPE, 1/2 x 6m',
            'category' => '6',
            'price' => '22.14'
        ]);

        priceList::create([
            'itemName' => 'GI PIPE, 3/4 x 6m',
            'category' => '6',
            'price' => '29.73'
        ]);

        priceList::create([
            'itemName' => 'GI PIPE, 1 x 6m',
            'category' => '6',
            'price' => '45.10'
        ]);

        priceList::create([
            'itemName' => 'GI PIPE, 1-1/2 x 6m',
            'category' => '6',
            'price' => '73.80'
        ]);

        priceList::create([
            'itemName' => 'GI PIPE, 1-1/4 x 6m',
            'category' => '6',
            'price' => '59.45'
        ]);

        priceList::create([
            'itemName' => 'GI PIPE, 2 x 6m',
            'category' => '6',
            'price' => '98.40'
        ]);

        priceList::create([
            'itemName' => 'GI PIPE, 3 x 6m',
            'category' => '6',
            'price' => '159.90'
        ]);

        priceList::create([
            'itemName' => 'GI PIPE, 4 x 6m',
            'category' => '6',
            'price' => '229.60'
        ]);

        priceList::create([
            'itemName' => 'H-FRAME 1.25 x 1.70 x 7',
            'category' => '6',
            'price' => '266.12'
        ]);

        priceList::create([
            'itemName' => 'H-FRAME 1.70 x 1.24 x 4',
            'category' => '6',
            'price' => '150.84'
        ]);

        priceList::create([
            'itemName' => 'MS PLATE 5mm x 4 x 8',
            'category' => '6',
            'price' => '478.39'
        ]);

        priceList::create([
            'itemName' => 'MS PLATE 10mm x 4 x 8',
            'category' => '6',
            'price' => '956.82'
        ]);

        priceList::create([
            'itemName' => 'MS PLATE 18mm x 4 x 8',
            'category' => '6',
            'price' => '1722.21'
        ]);

        priceList::create([
            'itemName' => 'ROUND BAR (same as RSBAR)',
            'category' => '6',
            'price' => '0.00'
        ]);

        priceList::create([
            'itemName' => 'RSBAR, 6mm x 6m',
            'category' => '6',
            'price' => '5.45'
        ]);

        priceList::create([
            'itemName' => 'RSBAR, 7mm x 6m',
            'category' => '6',
            'price' => '7.42'
        ]);
                priceList::create([
            'itemName' => 'RSBAR, 8mm x 6m',
            'category' => '6',
            'price' => '9.72'
        ]);
        priceList::create([
            'itemName' => 'RSBAR, 9mm x 6m',
            'category' => '6',
            'price' => '12.30'
        ]);

        priceList::create([
            'itemName' => 'RSBAR, 10mm x 10.5m',
            'category' => '6',
            'price' => '26.53'
        ]);

        priceList::create([
            'itemName' => 'RSBAR, 10mm x 12m',
            'category' => '6',
            'price' => '5.45'
        ]);

        priceList::create([
            'itemName' => 'RSBAR, 10mm x 6m',
            'category' => '6',
            'price' => '15.17'
        ]);

        priceList::create([
            'itemName' => 'RSBAR, 10mm x 7.5m',
            'category' => '6',
            'price' => '18.94'
        ]);

        priceList::create([
            'itemName' => 'RSBAR, 10mm x 9m',
            'category' => '6',
            'price' => '22.71'
        ]);

        priceList::create([
            'itemName' => 'STEEL BAR 6mm x 1.6m',
            'category' => '6',
            'price' => '4.47'
        ]);

        priceList::create([
            'itemName' => 'RSBAR, 12mm x 10.5m',
            'category' => '6',
            'price' => '38.25'
        ]);

        priceList::create([
            'itemName' => 'RSBAR, 12mm x 12m',
            'category' => '6',
            'price' => '43.71'
        ]);

        priceList::create([
            'itemName' => 'RSBAR, 12mm x 6m',
            'category' => '6',
            'price' => '21.85'
        ]);

        priceList::create([
            'itemName' => 'RSBAR, 12mm x 7.5m',
            'category' => '6',
            'price' => '27.31'
        ]);

        priceList::create([
            'itemName' => 'RSBAR, 12mm x 9m',
            'category' => '6',
            'price' => '32.80'
        ]);

        priceList::create([
            'itemName' => 'RSBAR, 16mm x 10.5m',
            'category' => '6',
            'price' => '67.98'
        ]);

        priceList::create([
            'itemName' => 'RSBAR, 16mm x 12m',
            'category' => '6',
            'price' => '77.70'
        ]);

        priceList::create([
            'itemName' => 'RSBAR, 16mm x 6m',
            'category' => '6',
            'price' => '38.83'
        ]);

        priceList::create([
            'itemName' => 'RSBAR, 16mm x 7.5m',
            'category' => '6',
            'price' => '48.54'
        ]);

        priceList::create([
            'itemName' => 'RSBAR, 16mm x 9m',
            'category' => '6',
            'price' => '58.26'
        ]);

        priceList::create([
            'itemName' => 'RSBAR, 20mm x 10.5m',
            'category' => '6',
            'price' => '106.19'
        ]);

        priceList::create([
            'itemName' => 'RSBAR, 20mm x 12m',
            'category' => '6',
            'price' => '121.36'
        ]);

        priceList::create([
            'itemName' => 'RSBAR, 20mm x 6m',
            'category' => '6',
            'price' => '60.68'
        ]);

        priceList::create([
            'itemName' => 'RSBAR, 20mm x 7.5m',
            'category' => '6',
            'price' => '75.85'
        ]);

        priceList::create([
            'itemName' => 'RSBAR, 20mm x 9m',
            'category' => '6',
            'price' => '90.98'
        ]);

        priceList::create([
            'itemName' => 'RSBAR, 25mm x 10.5m',
            'category' => '6',
            'price' => '165.93'
        ]);

        priceList::create([
            'itemName' => 'RSBAR, 25mm x 12m',
            'category' => '6',
            'price' => '189.63'
        ]);

        priceList::create([
            'itemName' => 'RSBAR, 25mm x 6m',
            'category' => '6',
            'price' => '94.79'
        ]);

        priceList::create([
            'itemName' => 'RSBAR, 25mm x 7.5m',
            'category' => '6',
            'price' => '118.53'
        ]);

        priceList::create([
            'itemName' => 'RSBAR, 25mm x 9m',
            'category' => '6',
            'price' => '142.23'
        ]);

        priceList::create([
            'itemName' => 'RSBAR, 32mm x 10.5m',
            'category' => '6',
            'price' => '271.75'
        ]);

        priceList::create([
            'itemName' => 'RSBAR, 32mm x 12m',
            'category' => '6',
            'price' => '310.62'
        ]);

        priceList::create([
            'itemName' => 'RSBAR, 32mm x 6m',
            'category' => '6',
            'price' => '155.31'
        ]);

        priceList::create([
            'itemName' => 'RSBAR, 32mm x 7.5m',
            'category' => '6',
            'price' => '177.74'
        ]);

        priceList::create([
            'itemName' => 'RSBAR, 32mm x 9m',
            'category' => '6',
            'price' => '232.96'
        ]);

        priceList::create([
            'itemName' => 'SHORING JACK',
            'category' => '6',
            'price' => '25.00'
        ]);

        priceList::create([
            'itemName' => 'SQUARE BAR, 10mm x 6m',
            'category' => '6',
            'price' => '19.31'
        ]);

        priceList::create([
            'itemName' => 'SQUARE BAR, 16mm x 6m',
            'category' => '6',
            'price' => '27.80'
        ]);

        priceList::create([
            'itemName' => 'SQUARE BAR, 10mm x 6m',
            'category' => '6',
            'price' => '49.45'
        ]);

        priceList::create([
            'itemName' => '0.35MM X 6FT Corr. G I. Sheet',
            'category' => '7',
            'price' => '14.76'
        ]);

        priceList::create([
            'itemName' => '0.35MM X 7FT Corr. G I. Sheet',
            'category' => '7',
            'price' => '17.22'
        ]);

        priceList::create([
            'itemName' => '0.35MM X 8FT Corr. G I. Sheet',
            'category' => '7',
            'price' => '19.68'
        ]);

        priceList::create([
            'itemName' => '0.35MM X 9FT Corr. G I. Sheet',
            'category' => '7',
            'price' => '22.14'
        ]);

        priceList::create([
            'itemName' => '0.35MM X 10FT Corr. G I. Sheet',
            'category' => '7',
            'price' => '24.60'
        ]);

        priceList::create([
            'itemName' => '0.35MM X 12FT Corr. G I. Sheet',
            'category' => '7',
            'price' => '29.52'
        ]);

        priceList::create([
            'itemName' => '0.50MM X 6FT Corr. G I. Sheet',
            'category' => '7',
            'price' => '22.14'
        ]);

        priceList::create([
            'itemName' => '0.50MM X 7FT Corr. G I. Sheet',
            'category' => '7',
            'price' => '25.83'
        ]);

        priceList::create([
            'itemName' => '0.50MM X 8FT Corr. G I. Sheet',
            'category' => '7',
            'price' => '29.52'
        ]);

        priceList::create([
            'itemName' => '0.50MM X 9FT Corr. G I. Sheet',
            'category' => '7',
            'price' => '33.21'
        ]);

        priceList::create([
            'itemName' => '0.50MM X 10FT Corr. G I. Sheet',
            'category' => '7',
            'price' => '36.90'
        ]);

        priceList::create([
            'itemName' => '0.50MM X 12FT Corr. G I. Sheet',
            'category' => '7',
            'price' => '44.28'
        ]);

        priceList::create([
            'itemName' => 'ACRYCLIC ( 3/16 x 4 x 8 )',
            'category' => '7',
            'price' => '51.66'
        ]);

        priceList::create([
            'itemName' => 'ACRYCLIC ( 1/4 x 4 x 8 )',
            'category' => '7',
            'price' => '51.66'
        ]);

        priceList::create([
            'itemName' => 'ACRYCLIC ( 1/8 x 4 x 8 )',
            'category' => '7',
            'price' => '51.66'
        ]);

        priceList::create([
            'itemName' => 'PLAIN SHEET, 0.35mm x 3 x 8',
            'category' => '7',
            'price' => '25.13'
        ]);

        priceList::create([
            'itemName' => 'PLAIN SHEET, 0.35mm x 4 x 8',
            'category' => '7',
            'price' => '33.50'
        ]);

        priceList::create([
            'itemName' => 'PLAIN SHEET, 0.50mm x 4 x 8',
            'category' => '7',
            'price' => '47.81'
        ]);

        priceList::create([
            'itemName' => 'PLAIN SHEET, 1.10mm x 4 x 8',
            'category' => '7',
            'price' => '105.25'
        ]);

        priceList::create([
            'itemName' => 'PLAIN SHEET, 1.30mm x 4 x 8',
            'category' => '7',
            'price' => '124.39'
        ]);

        priceList::create([
            'itemName' => 'PRE-PAINTED COLOR ROOF 0.50 x 3 x Lft',
            'category' => '7',
            'price' => '4.47'
        ]);

        priceList::create([
            'itemName' => 'PRE-PAINTED COLOR ROOF 0.50 x 4 x Lft',
            'category' => '7',
            'price' => '5.99'
        ]);

        priceList::create([
            'itemName' => 'RIDGE ROLL',
            'category' => '7',
            'price' => '34.32'
        ]);

        priceList::create([
            'itemName' => 'THERMO CORR ( 1.5mm x 814mm x 12 )',
            'category' => '7',
            'price' => '54.00'
        ]);

        priceList::create([
            'itemName' => 'THERMO CORR ( 1.5mm x 814mm x 8 )',
            'category' => '7',
            'price' => '36.00'
        ]);

        priceList::create([
            'itemName' => 'THERMO CORR ( 2.0mm x 814mm x 12 )',
            'category' => '7',
            'price' => '60.00'
        ]);

        priceList::create([
            'itemName' => 'THERMO CORR ( 2.0mm x 814mm x 16 )',
            'category' => '7',
            'price' => '80.00'
        ]);

        priceList::create([
            'itemName' => 'THERMO CORR ( 2.0mm x 814mm x 8 )',
            'category' => '7',
            'price' => '40.00'
        ]);

        priceList::create([
            'itemName' => 'THERMO CORR ( 2.0mm x 814mm x 9 )',
            'category' => '7',
            'price' => '45.00'
        ]);

        priceList::create([
            'itemName' => 'THERMOPLASTIC, 1.5mm x L(ft)',
            'category' => '7',
            'price' => '4.50'
        ]);

        priceList::create([
            'itemName' => 'THERMOPLASTIC, 2.0mm x L(ft)',
            'category' => '7',
            'price' => '5.00'
        ]);

        priceList::create([
            'itemName' => 'TUBULAR 2 x 3 x 20 ft',
            'category' => '7',
            'price' => '49.45'
        ]);

        priceList::create([
            'itemName' => 'MOULDING',
            'category' => '7',
            'price' => '3.00',
        ]);

        priceList::create([
            'itemName' => '5mm(1/4) PLYWOOD',
            'category' => '8',
            'price' => '50.51'
        ]);

        priceList::create([
            'itemName' => '10mm(1/2) PLYWOOD',
            'category' => '8',
            'price' => '101.02'
        ]);

        priceList::create([
            'itemName' => '18mm(3/4) PLYWOOD/PLYBOARD',
            'category' => '8',
            'price' => '151.54'
        ]);

        priceList::create([
            'itemName' => '244mm(1) PLYWOOD',
            'category' => '8',
            'price' => '202.05'
        ]);

        priceList::create([
            'itemName' => 'LUMBER',
            'category' => '8',
            'price' => '6.31'
        ]);

        priceList::create([
            'itemName' => 'FUEL ( DRUM )',
            'category' => '9',
            'price' => '1138.83'
        ]);

        priceList::create([
            'itemName' => 'FUEL (CONTAINER / NAVY CUBE ) 5kl',
            'category' => '9',
            'price' => '27115.00'
        ]);

        priceList::create([
            'itemName' => 'FUEL, DIESEL, GASOLINE IN CONTAINER (PER LITER)',
            'category' => '9',
            'price' => '5.42'
        ]);

        priceList::create([
            'itemName' => 'KEROSENE IN JUG',
            'category' => '9',
            'price' => '102.83'
        ]);

        priceList::create([
            'itemName' => 'LPG BIG 50KG ( FULL )',
            'category' => '9',
            'price' => '363.00'
        ]);

        priceList::create([
            'itemName' => 'LPG MEDIUM 22KG ( FULL )',
            'category' => '9',
            'price' => '163.35'
        ]);

        priceList::create([
            'itemName' => 'LPG SMALL 11KG ( FULL )',
            'category' => '9',
            'price' => '79.86'
        ]);

        priceList::create([
            'itemName' => 'SUPER KALAN 5KG ( FULL )',
            'category' => '9',
            'price' => '32.46'
        ]);

        priceList::create([
            'itemName' => 'AUV',
            'category' => '10',
            'price' => '32802.00'
        ]);

        priceList::create([
            'itemName' => 'BICYCLE ( SMALL )',
            'category' => '10',
            'price' => '15.90'
        ]);

        priceList::create([
            'itemName' => 'BICYCLE ( BIG )',
            'category' => '10',
            'price' => '459.97'
        ]);

        priceList::create([
            'itemName' => 'BICYCLE W/ SIDECAR',
            'category' => '10',
            'price' => '892.86'
        ]);

        priceList::create([
            'itemName' => 'ENGINE 12HP',
            'category' => '10',
            'price' => '1174.43',
            'multiplier' => '6490.00'
        ]);

        priceList::create([
            'itemName' => 'ENGINE DIESEL 289HP',
            'category' => '10',
            'price' => '18952.10',
            'multiplier' => '6490.00'
        ]);

        priceList::create([
            'itemName' => 'HIGH ACE COMMUTER',
            'category' => '10',
            'price' => '35379.30',
            'multiplier' => '2343.00'
        ]);

        priceList::create([
            'itemName' => 'L300',
            'category' => '10',
            'price' => '33504.90',
            'multiplier' => '2343.00'
        ]);

        priceList::create([
            'itemName' => 'MAZDA DROPSIDE',
            'category' => '10',
            'price' => '29896.68',
            'multiplier' => '2343.00'
        ]);

        priceList::create([
            'itemName' => 'MINI DUMP',
            'category' => '10',
            'price' => '39268.68',
            'multiplier' => '2343.00'
        ]);

        priceList::create([
            'itemName' => 'MOTORCYCLE SMALL',
            'category' => '10',
            'price' => '2336.40'
        ]);

        priceList::create([
            'itemName' => 'MOTORCYCLE TMX / XRM / WAVE ',
            'category' => '10',
            'price' => '4439.16'
        ]);

        priceList::create([
            'itemName' => 'MOTORCYCLE W/SIDECAR',
            'category' => '10',
            'price' => '11105.42'
        ]);

        priceList::create([
            'itemName' => 'SUV TUCSON',
            'category' => '10',
            'price' => '36667.95',
            'multiplier' => '2343.00'
        ]);

        priceList::create([
            'itemName' => 'TRUCK 14 / FORK LIFT / BACK HOE',
            'category' => '10',
            'price' => '58082.97',
            'multiplier' => '2343.00'
        ]);

        priceList::create([
            'itemName' => 'TRUCK WIDE / TRANSIT MIXER',
            'category' => '10',
            'price' => '67502.05',
            'multiplier' => '2343.00'
        ]);

        priceList::create([
            'itemName' => 'BEER ( CASE ONLY )',
            'category' => '11',
            'price' => '17.09'
        ]);

        priceList::create([
            'itemName' => 'BEER, EMPTY ( CASE & BOTTLE )',
            'category' => '11',
            'price' => '26.79'
        ]);

        priceList::create([
            'itemName' => 'BEER, LIGHTS, EMPTY',
            'category' => '11',
            'price' => '26.79'
        ]);

        priceList::create([
            'itemName' => 'BEER, PILSEN, EMPTY',
            'category' => '11',
            'price' => '26.79'
        ]);

        priceList::create([
            'itemName' => 'BEER, REDHORSE 1L, EMPTY',
            'category' => '11',
            'price' => '26.79'
        ]);

        priceList::create([
            'itemName' => 'COKE, EMPTY',
            'category' => '11',
            'price' => '26.79'
        ]);

        priceList::create([
            'itemName' => 'DOCUMENTS',
            'category' => '11',
            'price' => '146.41'
        ]);

        priceList::create([
            'itemName' => 'EMPTY CONTAINER VAN 10',
            'category' => '11',
            'price' => '17316.20'
        ]);

        priceList::create([
            'itemName' => 'EMPTY CONTAINER VAN 20',
            'category' => '11',
            'price' => '34632.40'
        ]);

        priceList::create([
            'itemName' => 'EMPTY DRUM',
            'category' => '11',
            'price' => '222.48'
        ]);

        priceList::create([
            'itemName' => 'EMPTY BOTTLE',
            'category' => '11',
            'price' => '38.07'
        ]);

        priceList::create([
            'itemName' => 'EMPTY NAVY CUBE / FUEL TANK 5KL',
            'category' => '11',
            'price' => '8658.11'
        ]);

        priceList::create([
            'itemName' => 'EMPTY SHELL',
            'category' => '11',
            'price' => '17.71'
        ]);

        priceList::create([
            'itemName' => 'GARLIC',
            'category' => '11',
            'price' => '148.50'
        ]);


        priceList::create([
            'itemName' => 'GARLIC IN SACKS',
            'category' => '11',
            'price' => '135.28'
        ]);

        priceList::create([
            'itemName' => 'LPG BIG (EMPTY)',
            'category' => '11',
            'price' => '154.88'
        ]);

        priceList::create([
            'itemName' => 'LPG MEDIUM (EMPTY)',
            'category' => '11',
            'price' => '77.44'
        ]);

        priceList::create([
            'itemName' => 'LPG SMALL (EMPTY)',
            'category' => '11',
            'price' => '36.20'
        ]);

        priceList::create([
            'itemName' => 'OXYGEN / ACETYLENE',
            'category' => '11',
            'price' => '154.88'
        ]);

        priceList::create([
            'itemName' => 'PALLETS (CAYCO ONLY)',
            'category' => '11',
            'price' => '77.44'
        ]);

        priceList::create([
            'itemName' => 'ROOT CROPS BX',
            'category' => '11',
            'price' => '92.43'
        ]);

        priceList::create([
            'itemName' => 'ROOT CROPS SACKS REG',
            'category' => '11',
            'price' => '92.43'
        ]);

        priceList::create([
            'itemName' => 'SCRAP (20 FOOTER CONTAINER)',
            'category' => '11',
            'price' => '7260.00'
        ]);

        priceList::create([
            'itemName' => 'SCRAP, METAL',
            'category' => '11',
            'price' => '1815.00'
        ]);

        priceList::create([
            'itemName' => 'SCRAP (10 FOOTER CONTAINER)',
            'category' => '11',
            'price' => '3630.00'
        ]);

        priceList::create([
            'itemName' => 'SOFTDRINKS (CASE ONLY)',
            'category' => '11',
            'price' => '17.09'
        ]);

        priceList::create([
            'itemName' => 'SOFTDRINKS, EMPTY (CASE & BOTTLE)',
            'category' => '11',
            'price' => '26.77'
        ]);

        priceList::create([
            'itemName' => 'SUPER KALAN 5KG',
            'category' => '11',
            'price' => '26.20'
        ]);

        priceList::create([
            'itemName' => 'VECHICLE (BACK LOAD)',
            'category' => '11',
            'price' => '0.00'
        ]);

        $orderId = "BL1-01";
        parcel::create([
            'itemName' => 'CHARTERED 20FTR',
            'quantity' => '1',
            'unit' => 'KG',
            'price' => '69264.82',
            'total' => '69264.82',
            'orderId' => $orderId,
        ]);

        date_default_timezone_set('Asia/Manila');
        $date = date("F d 20y - g:i a");
        order::create([
            'shipNum'=> '1',
            'origin' => 'Manila',
            'destination' => 'Batanes',
            'totalAmount' => '69264.82',
            'cID' => '0001',
            'orderId' => $orderId,
            'orderCreated' => $date,
            'consigneeName' => 'JANUS SAMPLE',
            'consigneeNum' => '09451278396',
            'voyageNum' => '1-OUT',
            'containerNum' => '2',
            'cargoNum' => '2',
            'value' => '123'

        ]);

        ship::create([
            'number' => '1',
            'reference' => '',
            'status' => 'ON PORT'
        ]);

        ship::create([
            'number' => '2',
            'reference' => '',
            'status' => 'ON PORT'
        ]);

        ship::create([
            'number' => '3',
            'reference' => '',
            'status' => 'ON PORT'
        ]);

        ship::create([
            'number' => '4',
            'reference' => '',
            'status' => 'ON PORT'
        ]);

        ship::create([
            'number' => '5',
            'reference' => '',
            'status' => 'ON PORT'
        ]);

        voyage::create([
            'ship' => '1',
            'trip_num' => '1',
            'date' => 'December 12 2024 - 6:17:43 pm',
            'orderId' => 'BL1-01'
        ]);
    }
}
