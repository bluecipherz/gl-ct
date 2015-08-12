<?php
 
use Illuminate\Database\Seeder;
 
class CategoryTableSeeder extends Seeder {
 
    public function run()
    {
       // Uncomment the below to wipe the table clean before populating
        DB::table('categories')->delete();

        $categories = [
                [
                    'name' => 'Motors',
                    'children' => [
                        [
                            'name' => 'Used Cars for Sale',
                            'children' => [
                                ['name' => 'AUDI'],
                                ['name' => 'BMW'],
                                ['name' => 'Ford'],
                                ['name' => 'LandRover'],
                                ['name' => 'Mercedes Benz'],
                                ['name' => 'Ferrari'],
                                ['name' => 'Bently']
                            ],
                        ],
                        [
                            'name' => 'Heavy Vehicles',
                            'children' => [
                                ['name' => 'Buses'],
                                ['name' => 'Cranes'],
                                ['name' => 'Forklifts'],
                                ['name' => 'Trailers'],
                                ['name' => 'Trucks'],
                                ['name' => 'Tankers'],
                                ['name' => 'Parts & Engine']
                            ],
                        ],
                        [
                            'name' => 'Motorcycles',
                            'children' => [
                                ['name' => 'Cruiser / Chopper'],
                                ['name' => 'Moped'],
                                ['name' => 'Off-Road/Dual Purpose'],
                                ['name' => 'Scooter'],
                                ['name' => 'Sport Bike'],
                                ['name' => 'Standard Motorcycle'],
                                ['name' => 'Touring'],
                                ['name' => 'Trike']
                            ]
                        ],
                        [
                            'name' => 'Boats',
                            'children' => [
                                ['name' => 'Motor Boats'],
                                ['name' => 'Row / Paddle Boats'],
                                ['name' => 'Sail Boats']
                            ]
                        ]
                    ],
                ],
                [
                    'name' => 'Auto Accessories',
                    'children' => [
                        [
                            'name' => 'Apparel, Merchandise & Accessories',
                            'children' => [
                                ['name' => 'Apparel'],
                                ['name' => 'Boat Accessories'],
                                ['name' => 'Cat / 4x4 Accessories'],
                                ['name' => 'Merchandise'],
                                ['name' => 'Motorcycle Accessories']
                            ]
                        ],
                        [
                            'name' => 'Automotive Tools',
                            'children' => [
                                ['name' => 'Tool Accessories'],
                                ['name' => 'Tool Sets'],
                                ['name' => 'Tools']
                            ]
                        ]
                    ],
                ],
                [
                    'name' => 'Auto Spare Parts',
                    'children' => [
                        [
                            'name' => 'Boat Parts',
                            'children' => [
                                ['name' => 'Body Parts & Accessories'],
                                ['name' => 'Engine Parts'],
                                ['name' => 'Plumbing & Ventilation']
                            ]
                        ],
                        [
                            'name' => 'Car Parts',
                            'children' => [
                                ['name' => 'A/C & Heating Parts'],
                                ['name' => 'Batteries'],
                                ['name' => 'Brakes'],
                                ['name' => 'Engine & Computer Parts'],
                                ['name' => 'Exhaust / Air Intake'],
                                ['name' => 'Exterior Parts'],
                                ['name' => 'Interior Parts'],
                                ['name' => 'Lighting'],
                                ['name' => 'Suspension'],
                                ['name' => 'Wheel / Tires']
                            ]
                        ],
                        [
                            'name' => 'Motorcycle Parts',
                            'children' => [
                                ['name' => 'Accessories'],
                                ['name' => 'Body & Frames'],
                                ['name' => 'Engines & Components'],
                                ['name' => 'Lighting'],
                                ['name' => 'Wheels / Tires'],
                                ['name' => 'Number Plates']
                            ]
                        ]
                    ],
                ],
                [
                    'name' => 'Jobs',
                    'children' => [
                        [
                            'name' => 'Accounting',
                            'children' => [
                                ['name' => 'Accounting Business Executive'],
                                ['name' => 'Accounting Executive'],
                                ['name' => 'Accounting Inside Sales Executive'],
                                ['name' => 'Accounting Manager'],
                                ['name' => 'Accountant'],
                                ['name' => 'Accounting Administrator'],
                                ['name' => 'Accounting Assistant'],
                                ['name' => 'Accounting Associate'],
                                ['name' => 'Accounting Clerk'],
                                ['name' => 'Accounting Manager'],
                                ['name' => 'Accounting Supervisor'],
                                ['name' => 'Accounts Payable Assistant'],
                            ]
                        ],
                        [
                            'name' => 'Airlines & Aviation',
                            'children' => [
                                ['name' => 'Purchase Buyer'],
                                ['name' => 'Sales Manager'],
                                ['name' => 'Travel Agent'],
                                ['name' => 'Travel Consultant']
                            ]
                        ],
                        [
                            'name' => 'Architecture & Interior Design',
                            'children' => [
                                ['name' => '.NET Architect'],
                                ['name' => 'Architectural Designer'],
                                ['name' => 'AutoCAD Drafter'],
                                ['name' => 'Business Development Director'],
                                ['name' => 'CNC Programmer'],
                                ['name' => 'CAD Designer'],
                                ['name' => 'Civil Engineer'],
                                ['name' => 'Design Engineer'],
                                ['name' => 'Draftsman'],
                                ['name' => 'Electrical Design Engineer']
                            ]
                        ],
                    ],
                ],
                [
                    'name' => 'Classifieds',
                    'children' => [
                        [
                            'name' => 'Baby Items',
                            'children' => [
                                ['name' => 'Baby Gear'],
                                ['name' => 'Baby Toys'],
                                ['name' => 'Feeding'],
                                ['name' => 'Nursery Furniture & Accessories'],
                                ['name' => 'Safety & Health'],
                                ['name' => 'Strollers & Car Seats']
                            ]
                        ],
                        [
                            'name' => 'Books',
                            'children' => [
                                ['name' => 'Audiobooks'],
                                ['name' => 'Book Accessories'],
                                ['name' => 'Children\'s Books'],
                                ['name' => 'Digital / EBooks'],
                                ['name' => 'Fiction'],
                                ['name' => 'Nonfiction'],
                                ['name' => 'Textbooks']
                            ]
                        ],
                        [
                            'name' => 'Business & Industrial',
                            'children' => [
                                ['name' => 'Agriculture & Forestry'],
                                ['name' => 'Business for Sale'],
                                ['name' => 'Commercial Printing & Copy Machines'],
                                ['name' => 'Construction'],
                                ['name' => 'Electrical Equipment'],
                                ['name' => 'Food & Beverage'],
                                ['name' => 'Healthcare & Lab'],
                                ['name' => 'Industrial Supplies']
                            ]
                        ]
                    ],
                ],
                [
                    'name' => 'Property for Sale',
                    'children' => [
                        ['name' => 'Apartment for Sale'],
                        ['name' => 'Villa / House for Sale'],
                        ['name' => 'Commercial for Sale'],
                        ['name' => 'Multiple Units for Sale'],
                        ['name' => 'Land for Sale']
                    ],
                ],
                [
                    'name' => 'Property for Rent',
                    'children' => [
                        [
                            'name' => 'Apartment / Flat for Rent',
                            'children' => [
                                ['name' => 'Property for Rent1-1'],
                                ['name' => 'Property for Rent1-2'],
                                ['name' => 'Property for Rent1-3'],
                                ['name' => 'Property for Rent1-4'],
                                ['name' => 'Property for Rent1-5'],
                                ['name' => 'Property for Rent1-6']
                            ]
                        ],
                        [
                            'name' => 'Villa / House for Rent',
                            'children' => [
                                ['name' => 'Property for Rent2-1'],
                                ['name' => 'Property for Rent2-2'],
                                ['name' => 'Property for Rent2-3'],
                                ['name' => 'Property for Rent2-4'],
                                ['name' => 'Property for Rent2-5'],
                                ['name' => 'Property for Rent2-6']
                            ]
                        ],
                        [
                            'name' => 'Commercial for Rent',
                            'children' => [
                                ['name' => 'Property for Rent3-1'],
                                ['name' => 'Property for Rent3-2'],
                                ['name' => 'Property for Rent3-3'],
                                ['name' => 'Property for Rent3-4'],
                                ['name' => 'Property for Rent3-5'],
                                ['name' => 'Property for Rent3-6']
                            ]
                        ]
                    ],
                ],
                [
                    'name' => 'Home & Kitchen',
                    'children' => [
                        [
                            'name' => 'Home & Kitchen1-1-1',
                            'children' => [
                                ['name' => 'Home & Kitchen1-1'],
                                ['name' => 'Home & Kitchen1-2'],
                                ['name' => 'Home & Kitchen1-3'],
                                ['name' => 'Home & Kitchen1-4'],
                                ['name' => 'Home & Kitchen1-5'],
                                ['name' => 'Home & Kitchen1-6'],
                                ['name' => 'Home & Kitchen1-7'],
                            ]
                        ],
                        [
                            'name' => 'Home & Kitchen2-1-1',
                            'children' => [
                                ['name' => 'Home & Kitchen2-1'],
                                ['name' => 'Home & Kitchen2-2'],
                                ['name' => 'Home & Kitchen2-3'],
                                ['name' => 'Home & Kitchen2-4'],
                                ['name' => 'Home & Kitchen2-5'],
                                ['name' => 'Home & Kitchen2-6'],
                            ]
                        ],
                        [
                            'name' => 'Home & Kitchen3-1-1',
                            'children' => [
                                ['name' => 'Home & Kitchen3-1'],
                                ['name' => 'Home & Kitchen3-2'],
                                ['name' => 'Home & Kitchen3-3'],
                                ['name' => 'Home & Kitchen3-4'],
                                ['name' => 'Home & Kitchen3-5'],
                                ['name' => 'Home & Kitchen3-6'],
                                ['name' => 'Home & Kitchen3-7'],
                            ]
                        ],
                    ],
                ],
                [
                    'name' => 'Electronics',
                    'children' => [
                        [
                            'name' => 'Electricals1-1-1',
                            'children' => [
                                ['name' => 'Electrical1-1'],
                                ['name' => 'Electrical1-2'],
                                ['name' => 'Electrical1-3'],
                                ['name' => 'Electrical1-4'],
                                ['name' => 'Electrical1-5'],
                                ['name' => 'Electrical1-6'],
                                ['name' => 'Electrical1-7'],
                            ]
                        ],
                        [
                            'name' => 'Electricals2-1-1',
                            'children' => [
                                ['name' => 'Electrical2-1'],
                                ['name' => 'Electrical2-2'],
                                ['name' => 'Electrical2-3'],
                                ['name' => 'Electrical2-4'],
                                ['name' => 'Electrical2-5'],
                                ['name' => 'Electrical2-6'],
                                ['name' => 'Electrical2-7'],
                                ['name' => 'Electrical2-8'],
                                ['name' => 'Electrical2-9'],
                            ]
                        ],
                        [
                            'name' => 'Electricals3-1-1',
                            'children' => [
                                ['name' => 'Electrical3-1'],
                                ['name' => 'Electrical3-2'],
                                ['name' => 'Electrical3-3'],
                                ['name' => 'Electrical3-4'],
                                ['name' => 'Electrical3-5'],
                                ['name' => 'Electrical3-6'],
                            ]
                        ]
                    ],
                ],
                [
                    'name' => 'Apartments',
                    'children' => [
                        [
                            'name' => 'Apartment1-1-1',
                            'children' => [
                                ['name' => 'Apartment1-1'],
                                ['name' => 'Apartment1-2'],
                                ['name' => 'Apartment1-3'],
                                ['name' => 'Apartment1-4'],
                                ['name' => 'Apartment1-5'],
                                ['name' => 'Apartment1-6'],
                                ['name' => 'Apartment1-8'],
                                ['name' => 'Apartment1-9'],
                                ['name' => 'Apartment1-10'],
                            ]
                        ],
                        [
                            'name' => 'Apartment2-1-1',
                            'children' => [
                                ['name' => 'Apartment2-1'],
                                ['name' => 'Apartment2-2'],
                                ['name' => 'Apartment2-3'],
                                ['name' => 'Apartment2-4'],
                                ['name' => 'Apartment2-5'],
                                ['name' => 'Apartment2-6'],
                            ]
                        ],
                        [
                            'name' => 'Apartment3-1-1',
                            'children' => [
                                ['name' => 'Apartment3-1'],
                                ['name' => 'Apartment3-2'],
                                ['name' => 'Apartment3-3'],
                            ]
                        ]
                    ],
                ],
                [
                    'name' => 'Villas',
                    'children' => [
                        [
                            'name' => 'Villas1-1-1',
                            'children' => [
                                ['name' => 'Villas1-1'],
                                ['name' => 'Villas1-2'],
                                ['name' => 'Villas1-3'],
                                ['name' => 'Villas1-4'],
                            ]
                        ],
                        [
                            'name' => 'Villas2-1-1',
                            'children' => [
                                ['name' => 'Villas2-1'],
                                ['name' => 'Villas2-2'],
                                ['name' => 'Villas2-3'],
                                ['name' => 'Villas2-4'],
                                ['name' => 'Villas2-5'],
                                ['name' => 'Villas2-6'],
                                ['name' => 'Villas2-7'],
                                ['name' => 'Villas2-8'],
                            ]
                        ],
                        [
                            'name' => 'Villas3-1-1',
                            'children' => [
                                ['name' => 'Villas3-1'],
                                ['name' => 'Villas3-2'],
                                ['name' => 'Villas3-3'],
                                ['name' => 'Villas3-4'],
                                ['name' => 'Villas3-5'],
                                ['name' => 'Villas3-6'],
                            ]
                        ],
                    ],
                ],
                [
                    'name' => 'All of Globex',
                    'children' => [
                        [
                            'name' => 'AllofGlobex1-1-1',
                            'children' => [
                                ['name' => 'AllofGlobex1-1'],
                                ['name' => 'AllofGlobex1-2'],
                                ['name' => 'AllofGlobex1-3'],
                                ['name' => 'AllofGlobex1-4'],
                                ['name' => 'AllofGlobex1-5'],
                            ]
                        ],
                        [
                            'name' => 'AllofGlobex2-1-1',
                            'children' => [
                                ['name' => 'AllofGlobex2-1'],
                                ['name' => 'AllofGlobex2-2'],
                                ['name' => 'AllofGlobex2-3'],
                                ['name' => 'AllofGlobex2-4'],
                                ['name' => 'AllofGlobex2-5'],
                            ]
                        ],
                        [
                            'name' => 'AllofGlobex3-1-1',
                            'children' => [
                                ['name' => 'AllofGlobex3-1'],
                                ['name' => 'AllofGlobex3-2'],
                                ['name' => 'AllofGlobex3-3'],
                                ['name' => 'AllofGlobex3-4'],
                                ['name' => 'AllofGlobex3-5'],
                            ]
                        ],
                        [
                            'name' => 'AllofGlobex4-1-1',
                            'children' => [
                                ['name' => 'AllofGlobex4-1'],
                                ['name' => 'AllofGlobex4-2'],
                                ['name' => 'AllofGlobex4-3'],
                                ['name' => 'AllofGlobex4-4'],
                                ['name' => 'AllofGlobex4-5'],
                            ]
                        ],
                        [
                            'name' => 'AllofGlobex5-1-1',
                            'children' => [
                                ['name' => 'AllofGlobex5-1'],
                                ['name' => 'AllofGlobex5-2'],
                                ['name' => 'AllofGlobex5-3'],
                                ['name' => 'AllofGlobex5-4'],
                                ['name' => 'AllofGlobex5-5'],
                            ]
                        ],
                        [
                            'name' => 'AllofGlobex6-1-1',
                            'children' => [
                                ['name' => 'AllofGlobex6-1'],
                                ['name' => 'AllofGlobex6-2'],
                                ['name' => 'AllofGlobex6-3'],
                                ['name' => 'AllofGlobex6-4'],
                                ['name' => 'AllofGlobex6-5'],
                            ]
                        ],
                    ],
                ],
		];
		
		App\Category::buildTree($categories);
		
    }
 
}