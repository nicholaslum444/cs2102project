-------------------- ACCOUNTS --------------------
INSERT INTO account (
    email, 
    username, 
    password_hash,
    role
) VALUES (
    'asd@asd.asd', 
    'asd', 
    '$2y$10$A0qCafrS/gA64.93YenH4ORn5ODsfIxEZ9TsOp8NHOsL5qMUB2Us6', -- password is "asd" 
    'USER'
), (
    'qwe@qwe.qwe',
    'qwe',
    '$2y$10$3mSKzPDzzGSL7hHBxYR6pufyx/YGtd3vQb9qRLGtIwY/cBnmhBCzK', -- password is "qwe"
    'USER'
), (
    'admin@admin.asd',
    'admin',
    '$2y$10$PfriHQjK7cQnj98IIpmf0eoo4yEiVxfwMO9wNjaVbtaKP9lTPcjm6', -- password is "admin"
    'ADMIN'
), (
    'johntan@dummy.dum',
    'johntan',
    '$2y$10$A0qCafrS/gA64.93YenH4ORn5ODsfIxEZ9TsOp8NHOsL5qMUB2Us6', -- password is "asd"
    'USER'
), (
    'jackng@dummy.dum',
    'jackng',
    '$2y$10$A0qCafrS/gA64.93YenH4ORn5ODsfIxEZ9TsOp8NHOsL5qMUB2Us6', -- password is "asd"
    'USER'
), (
    'petersee@dummy.dum',
    'petersee',
    '$2y$10$A0qCafrS/gA64.93YenH4ORn5ODsfIxEZ9TsOp8NHOsL5qMUB2Us6', -- password is "asd"
    'USER'
), (
    'alvinloo@dummy.dum',
    'alvinloo',
    '$2y$10$A0qCafrS/gA64.93YenH4ORn5ODsfIxEZ9TsOp8NHOsL5qMUB2Us6', -- password is "asd"
    'USER'
), (
    'benlim@dummy.dum',
    'benlim',
    '$2y$10$A0qCafrS/gA64.93YenH4ORn5ODsfIxEZ9TsOp8NHOsL5qMUB2Us6', -- password is "asd"
    'USER'
), (
    'cherryyeo@dummy.dum',
    'cherryyeo',
    '$2y$10$A0qCafrS/gA64.93YenH4ORn5ODsfIxEZ9TsOp8NHOsL5qMUB2Us6', -- password is "asd"
    'USER'
), (
    'janeong@dummy.dum',
    'janeong',
    '$2y$10$A0qCafrS/gA64.93YenH4ORn5ODsfIxEZ9TsOp8NHOsL5qMUB2Us6', -- password is "asd"
    'USER'
), (
    'claricelee@dummy.dum',
    'claricelee',
    '$2y$10$A0qCafrS/gA64.93YenH4ORn5ODsfIxEZ9TsOp8NHOsL5qMUB2Us6', -- password is "asd"
    'USER'
), (
    'marysue@dummy.dum',
    'marysue',
    '$2y$10$A0qCafrS/gA64.93YenH4ORn5ODsfIxEZ9TsOp8NHOsL5qMUB2Us6', -- password is "asd"
    'USER'
), (
    'sharontoh@dummy.dum',
    'sharontoh',
    '$2y$10$A0qCafrS/gA64.93YenH4ORn5ODsfIxEZ9TsOp8NHOsL5qMUB2Us6', -- password is "asd"
    'USER'
);
------------------ ENDACCOUNTS ------------------

-------------------- TASKS --------------------
INSERT INTO task (
    title, 
    description,
    start_datetime,
    end_datetime,
    creator_id,
    category,
    price,
    created_datetime,
    last_updated_datetime
) VALUES (
    'Hey admin', 
    'Create more user accounts please',
    now(),
    now(),
    1,
    'HANDYMAN',
    43.50,
    now(),
    now()
), (
    'Clean Car', 
    'Clean my car for good karma. Satisfaction guaranteed.',
    now(),
    now(),
    1,
    'CLEANING',
    98.7,
    now(),
    now()
), (
    'Sweep Floor', 
    'When your CAP hits the floor, sweep it up together with your future.',
    now(),
    now(),
    1,
    'CLEANING',
    0.2,
    now(),
    now()
), (
    'Fail your midterms?', 
    'No worries! Just cry and try harder next time ;)',
    now(),
    now(),
    1,
    'MOVING',
    3.50,
    now(),
    now()
), (
    'Try and Try and Cry and Cry', 
    'Crying and trying and bleeding and dying. For user 2',
    now(),
    now(),
    2,
    'DELIVERY',
    450,
    now(),
    now()
), (
    'Fix the toilet', 
    'Toilet are like waterfall now !',
    now(),
    now(),
    4,
    'HANDYMAN',
    100,
    now(),
    now()
),(
    'Door lock change to Digital Lock', 
    'Time to add on something for security purpose',
    now(),
    now(),
    4,
    'HANDYMAN',
    500,
    now(),
    now()
),(
    'Help me move my furniture please ~', 
    'I need to move 10 beds !',
    now(),
    now(),
    5,
    'MOVING',
    50,
    now(),
    now()
),(
    'Move office stuff', 
    'Changing to a bigger office',
    now(),
    now(),
    5,
    'MOVING',
    200,
    now(),
    now()
),(
    'Wash my 3 FERRARI', 
    'Make it shine thanks!',
    now(),
    now(),
    6,
    'CLEANING',
    800,
    now(),
    now()
),(
    'Clean my house for me', 
    'Like a haunted house now omg',
    now(),
    now(),
    6,
    'CLEANING',
    400,
    now(),
    now()
),(
    'buy me food !', 
    'MCDONALD',
    now(),
    now(),
    7,
    'DELIVERY',
    10,
    now(),
    now()
),(
    'Hai Di Lao', 
    'I want the freshest !',
    now(),
    now(),
    7,
    'DELIVERY',
    100,
    now(),
    now()
), (
    'My antique Chair is SPOIL !', 
    'MUST Fix it',
    now(),
    now(),
    8,
    'HANDYMAN',
    90,
    now(),
    now()
),(
    'Light bulb SPOIL', 
    'Need more light in my life -.-',
    now(),
    now(),
    8,
    'HANDYMAN',
    20,
    now(),
    now()
),(
    'Migrating YAY, all furniture OUT!', 
    'I need to get out of SG!',
    now(),
    now(),
    9,
    'MOVING',
    500,
    now(),
    now()
),(
    'Change of house', 
    'Changing to a condo',
    now(),
    now(),
    9,
    'MOVING',
    200,
    now(),
    now()
),(
    'Shower my 10 doggy', 
    'Make them smell nice THANKS !',
    now(),
    now(),
    10,
    'CLEANING',
    80,
    now(),
    now()
),(
    'Cats need shower too', 
    'They might scratch, OUCH',
    now(),
    now(),
    10,
    'CLEANING',
    40,
    now(),
    now()
),(
    'I am dying of HUNGER !', 
    'ANYTHING',
    now(),
    now(),
    11,
    'DELIVERY',
    20,
    now(),
    now()
),(
    'Clothes needed !', 
    'I need a super atas dress',
    now(),
    now(),
    11,
    'DELIVERY',
    100,
    now(),
    now()
),(
    'Wash all the car in SOC', 
    'make it blink !',
    now(),
    now(),
    12,
    'CLEANING',
    20,
    now(),
    now()
),(
    'F1 Cars', 
    'Make sure i can see my teeth',
    now(),
    now(),
    12,
    'CLEANING',
    100,
    now(),
    now()
),(
    'Fix the F1 cars', 
    'Make it FLY !',
    now(),
    now(),
    13,
    'HANDYMAN',
    200,
    now(),
    now()
),(
    'Fix my sofa', 
    'GOT A HOLE',
    now(),
    now(),
    13,
    'HANDYMAN',
    50,
    now(),
    now()
);



------------------- ENDTASKS --------------------

-------------------- OFFER -----------------------
INSERT INTO offer (
    acceptee_id,
    task_id,
    price
) VALUES (
    2,
    1,
    20000000.00000
), (
    2, 
    2, 
    1985.50
), (
    2,
    3,
    10
), (
    2,
    3,
    11
), (
    2,
    3,
    12
),
--start of all rounded maid number 1 (marysue) offers--
(   
    12,
    6,
    100
),(
    12,
    8,
    50
),(
    12,
    10,
    800
),(
    12,
    12,
    10
),
--end of marysue offers--

--start of all rounded maid number 2 (sharontoh) offers--
(   
    13,
    14,
    90
),(
    13,
    16,
    500
),(
    13,
    18,
    80
),(
    13,
    20,
    10
),
--end of sharontoh offers--

--start of at least one maid number 1 (johntan) offers--
(   
    4,
    8,
    450
),(
    4,
    10,
    120
),(
    4,
    12,
    10.90
),(
    4,
    14,
    220
),( 
    4,
    16,
    500
),(
    4,
    18,
    250
),(
    4,
    20,
    9.9
),(
    4,
    22,
    90
),( 
    4,
    24,
    202
),
--end of johntan offers--

--start of at least one maid number 2 (jackng) offers--
(   
    5,
    7,
    140
),(
    5,
    11,
    120
),(
    5,
    13,
    10.90
),(
    5,
    15,
    220.50
),( 
    5,
    17,
    508
),(
    5,
    19,
    270
),(
    5,
    21,
    10.9
),(
    5,
    23,
    89
),( 
    5,
    25,
    230
),
--end of jackng offers--

--start of offer 10 get 1 contract maid number 1 (petersee) offers--
(   
    6,
    6,
    450
),(
    6,
    8,
    120
),(
    6,
    12,
    10.90
),(
    6,
    14,
    220
),( 
    6,
    16,
    500
),(
    6,
    18,
    250
),(
    6,
    20,
    9.9
),(
    6,
    22,
    90
),( 
    6,
    24,
    202
),(
    6,
    25,
    400
),
--end of petersee offers--

--start of offer 10 get 1 contract maid number 2 (alvinloo) offers--
(   
    7,
    7,
    140
),(
    7,
    9,
    120
),(
    7,
    11,
    10.90
),(
    7,
    15,
    220.50
),(
    7,
    17,
    508
),(
    7,
    19,
    270
),(
    7,
    21,
    10.9
),(
    7,
    23,
    89
),( 
    7,
    25,
    230
),(
    7,
    24,
    300
);
--end of alvinloo offers--
-------------------- ENDOFFER -----------------------

-------------------- CONTRACTS --------------------
INSERT INTO contract (
    employer_id,
    employee_id,
    task_id,
    offer_id,
    created_datetime,
    last_updated_datetime,
    completion_status
) VALUES (
    3,
    1,
    2,
    3,
    now(),
    now(),
    'ONGOING'
),
--Start of all rounded maid number 1 (marysue) contract--
(
    4,
    12,
    6,
    6,
    now(),
    now(),
    'ONGOING'
),(
    5,
    12,
    8,
    7,
    now(),
    now(),
    'ONGOING'
),(
    6,
    12,
    10,
    8,
    now(),
    now(),
    'ONGOING'
),(
    7,
    12,
    12,
    9,
    now(),
    now(),
    'ONGOING'
),
--end of marysue contract--

--Start of all rounded maid number 2 (sharontoh) contract--
(
    8,
    13,
    14,
    10,
    now(),
    now(),
    'ONGOING'
),(
    9,
    13,
    16,
    11,
    now(),
    now(),
    'ONGOING'
),(
    10,
    13,
    18,
    12,
    now(),
    now(),
    'ONGOING'
),(
    11,
    13,
    20,
    13,
    now(),
    now(),
    'ONGOING'
),
--end of sharontoh contract--

--Start of at least one maid number 1 (johntan) contract--
(
    5,
    4,
    8,
    14,
    now(),
    now(),
    'ONGOING'
),(
    6,
    4,
    10,
    15,
    now(),
    now(),
    'ONGOING'
),(
    7,
    4,
    12,
    16,
    now(),
    now(),
    'ONGOING'
),(
    8,
    4,
    14,
    17,
    now(),
    now(),
    'ONGOING'
),(
    9,
    4,
    16,
    18,
    now(),
    now(),
    'ONGOING'
),(
    10,
    4,
    18,
    19,
    now(),
    now(),
    'ONGOING'
),(
    11,
    4,
    20,
    20,
    now(),
    now(),
    'ONGOING'
),(
    12,
    4,
    22,
    21,
    now(),
    now(),
    'ONGOING'
),(
    13,
    4,
    24,
    22,
    now(),
    now(),
    'ONGOING'
),
--end of johntan contract--

--Start of at least one maid number 2 (jackng) contract--
(
    4,
    5,
    7,
    23,
    now(),
    now(),
    'ONGOING'
),(
    6,
    5,
    11,
    24,
    now(),
    now(),
    'ONGOING'
),(
    7,
    5,
    13,
    25,
    now(),
    now(),
    'ONGOING'
),(
    8,
    5,
    15,
    26,
    now(),
    now(),
    'ONGOING'
),(
    9,
    5,
    17,
    27,
    now(),
    now(),
    'ONGOING'
),(
    10,
    5,
    19,
    28,
    now(),
    now(),
    'ONGOING'
),(
    11,
    5,
    21,
    29,
    now(),
    now(),
    'ONGOING'
),(
    12,
    5,
    23,
    30,
    now(),
    now(),
    'ONGOING'
),(
    13,
    5,
    25,
    31,
    now(),
    now(),
    'ONGOING'
),
--end of jackng contract--

--start of offer 10 get 1 maid number 1 (petersee)--
(
    4,
    6,
    6,
    32,
    now(),
    now(),
    'ONGOING'
),
--end of petersee contract--

--start of offer 10 get 1 maid number 2 (alvinloo)--
(
    4,
    7,
    7,
    42,
    now(),
    now(),
    'ONGOING'
);
--end of alvinloo contract--
------------------ ENDCONTRACTS -----------------