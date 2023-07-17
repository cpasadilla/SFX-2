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
        'isStaff' => '1',
        ]);

        $email = 'admin@plm.edu.ph';
        $id = User::where('email', $email)->get();
        foreach($id as $value){
                $store = $value->id;
            
        }
        staff::create([
            'user_id' => $store,
            'position' => 'Admin',
            'location' => 'Manila',
        ]);

        User::create([
            'fName' => 'Mich',
            'lName' => 'Reyes',
            'phoneNum' => '09453128679',
            'email' => 'mich@plm.edu.ph',
            'password' => Hash::make('admin1234'),
            'isStaff' => '1',
            ]);
    
            $email = 'mich@plm.edu.ph';
            $id = User::where('email', $email)->get();
            foreach($id as $value){
                    $store = $value->id;
                
            }
            staff::create([
                'user_id' => $store,
                'position' => 'Staff',
                'location' => 'Manila',
            ]);

            User::create([
                'fName' => 'Janus',
                'lName' => 'Dagoy',
                'phoneNum' => '09753124869',
                'email' => 'jdagoy@plm.edu.ph',
                'password' => Hash::make('admin1234'),
                'isStaff' => '1',
                ]);
        
                $email = 'jdagoy@plm.edu.ph';
                $id = User::where('email', $email)->get();
                foreach($id as $value){
                        $store = $value->id;
                    
                }
                staff::create([
                    'user_id' => $store,
                    'position' => 'Engineer',
                    'location' => 'Batanes',
                ]);

        
                User::create([
                    'fName' => 'BJ',
                    'lName' => 'Dolor',
                    'phoneNum' => '09748591632',
                    'email' => 'bj@plm.edu.ph',
                    'password' => Hash::make('Pass1234'),
                    'isStaff' => '0',
                    ]);
            
                    $email = 'bj@plm.edu.ph';
                    $id = User::where('email', $email)->get();
                    foreach($id as $value){
                            $store = $value->id;
                        
                    }
                    CustomerID::create([
                        'user_id' => $store,
                        'cID' => '052023001',
                    ]);
    

               category::create([
                'name' => 'GENERAL MERCHANDISE',
               ]);

               category::create([
                'name' => 'GENERAL HARDWARE',
               ]);

               category::create([
                'name' => 'VEHICLES/ENGINES',
               ]);

               category::create([
                'name' => 'APPLIANCES/FURNITURE&FIXTURE',
               ]);

               category::create([
                'name' => 'STEEL BAR (RSB)',
               ]);

               category::create([
                'name' => 'HDPE/GI/PVC PIPES',
               ]);

               category::create([
                'name' => 'FUEL/LPG AND FLAT BAR',
               ]);

               category::create([
                'name' => 'PLYWOOD/CORR.G.I SHEET',
               ]);

               category::create([
                'name' => 'FROZEN GOODS',
               ]);

               category::create([
                'name' => 'ANGLE BARS / CHANNEL BARS',
               ]);

               category::create([
                'name' => 'FRAME',
               ]);

               category::create([
                'name' => 'BACKLOAD',
               ]);

               category::create([
                'name' => 'STUFFING/STIPPINGS',
               ]);

               category::create([
                'name' => 'NEW FREIGHT',
               ]);
               priceList::create([
                'itemName' => 'Balikbayan box/ukay',
                'category' => '1',
                'price' => '381.63'
               ]);

               priceList::create([
                'itemName' => 'Various UK',
                'category' => '1',
                'price' => '381.62'
               ]);

               priceList::create([
                'itemName' => '45kg',
                'category' => '1',
                'price' => '424.03'
               ]);

               priceList::create([
                'itemName' => '50kg',
                'category' => '1',
                'price' => '763.25'
               ]);

               priceList::create([
                'itemName' => 'Balikbayan box',
                'category' => '1',
                'price' => '584.35'
               ]);

               priceList::create([
                'itemName' => 'Beer, lights, full',
                'category' => '1',
                'price' => '45.98'
               ]);

               priceList::create([
                'itemName' => 'Beer, Pilsen, full',
                'category' => '1',
                'price' => '45.98'
               ]);

               priceList::create([
                'itemName' => 'Beer, Red horse 11, full',
                'category' => '1',
                'price' => '45.98'
               ]);

               priceList::create([
                'itemName' => 'Beer, Red horse 500ml, full',
                'category' => '1',
                'price' => '45.98'
               ]);

               priceList::create([
                'itemName' => 'Bihon/Miki',
                'category' => '1',
                'price' => '101.87'
               ]);

               priceList::create([
                'itemName' => 'Biscuit',
                'category' => '1',
                'price' => '45.98'
               ]);

               priceList::create([
                'itemName' => 'Charcoal sacks',
                'category' => '1',
                'price' => '45.98'
               ]);

               priceList::create([
                'itemName' => 'Cigarette',
                'category' => '1',
                'price' => '127.60'
               ]);

               priceList::create([
                'itemName' => 'Coke 1.5L',
                'category' => '1',
                'price' => '45.98'
               ]);

               priceList::create([
                'itemName' => 'Coke 1.5LPET',
                'category' => '1',
                'price' => '45.98'
               ]);

               priceList::create([
                'itemName' => 'Coke 1.7L',
                'category' => '1',
                'price' => '45.98'
               ]);

               priceList::create([
                'itemName' => 'Coke 120z',
                'category' => '1',
                'price' => '45.98'
               ]);

               priceList::create([
                'itemName' => 'Coke 2L',
                'category' => '1',
                'price' => '45.98'
               ]);

               priceList::create([
                'itemName' => 'Coke 8oz',
                'category' => '1',
                'price' => '45.98'
               ]);

               priceList::create([
                'itemName' => 'Coke in cans',
                'category' => '1',
                'price' => '45.98'
               ]);

               priceList::create([
                'itemName' => 'Coke Lit',
                'category' => '1',
                'price' => '45.98'
               ]);
               
               priceList::create([
                'itemName' => 'Beer, lights, full',
                'category' => '1',
                'price' => '45.98'
               ]);

               priceList::create([
                'itemName' => 'Coke 1.5L',
                'category' => '1',
                'price' => '45.98'
               ]);

               priceList::create([
                'itemName' => 'Fiber Glass',
                'category' => '1',
                'price' => '127.68'
               ]);

               priceList::create([
                'itemName' => 'Container Jug, Bundle',
                'category' => '1',
                'price' => '265.35'
               ]);

               priceList::create([
                'itemName' => 'Cooking oil',
                'category' => '1',
                'price' => '45.98'
               ]);

               priceList::create([
                'itemName' => 'Curls (5bales = 1 Bundle)',
                'category' => '1',
                'price' => '127.68'
               ]);

               priceList::create([
                'itemName' => 'Dextrose/medicine',
                'category' => '1',
                'price' => '76.40'
               ]);

               priceList::create([
                'itemName' => 'Empty Jug',
                'category' => '1',
                'price' => '25.48'
               ]);

               priceList::create([
                'itemName' => 'Foam',
                'category' => '1',
                'price' => '129.78'
               ]);

               priceList::create([
                'itemName' => 'Foam',
                'category' => '1',
                'price' => '153.74'
               ]);

               priceList::create([
                'itemName' => 'Foam',
                'category' => '1',
                'price' => '176.03'
               ]);

               priceList::create([
                'itemName' => 'Foam',
                'category' => '1',
                'price' => '216.29'
               ]);

               priceList::create([
                'itemName' => 'Fresh Egg/ 5 bundles',
                'category' => '1',
                'price' => '45.98'
               ]);

               priceList::create([
                'itemName' => 'Funchum/Biggy/Zest-O',
                'category' => '1',
                'price' => '14.14'
               ]);

               priceList::create([
                'itemName' => 'Garlic',
                'category' => '1',
                'price' => '111.80'
               ]);

               priceList::create([
                'itemName' => 'Gin',
                'category' => '1',
                'price' => '45.98'
               ]);

               priceList::create([
                'itemName' => 'Groceries',
                'category' => '1',
                'price' => '45.98'
               ]);

               priceList::create([
                'itemName' => 'Lucky me',
                'category' => '1',
                'price' => '45.98'
               ]);

               priceList::create([
                'itemName' => 'Macaroni',
                'category' => '1',
                'price' => '101.87'
               ]);

               priceList::create([
                'itemName' => 'Matador 1Liter',
                'category' => '1',
                'price' => '45.98'
               ]);

               priceList::create([
                'itemName' => 'Matador 750ml',
                'category' => '1',
                'price' => '45.98'
               ]);

               priceList::create([
                'itemName' => 'Pail, Lard (Big)',
                'category' => '1',
                'price' => '127.67'
               ]);

               priceList::create([
                'itemName' => 'Pail, Lard (small)',
                'category' => '1',
                'price' => '92.61'
               ]);

               priceList::create([
                'itemName' => 'Primera',
                'category' => '1',
                'price' => '45.98'
               ]);

               priceList::create([
                'itemName' => 'RTW',
                'category' => '1',
                'price' => '152.90'
               ]);

               priceList::create([
                'itemName' => 'Sacks(25kg)flour, rice, feeds',
                'category' => '1',
                'price' => '63.36'
               ]);

               priceList::create([
                'itemName' => 'Sacks(50kg)rice, feeds',
                'category' => '1',
                'price' => '126.71'
               ]);

               priceList::create([
                'itemName' => 'School/Office supplies',
                'category' => '1',
                'price' => '76.40'
               ]);

               priceList::create([
                'itemName' => 'Slippers',
                'category' => '1',
                'price' => '506.85'
               ]);

               priceList::create([
                'itemName' => 'Slippers',
                'category' => '1',
                'price' => '342.87'
               ]);

               priceList::create([
                'itemName' => 'Slippers',
                'category' => '1',
                'price' => '779.65'
               ]);

               priceList::create([
                'itemName' => 'Soft drinks',
                'category' => '1',
                'price' => '45.98'
               ]);

               priceList::create([
                'itemName' => 'Stool chair plastic',
                'category' => '1',
                'price' => '24.93'
               ]);

               priceList::create([
                'itemName' => 'Travelling bag',
                'category' => '1',
                'price' => '127.68'
               ]);

               priceList::create([
                'itemName' => 'Tumbler empty Big/Content',
                'category' => '1',
                'price' => '508.85'
               ]);

               priceList::create([
                'itemName' => 'Tumbler empty med/content',
                'category' => '1',
                'price' => '383.04'
               ]);

               priceList::create([
                'itemName' => 'VARIOUS SACKS',
                'category' => '1',
                'price' => '127.68'
               ]);

               priceList::create([
                'itemName' => 'VARIOUS REGULAR',
                'category' => '1',
                'price' => '127.68'
               ]);

               priceList::create([
                'itemName' => 'Amazon Green screen',
                'category' => '2',
                'price' => '127.68'
               ]);

               priceList::create([
                'itemName' => 'Motor oil',
                'category' => '2',
                'price' => '76.40'
               ]);

               priceList::create([
                'itemName' => 'PVC door',
                'category' => '2',
                'price' => '252.23'
               ]);

               priceList::create([
                'itemName' => 'Barbed Wire',
                'category' => '2',
                'price' => '125.22'
               ]);

               priceList::create([
                'itemName' => 'Bowl, Pail Flush',
                'category' => '2',
                'price' => '127.68'
               ]);

               priceList::create([
                'itemName' => 'Cmenet 40 kg',
                'category' => '2',
                'price' => '64.99'
               ]);

               priceList::create([
                'itemName' => 'CWN',
                'category' => '2',
                'price' => '76.40'
               ]);

               priceList::create([
                'itemName' => 'Cyclone wire 4"',
                'category' => '2',
                'price' => '76.40'
               ]);

               priceList::create([
                'itemName' => 'Cyclone wire 6"',
                'category' => '2',
                'price' => '127.68'
               ]);

               priceList::create([
                'itemName' => 'Glassware (small)',
                'category' => '2',
                'price' => '76.40'
               ]);

               priceList::create([
                'itemName' => 'Gutter',
                'category' => '2',
                'price' => '31.20'
               ]);

               priceList::create([
                'itemName' => 'HARDWARES (small)',
                'category' => '2',
                'price' => '76.40'
               ]);

               priceList::create([
                'itemName' => 'Hog wire',
                'category' => '2',
                'price' => '127.68'
               ]);

               priceList::create([
                'itemName' => 'Ladder, Aluminum',
                'category' => '2',
                'price' => '382.88'
               ]);

               priceList::create([
                'itemName' => 'Lumber',
                'category' => '2',
                'price' => '5.72'
               ]);

               priceList::create([
                'itemName' => 'Paints',
                'category' => '2',
                'price' => '76.40'
               ]);

               priceList::create([
                'itemName' => 'Plastic chair with arm',
                'category' => '2',
                'price' => '76.40'
               ]);

               priceList::create([
                'itemName' => 'Plastic chair without arm',
                'category' => '2',
                'price' => '46.32'
               ]);

               priceList::create([
                'itemName' => 'Plastic table',
                'category' => '2',
                'price' => '127.34'
               ]);

               priceList::create([
                'itemName' => 'Plastic ware (regular)',
                'category' => '2',
                'price' => '127.68'
               ]);

               priceList::create([
                'itemName' => 'Plastic ware (small)',
                'category' => '2',
                'price' => '76.40'
               ]);

               priceList::create([
                'itemName' => 'Pre-painted color roofing',
                'category' => '2',
                'price' => '4.24'
               ]);

               priceList::create([
                'itemName' => 'PVC Molding',
                'category' => '2',
                'price' => '2.66'
               ]);

               priceList::create([
                'itemName' => 'Ridge roll',
                'category' => '2',
                'price' => '31.20'
               ]);

               priceList::create([
                'itemName' => 'Tile grout 25 kg',
                'category' => '2',
                'price' => '44.03'
               ]);

               priceList::create([
                'itemName' => 'Thermoplastic Roof',
                'category' => '2',
                'price' => '4.25'
               ]);

               priceList::create([
                'itemName' => 'Tie wire 30 kg',
                'category' => '2',
                'price' => '111.80'
               ]);

               priceList::create([
                'itemName' => 'Tie wire 45 kg',
                'category' => '2',
                'price' => '167.71'
               ]);

               priceList::create([
                'itemName' => 'TILES (All size)',
                'category' => '2',
                'price' => '76.40'
               ]);

               priceList::create([
                'itemName' => 'Tire',
                'category' => '2',
                'price' => '145.72'
               ]);

               priceList::create([
                'itemName' => 'Tire',
                'category' => '2',
                'price' => '204.23'
               ]);

               priceList::create([
                'itemName' => 'Tire',
                'category' => '2',
                'price' => '250.45'
               ]);

               priceList::create([
                'itemName' => 'Tire',
                'category' => '2',
                'price' => '278.76'
               ]);

               priceList::create([
                'itemName' => 'Tire',
                'category' => '2',
                'price' => '626.10'
               ]);

               priceList::create([
                'itemName' => 'Tire, bicycle',
                'category' => '2',
                'price' => '14.91'
               ]);

               priceList::create([
                'itemName' => 'Tire, Motorcycle',
                'category' => '2',
                'price' => '40.25'
               ]);

               priceList::create([
                'itemName' => 'Trailer hand',
                'category' => '2',
                'price' => '76.40'
               ]);

               priceList::create([
                'itemName' => 'Trailer hand',
                'category' => '2',
                'price' => '127.68'
               ]);

               priceList::create([
                'itemName' => 'Water closets 2 pcs/set',
                'category' => '2',
                'price' => '521.75'
               ]);

               priceList::create([
                'itemName' => 'Water tank',
                'category' => '2',
                'price' => '4165.07'
               ]);

               priceList::create([
                'itemName' => 'Welded wire',
                'category' => '2',
                'price' => '127.68'
               ]);

               priceList::create([
                'itemName' => 'Wooden door',
                'category' => '2',
                'price' => '274.91'
               ]);

               priceList::create([
                'itemName' => 'AUV',
                'category' => '3',
                'price' => '27131.10'
               ]);

               priceList::create([
                'itemName' => 'Bicycle',
                'category' => '3',
                'price' => '127.68'
               ]);

               priceList::create([
                'itemName' => 'Bicycle',
                'category' => '3',
                'price' => '380.13'
               ]);

               priceList::create([
                'itemName' => 'Bicycle with side car',
                'category' => '3',
                'price' => '737.90'
               ]);

               priceList::create([
                'itemName' => 'Engine 12 HP/ Genset',
                'category' => '3',
                'price' => '970.45'
               ]);

               priceList::create([
                'itemName' => 'Engine Diesel 289 HP',
                'category' => '3',
                'price' => '15670.45'
               ]);

               priceList::create([
                'itemName' => 'High Ace Commuter',
                'category' => '3',
                'price' => '29262.84'
               ]);

               priceList::create([
                'itemName' => 'L300',
                'category' => '3',
                'price' => '31975.94'
               ]);

               priceList::create([
                'itemName' => 'Mazda Dropside',
                'category' => '3',
                'price' => '24728.07'
               ]);

               priceList::create([
                'itemName' => 'Mini Dump',
                'category' => '3',
                'price' => '32479.81'
               ]);

               priceList::create([
                'itemName' => 'Motorcycle small',
                'category' => '3',
                'price' => '2575.97'
               ]);

               priceList::create([
                'itemName' => 'Motorcycle TMX/XRM',
                'category' => '3',
                'price' => '3670.76'
               ]);

               priceList::create([
                'itemName' => 'Motorcycle with side car',
                'category' => '3',
                'price' => '9176.87'
               ]);

               priceList::create([
                'itemName' => 'SUV Tucson',
                'category' => '3',
                'price' => '30328.69'
               ]);

               priceList::create([
                'itemName' => 'Truck 14 ft"',
                'category' => '3',
                'price' => '48041.43'
               ]);

               priceList::create([
                'itemName' => 'Truck wide/Backhoe',
                'category' => '3',
                'price' => '55831.94'
               ]);

               priceList::create([
                'itemName' => 'Aircon',
                'category' => '4',
                'price' => '656.81'
               ]);

               priceList::create([
                'itemName' => 'Aircon package type (2pcs)',
                'category' => '4',
                'price' => '2757.83'
               ]);

               priceList::create([
                'itemName' => 'Aircon split type 1 HP (2pcs)',
                'category' => '4',
                'price' => '894.43'
               ]);

               priceList::create([
                'itemName' => 'Aircon split type 2 HP (2pcs)',
                'category' => '4',
                'price' => '961.51'
               ]);

               priceList::create([
                'itemName' => 'APPLIANCES (low value)',
                'category' => '4',
                'price' => '127.68'
               ]);

               priceList::create([
                'itemName' => 'Bamboo set',
                'category' => '4',
                'price' => '1273.27'
               ]);

               priceList::create([
                'itemName' => 'Filling Cabinet, steel',
                'category' => '4',
                'price' => '1144.42'
               ]);

               priceList::create([
                'itemName' => 'Folding Bed',
                'category' => '4',
                'price' => '76.40'
               ]);

               priceList::create([
                'itemName' => 'Linoleum',
                'category' => '4',
                'price' => '245.97'
               ]);

               priceList::create([
                'itemName' => 'Refrigerator 5 CuFt',
                'category' => '4',
                'price' => '1278.23'
               ]);

               priceList::create([
                'itemName' => 'Refrigerator 6 CuFt',
                'category' => '4',
                'price' => '1705.39'
               ]);

               priceList::create([
                'itemName' => 'Refrigerator 7 CuFt',
                'category' => '4',
                'price' => '2437.14'
               ]);

               priceList::create([
                'itemName' => 'Refrigerator 8 CuFt',
                'category' => '4',
                'price' => '2789.14'
               ]);

               priceList::create([
                'itemName' => 'Refrigerator 9 CuFt',
                'category' => '4',
                'price' => '2906.90'
               ]);

               priceList::create([
                'itemName' => 'Rice dispenser',
                'category' => '4',
                'price' => '183.36'
               ]);

               priceList::create([
                'itemName' => 'Sala set',
                'category' => '4',
                'price' => '2546.16'
               ]);

               priceList::create([
                'itemName' => 'Television',
                'category' => '4',
                'price' => '208.70'
               ]);

               priceList::create([
                'itemName' => 'Television',
                'category' => '4',
                'price' => '253.42'
               ]);

               priceList::create([
                'itemName' => 'Television',
                'category' => '4',
                'price' => '283.24'
               ]);

               priceList::create([
                'itemName' => 'Television',
                'category' => '4',
                'price' => '348.22'
               ]);

               priceList::create([
                'itemName' => 'Television',
                'category' => '4',
                'price' => '432.31'
               ]);

               priceList::create([
                'itemName' => 'Television',
                'category' => '4',
                'price' => '477.03'
               ]);

               priceList::create([
                'itemName' => 'Television',
                'category' => '4',
                'price' => '596.29'
               ]);

               priceList::create([
                'itemName' => 'Television',
                'category' => '4',
                'price' => '689.46'
               ]);

               priceList::create([
                'itemName' => 'Washing Machine',
                'category' => '4',
                'price' => '954.06'
               ]);

               priceList::create([
                'itemName' => 'Washing Machine',
                'category' => '4',
                'price' => '866.11'
               ]);

               priceList::create([
                'itemName' => 'Washing Machine twin tub',
                'category' => '4',
                'price' => '1812.71'
               ]);

               priceList::create([
                'itemName' => '6mm x 6m Rsbar',
                'category' => '5',
                'price' => '4.96'
               ]);

               priceList::create([
                'itemName' => '7mm x 6m Rsbar',
                'category' => '5',
                'price' => '6.74'
               ]);

               priceList::create([
                'itemName' => '8mm x 6m Rsbar (REROLLED BAR)',
                'category' => '5',
                'price' => '8.83'
               ]);

               priceList::create([
                'itemName' => '9mm x 6m Rsbar (REROLLED BAR)',
                'category' => '5',
                'price' => '11.18'
               ]);

               priceList::create([
                'itemName' => '10mm x 6m Rsbar',
                'category' => '5',
                'price' => '13.79'
               ]);

               priceList::create([
                'itemName' => '10mm x 7.5m Rsbar',
                'category' => '5',
                'price' => '17.23'
               ]);

               priceList::create([
                'itemName' => '10mm x 9m Rsbar',
                'category' => '5',
                'price' => '20.65'
               ]);

               priceList::create([
                'itemName' => '10mm x 10.5m Rsbar',
                'category' => '5',
                'price' => '24.11'
               ]);

               priceList::create([
                'itemName' => '10mm x 12m Rsbar',
                'category' => '5',
                'price' => '27.56'
               ]);

               priceList::create([
                'itemName' => '12mm x 6m Rsbar',
                'category' => '5',
                'price' => '19.86'
               ]);

               priceList::create([
                'itemName' => '12mm x 7.5m Rsbar',
                'category' => '5',
                'price' => '24.82'
               ]);

               priceList::create([
                'itemName' => '12mm x 9m Rsbar',
                'category' => '5',
                'price' => '29.81'
               ]);

               priceList::create([
                'itemName' => '12mm x 10.5m Rsbar',
                'category' => '5',
                'price' => '34.77'
               ]);

               priceList::create([
                'itemName' => '12mm x 12m Rsbar',
                'category' => '5',
                'price' => '39.72'
               ]);

               priceList::create([
                'itemName' => '16mm x 6m Rsbar',
                'category' => '5',
                'price' => '35.30'
               ]);

               priceList::create([
                'itemName' => '16mm x 7.5m Rsbar',
                'category' => '5',
                'price' => '44.13'
               ]);

               priceList::create([
                'itemName' => '16mm x 9m Rsbar',
                'category' => '5',
                'price' => '52.97'
               ]);

               priceList::create([
                'itemName' => '16mm x 10.5m Rsbar',
                'category' => '5',
                'price' => '61.8'
               ]);

               priceList::create([
                'itemName' => '16mm x 12m Rsbar',
                'category' => '5',
                'price' => '70.63'
               ]);

               priceList::create([
                'itemName' => '20mm x 6m Rsbar',
                'category' => '5',
                'price' => '55.15'
               ]);

               priceList::create([
                'itemName' => '20mm x 7.5m Rsbar',
                'category' => '5',
                'price' => '68.95'
               ]);

               priceList::create([
                'itemName' => '20mm x 9m Rsbar',
                'category' => '5',
                'price' => '82.71'
               ]);

               priceList::create([
                'itemName' => '20mm x 10.5m Rsbar',
                'category' => '5',
                'price' => '96.53'
               ]);

               priceList::create([
                'itemName' => '20mm x 12m Rsbar',
                'category' => '5',
                'price' => '110.32'
               ]);

               priceList::create([
                'itemName' => '25mm x 6m Rsbar',
                'category' => '5',
                'price' => '86.16'
               ]);

               priceList::create([
                'itemName' => '25mm x 7.5m Rsbar',
                'category' => '5',
                'price' => '107.73'
               ]);

               priceList::create([
                'itemName' => '25mm x 9m Rsbar',
                'category' => '5',
                'price' => '129.29'
               ]);

               priceList::create([
                'itemName' => '25mm x 10.5m Rsbar',
                'category' => '5',
                'price' => '150.88'
               ]);

               priceList::create([
                'itemName' => '25mm x 12m Rsbar',
                'category' => '5',
                'price' => '172.37'
               ]);

               priceList::create([
                'itemName' => '32mm x 6m Rsbar',
                'category' => '5',
                'price' => '141.17'
               ]);

               priceList::create([
                'itemName' => '32mm x 7.5m Rsbar',
                'category' => '5',
                'price' => '161.56'
               ]);

               priceList::create([
                'itemName' => '32mm x 9m Rsbar',
                'category' => '5',
                'price' => '211.76'
               ]);

               priceList::create([
                'itemName' => '32mm x 10.5m Rsbar',
                'category' => '5',
                'price' => '247.03'
               ]);

               priceList::create([
                'itemName' => '32mm x 12m Rsbar',
                'category' => '5',
                'price' => '282.34'
               ]);

               priceList::create([
                'itemName' => 'Pipe HDPE 1" (32mm) X 100m',
                'category' => '6',
                'price' => '367.58'
               ]);

               priceList::create([
                'itemName' => 'Pipe HDPE 1-1/4" (40mm) x 60m',
                'category' => '6',
                'price' => '343.48'
               ]);

               priceList::create([
                'itemName' => 'Pipe HDPE 1-1/2" (50mm) X 60m',
                'category' => '6',
                'price' => '536.66'
               ]);

               priceList::create([
                'itemName' => 'Pipe HDPE 2" (63mm) X 60m',
                'category' => '6',
                'price' => '851.49'
               ]);

               priceList::create([
                'itemName' => 'Pipe HDPE 2-1/2" (75mm) X 60m',
                'category' => '6',
                'price' => '1207.4'
               ]);

               priceList::create([
                'itemName' => 'Pipe HDPE 3" (90mm) X 6m',
                'category' => '6',
                'price' => '173.88'
               ]);

               priceList::create([
                'itemName' => 'Pipe HDPE 4" (110mm) X 6m',
                'category' => '6',
                'price' => '259.75'
               ]);

               priceList::create([
                'itemName' => '1/2 x 6 Gi Pipe sch 40',
                'category' => '6',
                'price' => '20.12'
               ]);

               priceList::create([
                'itemName' => '3/4 x 6 GI pipe sch 40',
                'category' => '6',
                'price' => '27.02'
               ]);

               priceList::create([
                'itemName' => '1-1/4 x 6 GI pipe sch 40',
                'category' => '6',
                'price' => '54.04'
               ]);

               priceList::create([
                'itemName' => '1-1/2 X 6 GI pipe sch 40',
                'category' => '6',
                'price' => '67.08'
               ]);

               priceList::create([
                'itemName' => '1 X 6 GI pipe sch 40',
                'category' => '6',
                'price' => '41'
               ]);

               priceList::create([
                'itemName' => '2 X 6 GI pipe sch 40',
                'category' => '6',
                'price' => '84.44'
               ]);

               priceList::create([
                'itemName' => '3 X 6 GI pipe sch 40',
                'category' => '6',
                'price' => '145.34'
               ]);

               priceList::create([
                'itemName' => '4 X 6 GI pipe sch 40',
                'category' => '6',
                'price' => '167.71'
               ]);

               priceList::create([
                'itemName' => 'PVC Pipe 1/2 X 3m',
                'category' => '6',
                'price' => '8.47'
               ]);

               priceList::create([
                'itemName' => 'PVC Pipe 3/4 X 3m',
                'category' => '6',
                'price' => '11.18'
               ]);

               priceList::create([
                'itemName' => 'PVC Pipe 1 X 3m',
                'category' => '6',
                'price' => '14.91'
               ]);

               priceList::create([
                'itemName' => 'PVC Pipe 2 (63mm) X 3m',
                'category' => '6',
                'price' => '28.38'
               ]);

               priceList::create([
                'itemName' => 'PVC Pipe 2 X 3',
                'category' => '6',
                'price' => '28.7'
               ]);

               priceList::create([
                'itemName' => 'PVC Pipe 3 (90mm) X 3m',
                'category' => '6',
                'price' => '57.24'
               ]);

               priceList::create([
                'itemName' => 'PVC pipe 3 X 3 ',
                'category' => '6',
                'price' => '51.89'
               ]);

               priceList::create([
                'itemName' => 'PVC Pipe 4 (110mm) X 3m',
                'category' => '6',
                'price' => '64.39'
               ]);

               priceList::create([
                'itemName' => 'PVC Pipe 4 x 3',
                'category' => '6',
                'price' => '69.1'
               ]);

               priceList::create([
                'itemName' => 'PVC Pipe 6 (160mm) X 3m',
                'category' => '6',
                'price' => '135.95'
               ]);

               priceList::create([
                'itemName' => 'PVC pipe 6 x 3',
                'category' => '6',
                'price' => '150.93'
               ]);

               priceList::create([
                'itemName' => 'FUEL, DIESEL, GASOLINE IN CON.',
                'category' => '7',
                'price' => '4.48'
               ]);

               priceList::create([
                'itemName' => 'FUEL (DRUM)',
                'category' => '7',
                'price' => '853.78'
               ]);

               priceList::create([
                'itemName' => 'KEROSENE IN JUG',
                'category' => '7',
                'price' => '84.96'
               ]);

               priceList::create([
                'itemName' => 'LPG BIG (FULL)',
                'category' => '7',
                'price' => '254.22'
               ]);

               priceList::create([
                'itemName' => 'LPG MED (FULL)',
                'category' => '7',
                'price' => '133.22'
               ]);

               priceList::create([
                'itemName' => 'LPG SMALL (FULL)',
                'category' => '7',
                'price' => '59.04'
               ]);

               priceList::create([
                'itemName' => 'SUPER KALAN (FULL)/EMPTY',
                'category' => '7',
                'price' => '19.68'
               ]);

               priceList::create([
                'itemName' => '1/4(6.0) x 1 X 6 flat Bar',
                'category' => '7',
                'price' => '26.36'
               ]);

               priceList::create([
                'itemName' => '1/4(6.0) x 1-1/2 x 6 flat Bar',
                'category' => '7',
                'price' => '39.51'
               ]);

               priceList::create([
                'itemName' => '1/4(6.0) x 2 x 6 Flat bar',
                'category' => '7',
                'price' => '52.66'
               ]);

               priceList::create([
                'itemName' => '1/4(6.0) x 2-1/2X6 Flat bar',
                'category' => '7',
                'price' => '65.82'
               ]);

               priceList::create([
                'itemName' => '1/4(6.0) x 3 x 6 Flat bar',
                'category' => '7',
                'price' => '79.01'
               ]);

               priceList::create([
                'itemName' => '1/4(6.0) x 4 x 6 Flat bar',
                'category' => '7',
                'price' => '105.31'
               ]);

               priceList::create([
                'itemName' => '1/8(3.175) x 1 x 6 flat bar ',
                'category' => '7',
                'price' => '13.94'
               ]);
               priceList::create([
                'itemName' => '1/8(3.175) x 1-1/2 x 6 flat bar',
                'category' => '7',
                'price' => '20.91'
               ]);

               priceList::create([
                'itemName' => '1/8(3.175) x 2 x 6 flat bar ',
                'category' => '7',
                'price' => '27.87'
               ]);

               priceList::create([
                'itemName' => '1/8(3.175) x 2-1/2 x 6 flat bar ',
                'category' => '7',
                'price' => '34.89'
               ]);

               priceList::create([
                'itemName' => '1/8(3.175) x 3 x 6 flat bar ',
                'category' => '7',
                'price' => '41.82'
               ]);

               priceList::create([
                'itemName' => '1/8(3.175) x 4 x 6 flat bar',
                'category' => '7',
                'price' => '55.73'
               ]);

               priceList::create([
                'itemName' => '3/16(4.76) x 1 x 6 flat bar',
                'category' => '7',
                'price' => '20.88'
               ]);

               priceList::create([
                'itemName' => '3/16(4.76) x 1-1/2X6 flat bar',
                'category' => '7',
                'price' => '31.34'
               ]);

               priceList::create([
                'itemName' => '3/16(4.76) x 2 x 6 flat bar',
                'category' => '7',
                'price' => '43.98'
               ]);

               priceList::create([
                'itemName' => '3/16(4.76) x 2-1/2 flat bar',
                'category' => '7',
                'price' => '52.17'
               ]);

               priceList::create([
                'itemName' => '3/16(4.76) x 3 x 6 flat bar',
                'category' => '7',
                'price' => '62.61'
               ]);

               priceList::create([
                'itemName' => '3/16(4.76) x 4 x 6 flat bar',
                'category' => '7',
                'price' => '83.56'
               ]);

               priceList::create([
                'itemName' => '5mm(1.4) Plywood',
                'category' => '8',
                'price' => '41.75'
               ]);

               priceList::create([
                'itemName' => '10mm(1/2) plywood',
                'category' => '8',
                'price' => '83.49'
               ]);

               priceList::create([
                'itemName' => '18mm(3/4) plywood/plyboard',
                'category' => '8',
                'price' => '125.22'
               ]);

               priceList::create([
                'itemName' => '21mm(1) plywood',
                'category' => '8',
                'price' => '166.96'
               ]);

               priceList::create([
                'itemName' => '0.35mm x 6m corr. G.I Sheet',
                'category' => '8',
                'price' => '13.42'
               ]);

               priceList::create([
                'itemName' => '0.35mm x 7m corr. G.I Sheet',
                'category' => '8',
                'price' => '15.65'
               ]);

               priceList::create([
                'itemName' => '0.35mm x 8m corr. G.I Sheet',
                'category' => '8',
                'price' => '17.89'
               ]);

               priceList::create([
                'itemName' => '0.35mm x 9m corr. G.I Sheet',
                'category' => '8',
                'price' => '20.12'
               ]);

               priceList::create([
                'itemName' => '0.35mm x 10m corr. G.I Sheet',
                'category' => '8',
                'price' => '22.36'
               ]);

               priceList::create([
                'itemName' => '0.35mm x 12m corr. G.I Sheet',
                'category' => '8',
                'price' => '20.12'
               ]);

               priceList::create([
                'itemName' => '0.50mm x 6m corr.G.I Sheet',
                'category' => '8',
                'price' => '37.5'
               ]);

               priceList::create([
                'itemName' => '0.50mm x 8m corr.G.I Sheet',
                'category' => '8',
                'price' => '42.26'
               ]);

               priceList::create([
                'itemName' => '0.50mm x 9m corr.G.I Sheet',
                'category' => '8',
                'price' => '42.26'
               ]);

               priceList::create([
                'itemName' => '0.50mm x 10m corr.G.I Sheet',
                'category' => '8',
                'price' => '46.95'
               ]);

               priceList::create([
                'itemName' => '0.50mm x 12m corr.G.I Sheet',
                'category' => '8',
                'price' => '56.35'
               ]);

               priceList::create([
                'itemName' => '0.5mm x 18ft corr.G.I sheet',
                'category' => '8',
                'price' => '68.61'
               ]);

               priceList::create([
                'itemName' => '0.5mm x 15ft corr.G.I sheet',
                'category' => '8',
                'price' => '63.11'
               ]);

               priceList::create([
                'itemName' => 'Plain sheet',
                'category' => '8',
                'price' => '33.06'
               ]);

               priceList::create([
                'itemName' => 'Ridge roll',
                'category' => '8',
                'price' => '31.24'
               ]);

               priceList::create([
                'itemName' => 'Frozen',
                'category' => '9',
                'price' => '5.17'
               ]);

               priceList::create([
                'itemName' => 'Egg 5tray/bundle',
                'category' => '9',
                'price' => '45.98'
               ]);

               priceList::create([
                'itemName' => 'Vegetable',
                'category' => '9',
                'price' => '45.98'
               ]);

               priceList::create([
                'itemName' => 'Fruits',
                'category' => '9',
                'price' => '45.98'
               ]);

               priceList::create([
                'itemName' => '1/8(3.175) X 1X 6 Angle Bar',
                'category' => '10',
                'price' => '27.84'
               ]);

               priceList::create([
                'itemName' => '1/8(3.175) X 1-1/2X 6 Angle Bar (STAINLESS)',
                'category' => '10',
                'price' => '41.78'
               ]);

               priceList::create([
                'itemName' => '1/8(3.175) X 2X 6 Angle Bar',
                'category' => '10',
                'price' => '55.73'
               ]);

               priceList::create([
                'itemName' => '1/8(3.175) X 2-1/2X 6 Angle Bar',
                'category' => '10',
                'price' => '69.66'
               ]);

               priceList::create([
                'itemName' => '1/8(3.175) X 3X 6 Angle Bar',
                'category' => '10',
                'price' => '83.59'
               ]);

               priceList::create([
                'itemName' => '1/8(3.175) X 4X 6 Angle Bar',
                'category' => '10',
                'price' => '111.46'
               ]);

               priceList::create([
                'itemName' => '1/4(6mm) x 1 x 6 Angle Bar',
                'category' => '10',
                'price' => '52.66'
               ]);

               priceList::create([
                'itemName' => '1/4(6mm) x 1-1/2 x 6 Angle Bar',
                'category' => '10',
                'price' => '79.01'
               ]);

               priceList::create([
                'itemName' => '1/4(6mm) x 2 x 6 Angle Bar',
                'category' => '10',
                'price' => '105.41'
               ]);

               priceList::create([
                'itemName' => '1/4(6mm) x 2-1/2 x 6 Angle Bar',
                'category' => '10',
                'price' => '131.67'
               ]);

               priceList::create([
                'itemName' => '1/4(6mm) x 3 x 6 Angle Bar',
                'category' => '10',
                'price' => '157.98'
               ]);

               priceList::create([
                'itemName' => '1/4(6mm) x 4 x 6 Angle Bar',
                'category' => '10',
                'price' => '210.64'
               ]);

               priceList::create([
                'itemName' => '1/2(12) X 2 x 6 Angle Bar',
                'category' => '10',
                'price' => '210.64'
               ]);

               priceList::create([
                'itemName' => '1/2(12) X 3 x 6 Angle Bar',
                'category' => '10',
                'price' => '315.95'
               ]);

               priceList::create([
                'itemName' => '1/2(12) X 4 x 6 Angle Bar',
                'category' => '10',
                'price' => '421.28'
               ]);

               priceList::create([
                'itemName' => '1/2(12) X 6 x 6 Angle Bar',
                'category' => '10',
                'price' => '631.91'
               ]);

               priceList::create([
                'itemName' => '3/16(4.76) x 1X 6 Angle Bar',
                'category' => '10',
                'price' => '41.79'
               ]);

               priceList::create([
                'itemName' => '3/16(4.76) x 1-1/2X 6 Angle Bar',
                'category' => '10',
                'price' => '62.65'
               ]);

               priceList::create([
                'itemName' => '3/16(4.76) x 2X 6 Angle Bar',
                'category' => '10',
                'price' => '83.56'
               ]);

               priceList::create([
                'itemName' => '3/16(4.76) x 2-1/2X 6 Angle Bar',
                'category' => '10',
                'price' => '104.35'
               ]);

               priceList::create([
                'itemName' => '3/16(4.76) x 3X 6 Angle Bar',
                'category' => '10',
                'price' => '125.33'
               ]);

               priceList::create([
                'itemName' => '3/16(4.76) x 4X 6 Angle Bar',
                'category' => '10',
                'price' => '167.11'
               ]);

               priceList::create([
                'itemName' => '1 Set H-Frame 1.25 x 1.70 x 7',
                'category' => '11',
                'price' => '266.13'
               ]);

               priceList::create([
                'itemName' => '150.831 Set H-Frame 1.70 x 1.24 x 4',
                'category' => '11',
                'price' => '150.83'
               ]);

               priceList::create([
                'itemName' => 'Angle Bar 6.0x 6305x63.5',
                'category' => '11',
                'price' => '176.94'
               ]);

               priceList::create([
                'itemName' => 'Angle Bar 6.0x 75x75',
                'category' => '11',
                'price' => '147.5'
               ]);

               priceList::create([
                'itemName' => 'Shoring Jack',
                'category' => '11',
                'price' => '18.15'
               ]);

               priceList::create([
                'itemName' => 'Thermo Corr',
                'category' => '11',
                'price' => '75.13'
               ]);

               priceList::create([
                'itemName' => 'Thermo Corr',
                'category' => '11',
                'price' => '42.26'
               ]);

               priceList::create([
                'itemName' => 'Thermo Corr',
                'category' => '11',
                'price' => '37.58'
               ]);

               priceList::create([
                'itemName' => 'Thermo Corr',
                'category' => '11',
                'price' => '56.35'
               ]);

               priceList::create([
                'itemName' => 'Thermo Corr',
                'category' => '11',
                'price' => '39.66'
               ]);

               priceList::create([
                'itemName' => 'Thermo Corr',
                'category' => '11',
                'price' => '34.87'
               ]);

               priceList::create([
                'itemName' => 'Plain sheet',
                'category' => '11',
                'price' => '30.05'
               ]);

               priceList::create([
                'itemName' => 'Ridge reel',
                'category' => '11',
                'price' => '31.24'
               ]);

               priceList::create([
                'itemName' => 'Acrylic',
                'category' => '11',
                'price' => '46.96'
               ]);

               priceList::create([
                'itemName' => 'Plain Bar',
                'category' => '11',
                'price' => '35.3'
               ]);
               
               priceList::create([
                'itemName' => 'Round Bar',
                'category' => '11',
                'price' => '188.73'
               ]);

               priceList::create([
                'itemName' => 'Round Bar',
                'category' => '11',
                'price' => '86.16'
               ]);

               priceList::create([
                'itemName' => 'Round Bar',
                'category' => '11',
                'price' => '55.15'
               ]);

               priceList::create([
                'itemName' => 'Round Bar',
                'category' => '11',
                'price' => '130.83'
               ]);

               priceList::create([
                'itemName' => 'MS Plates',
                'category' => '11',
                'price' => '188.17'
               ]);

               priceList::create([
                'itemName' => 'Square Bar',
                'category' => '11',
                'price' => '40.66'
               ]);

               priceList::create([
                'itemName' => 'Square Bar',
                'category' => '11',
                'price' => '19.87'
               ]);

               priceList::create([
                'itemName' => 'Beer (case only)',
                'category' => '12',
                'price' => '14.14'
               ]);

               priceList::create([
                'itemName' => 'Beer, empty (case & bottle)',
                'category' => '12',
                'price' => '22.14'
               ]);

               priceList::create([
                'itemName' => 'Beer, light, empty',
                'category' => '12',
                'price' => '22.14'
               ]);

               priceList::create([
                'itemName' => 'Beer, Pilsen, empty',
                'category' => '12',
                'price' => '22.14'
               ]);

               priceList::create([
                'itemName' => 'Beer, Red horse 1L empty',
                'category' => '12',
                'price' => '22.14'
               ]);

               priceList::create([
                'itemName' => 'Bottle empty (sacks)',
                'category' => '12',
                'price' => '31.46'
               ]);

               priceList::create([
                'itemName' => 'Coke empty',
                'category' => '12',
                'price' => '22.13'
               ]);

               priceList::create([
                'itemName' => 'Documents',
                'category' => '12',
                'price' => '121'
               ]);

               priceList::create([
                'itemName' => 'Empty cases with bottle (RHL, SML, PP,SD)',
                'category' => '12',
                'price' => '22.13'
               ]);

               priceList::create([
                'itemName' => 'Empty drum',
                'category' => '12',
                'price' => '183.36'
               ]);

               priceList::create([
                'itemName' => 'Empty container van 10',
                'category' => '12',
                'price' => '14310.91'
               ]);

               priceList::create([
                'itemName' => 'Empty container 20',
                'category' => '12',
                'price' => '28621.82'
               ]);

               priceList::create([
                'itemName' => 'Empty drum',
                'category' => '12',
                'price' => '183.36'
               ]);

               priceList::create([
                'itemName' => 'Empty gin bottle',
                'category' => '12',
                'price' => '31.46'
               ]);

               priceList::create([
                'itemName' => 'Empty shell',
                'category' => '12',
                'price' => '14.64'
               ]);

               priceList::create([
                'itemName' => 'Garlic in sacks',
                'category' => '12',
                'price' => '111.8'
               ]);

               priceList::create([
                'itemName' => 'LPG Big (empty',
                'category' => '12',
                'price' => '127.78'
               ]);

               priceList::create([
                'itemName' => 'LPG Medium (empty)',
                'category' => '12',
                'price' => '63.89'
               ]);

               priceList::create([
                'itemName' => 'LPG small (empty)',
                'category' => '12',
                'price' => '29.95'
               ]);

               priceList::create([
                'itemName' => 'Oxygen/acetylene',
                'category' => '12',
                'price' => '127.78'
               ]);

               priceList::create([
                'itemName' => 'Plastic/iron scrap (tons)',
                'category' => '12',
                'price' => '1118.04'
               ]);

               priceList::create([
                'itemName' => 'Root crops bx',
                'category' => '12',
                'price' => '76.4'
               ]);

               priceList::create([
                'itemName' => 'Root crops bsacks reg',
                'category' => '12',
                'price' => '76.4'
               ]);

               priceList::create([
                'itemName' => 'Soft drinks (case only)',
                'category' => '12',
                'price' => '14.14'
               ]);

               priceList::create([
                'itemName' => 'Soft drinks (case & bottle)',
                'category' => '12',
                'price' => '22.13'
               ]);

               priceList::create([
                'itemName' => 'GROCERIES/CS',
                'category' => '13',
                'price' => '1.52'
               ]);

               priceList::create([
                'itemName' => 'VARIOUS/SCKS',
                'category' => '13',
                'price' => '2.08'
               ]);

               priceList::create([
                'itemName' => 'VARIOUS/BNDL',
                'category' => '13',
                'price' => '5.96'
               ]);

               priceList::create([
                'itemName' => 'OIL/TIN',
                'category' => '13',
                'price' => '1.52'
               ]);

               priceList::create([
                'itemName' => 'GEN HARDWARE',
                'category' => '13',
                'price' => '2.01'
               ]);

               priceList::create([
                'itemName' => 'MOTORCYCLE',
                'category' => '13',
                'price' => '65.61'
               ]);

               priceList::create([
                'itemName' => 'DRUMS',
                'category' => '13',
                'price' => '22'
               ]);

               priceList::create([
                'itemName' => 'SUGAR/SACKS',
                'category' => '13',
                'price' => '2.51'
               ]);

               priceList::create([
                'itemName' => 'FEEDS/SACKS',
                'category' => '13',
                'price' => '2.51'
               ]);

               priceList::create([
                'itemName' => 'BICYCLE',
                'category' => '13',
                'price' => '5.97'
               ]);

               priceList::create([
                'itemName' => 'PLYWOOD',
                'category' => '13',
                'price' => '2.39'
               ]);

               priceList::create([
                'itemName' => 'LPG/ALL SIZE',
                'category' => '13',
                'price' => '4.71'
               ]);

               priceList::create([
                'itemName' => 'CEMENT',
                'category' => '13',
                'price' => '2.51'
               ]);

               priceList::create([
                'itemName' => 'RICE 50 KLS ',
                'category' => '13',
                'price' => '1.42'
               ]);
               priceList::create([
                'itemName' => 'RICE 25 KLS',
                'category' => '13',
                'price' => '0.71'
               ]);

               priceList::create([
                'itemName' => 'GSM',
                'category' => '13',
                'price' => '1.02'
               ]);

               priceList::create([
                'itemName' => 'AIRCON/REF',
                'category' => '13',
                'price' => '13.5'
               ]);

               priceList::create([
                'itemName' => 'SMALL BOX',
                'category' => '14',
                'price' => '76.4'
               ]);

               priceList::create([
                'itemName' => 'REGULAR BOX',
                'category' => '14',
                'price' => '127.68'
               ]);

               priceList::create([
                'itemName' => 'REGULAR BOX (25 KGS)',
                'category' => '14',
                'price' => '63.36'
               ]);

               priceList::create([
                'itemName' => 'REGULAR BOX (50 KGS)',
                'category' => '14',
                'price' => '126.71'
               ]);

               priceList::create([
                'itemName' => 'ADHESIVE BAGS',
                'category' => '14',
                'price' => '44.03'
               ]);

               priceList::create([
                'itemName' => 'HOLLOWBLOCKS',
                'category' => '14',
                'price' => '36.3'
               ]);

               priceList::create([
                'itemName' => 'DRUMMING - diesel, premium, unleaded',
                'category' => '14',
                'price' => '853.78'
               ]);

               priceList::create([
                'itemName' => 'VARIOUS UK 45kgs',
                'category' => '14',
                'price' => '381.62'
               ]);

               priceList::create([
                'itemName' => 'VARIOUS UK 50kgs',
                'category' => '14',
                'price' => '424.03'
               ]);

               priceList::create([
                'itemName' => 'VARIOUS UK 100kgs',
                'category' => '14',
                'price' => '763.25'
               ]);

               priceList::create([
                'itemName' => 'ADULT BIKE',
                'category' => '14',
                'price' => '380.14'
               ]);

               priceList::create([
                'itemName' => 'KIDS BIKE',
                'category' => '14',
                'price' => '127.68'
               ]);

               priceList::create([
                'itemName' => 'CEMENT',
                'category' => '14',
                'price' => '64.99'
               ]);

               priceList::create([
                'itemName' => 'E-BIKE (2 WHEELS)',
                'category' => '14',
                'price' => '737.9'
               ]);

               priceList::create([
                'itemName' => 'LPG - SMALL 11kgs',
                'category' => '14',
                'price' => '59.24'
               ]);

               priceList::create([
                'itemName' => 'LPG - MEDIUM 22 kgs',
                'category' => '14',
                'price' => '133.22'
               ]);

               priceList::create([
                'itemName' => 'LPG - Big 50 kgs',
                'category' => '14',
                'price' => '254.22'
               ]);

               priceList::create([
                'itemName' => 'GROCERIES',
                'category' => '14',
                'price' => '45.98'
               ]);

               priceList::create([
                'itemName' => 'FUNCHUM, NUTRIBOOST, ZEST-O',
                'category' => '14',
                'price' => '14.14'
               ]);

               priceList::create([
                'itemName' => 'TILES',
                'category' => '14',
                'price' => '76.4'
               ]);

               priceList::create([
                'itemName' => 'HELMET',
                'category' => '14',
                'price' => '127.68'
               ]);

               priceList::create([
                'itemName' => 'MOTORCYCLE * SMALL (Scooter, Honda Wave, Rs, Motard) ',
                'category' => '14',
                'price' => '2575.97'
               ]);

               priceList::create([
                'itemName' => 'MOTORCYCLE * MEDIUM (Nmax, Rouser, Tmx)',
                'category' => '14',
                'price' => '3670.76'
               ]);

               priceList::create([
                'itemName' => 'MOTORCYCLE * BIG (Aerox, David)',
                'category' => '14',
                'price' => '4441.15'
               ]);

               priceList::create([
                'itemName' => 'FOUR WHEELS',
                'category' => '14',
                'price' => '1761.76'
               ]);

               priceList::create([
                'itemName' => 'GENSET/ENGINE',
                'category' => '14',
                'price' => '5366.59'
               ]);

               priceList::create([
                'itemName' => 'OFFICE SUPPLIES',
                'category' => '14',
                'price' => '2087.01'
               ]);

               priceList::create([
                'itemName' => 'TARPAULIN',
                'category' => '14',
                'price' => '1788.86'
               ]);

               priceList::create([
                'itemName' => 'SAND',
                'category' => '14',
                'price' => '1573'
               ]);

               priceList::create([
                'itemName' => 'CIGARETTE',
                'category' => '14',
                'price' => '127.68'
               ]);

               priceList::create([
                'itemName' => 'SOUTHERN YELLOW PINE POLE ',
                'category' => '14',
                'price' => '1478.40'
               ]);

               priceList::create([
                'itemName' => 'YERO - 6MM',
                'category' => '14',
                'price' => '17.97'
               ]);

               priceList::create([
                'itemName' => 'YERO - 8MM',
                'category' => '14',
                'price' => '23.96'
               ]);

               priceList::create([
                'itemName' => 'YERO - 9MM',
                'category' => '14',
                'price' => '26.96'
               ]);

               priceList::create([
                'itemName' => 'YERO - 10MM',
                'category' => '14',
                'price' => '29.95'
               ]);

               priceList::create([
                'itemName' => 'YERO - 12MM ',
                'category' => '14',
                'price' => '35.94'
               ]);

               priceList::create([
                'itemName' => 'CHILDREN CABINET',
                'category' => '14',
                'price' => '1192.58'
               ]);

               priceList::create([
                'itemName' => 'RUBBER MAT',
                'category' => '14',
                'price' => '2087.01'
               ]);

               priceList::create([
                'itemName' => 'BIKE BASKET',
                'category' => '14',
                'price' => '57.48'
               ]);

               priceList::create([
                'itemName' => 'PLYWOOD - 1/4',
                'category' => '14',
                'price' => '41.75'
               ]);

               priceList::create([
                'itemName' => 'PLYWOOD - 1/2',
                'category' => '14',
                'price' => '83.49'
               ]);

               priceList::create([
                'itemName' => 'PLYWOOD - 3/4',
                'category' => '14',
                'price' => '125.22'
               ]);

               priceList::create([
                'itemName' => 'PLYWOOD - 1',
                'category' => '14',
                'price' => '166.96'
               ]);

               priceList::create([
                'itemName' => 'FIRE EXTINGUISHER',
                'category' => '14',
                'price' => '126.62'
               ]);

               priceList::create([
                'itemName' => 'OXYGEN TANK',
                'category' => '14',
                'price' => '251.33'
               ]);

               priceList::create([
                'itemName' => 'BEST TANK STAINLESS',
                'category' => '14',
                'price' => '1788.86'
               ]);

               priceList::create([
                'itemName' => 'FIBERMAT',
                'category' => '14',
                'price' => '2683.30'
               ]);

               priceList::create([
                'itemName' => 'S4S WOOD 2X2X14',
                'category' => '14',
                'price' => '23.14'
               ]);

               priceList::create([
                'itemName' => 'S4S WOOD 2X3X14',
                'category' => '14',
                'price' => '34.17'
               ]);

               priceList::create([
                'itemName' => 'S4S WOOD 2X4X14',
                'category' => '14',
                'price' => '46.27'
               ]);

               priceList::create([
                'itemName' => 'S4S WOOD 2X6X14',
                'category' => '14',
                'price' => '69.41'
               ]);

               priceList::create([
                'itemName' => 'S4S WOOD 2X8X16',
                'category' => '14',
                'price' => '84.84'
               ]);

               priceList::create([
                'itemName' => 'S4S WOOD 2X2X12',
                'category' => '14',
                'price' => '33.14'
               ]);

               priceList::create([
                'itemName' => '2X3X12',
                'category' => '14',
                'price' => '34.70'
               ]);

               priceList::create([
                'itemName' => '2X4X12',
                'category' => '14',
                'price' => '46.27'
               ]);

               priceList::create([
                'itemName' => '2X5X12',
                'category' => '14',
                'price' => '57.84'
               ]);

               priceList::create([
                'itemName' => '2X6X12',
                'category' => '14',
                'price' => '69.41'
               ]);


                $orderId = "BL7398287";

               parcel::create([
                'itemName' => 'Engine Diesel 289 HP',
                'quantity' => '1',
                'price' => '15670.45',
                'total' => '15670.45',
                'orderId' => $orderId,
                ]);

                parcel::create([
                    'itemName' => 'Engine 12 HP/ Genset',
                    'quantity' => '2',
                    'price' => '970.45',
                    'total' => '1940.90',
                    'orderId' => $orderId,
                    ]);

                    date_default_timezone_set('Asia/Manila');
                    $date = date("F d 20y - g:i a");
                order::create([
                        'shipNum'=> '3',
                        'origin' => 'Manila',
                        'destination' => 'Batanes',
                        'totalAmount' => '17611.35',
                        'cID' => '052023001',
                        'orderId' => $orderId,
                        'orderCreated' => $date,
                        'consigneeName' => 'Janus',
                        'consigneeNum' => '09451278396'
            
                     ]);

    }
}
