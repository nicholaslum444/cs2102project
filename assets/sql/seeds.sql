-------------------- ACCOUNTS --------------------
INSERT INTO account (
    email, 
    username, 
    password_hash,
    role
) VALUES (
    'sammytan@dummy.dum', 
    'sammytan', 
    '$2y$10$A0qCafrS/gA64.93YenH4ORn5ODsfIxEZ9TsOp8NHOsL5qMUB2Us6', -- password is "asd" 
    'USER'
), (
    'jessicalim@dummy.dum',
    'jessicalim',
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
    'ADMIN'
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
),(
    'andysue@dummy.dum',
    'andysue',
    '$2y$10$A0qCafrS/gA64.93YenH4ORn5ODsfIxEZ9TsOp8NHOsL5qMUB2Us6', -- password is "asd"
    'USER'
), (
    'sallyswee@dummy.dum',
    'sallyswee',
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
    'Build cupboard', 
    'Build my ikea cupboard',
    '2016-09-01 08:00:00',
    '2016-09-01 20:00:00',
    1,
    'HANDYMAN',
    43.50,
    '2016-09-01 10:15:00',
    '2016-09-01 10:15:00'
), (
    'Clean Car', 
    'Clean my car for good karma. Satisfaction guaranteed.',
    '2016-09-01 08:05:30',
    '2016-09-02 08:05:00',
    1,
    'CLEANING',
    98.7,
    '2016-09-01 09:05:30',
    '2016-09-01 09:05:30'
), (
    'Sweep Floor', 
    'When your CAP hits the floor, sweep it up together with your future.',
    '2016-09-01 00:15:30',
    '2016-09-03 00:07:00',
    1,
    'CLEANING',
    0.2,
    '2016-09-01 10:15:30',
    '2016-09-01 10:15:30'
), (
    'Walk my dog', 
    'Move my dog',
    '2016-09-02 23:30:36',
    '2016-09-04 00:10:00',
    1,
    'MOVING',
    3.50,
    '2016-09-03 00:30:36',
    '2016-09-03 00:30:36'
), (
    'Data entry', 
    'Many excel files to fill up',
    '2016-09-03 08:30:33',
    '2016-09-05 18:30:00',
    2,
    'HANDYMAN',
    450,
    '2016-09-03 10:27:12',
    '2016-09-03 10:27:12'
), (
    'Fix the toilet', 
    'Toilet are like waterfall now !',
    '2016-09-06 15:30:36',
    '2016-09-09 19:30:00',
    4,
    'HANDYMAN',
    100,
    '2016-09-06 20:30:17',
    '2016-09-06 20:30:17'
),(
    'Door lock change to Digital Lock', 
    'Time to add on something for security purpose',
    '2016-09-07 13:27:16',
    '2016-09-10 00:00:00',
    4,
    'HANDYMAN',
    500,
    '2016-09-07 23:27:15',
    '2016-09-07 23:27:15'
),(
    'Help me move my furniture please ~', 
    'I need to move 10 beds !',
    '2016-09-08 10:15:53',
    '2016-09-13 23:00:00',
    5,
    'MOVING',
    50,
    '2016-09-08 15:12:13',
    '2016-09-08 15:12:13'
),(
    'Move office stuff', 
    'Changing to a bigger office',
    '2016-09-08 10:16:00',
    '2016-09-13 23:02:00',
    5,
    'MOVING',
    200,
    '2016-09-08 16:16:15',
    '2016-09-08 16:16:15'
),(
    'Wash my 3 FERRARI', 
    'Make it shine thanks!',
    '2016-09-14 08:15:11',
    '2016-09-20 00:00:00',
    6,
    'CLEANING',
    800,
    '2016-09-14 10:15:16',
    '2016-09-14 10:15:16'
),(
    'Clean my house for me', 
    'Like a haunted house now omg',
    '2016-09-14 15:23:54',
    '2016-09-30 18:30:00',
    6,
    'CLEANING',
    400,
    '2016-09-14 18:20:55',
    '2016-09-14 18:20:55'
),(
    'buy me food !', 
    'MCDONALD',
    '2016-09-14 12:23:15',
    '2016-09-14 15:23:00',
    7,
    'DELIVERY',
    10,
    '2016-09-14 13:23:56',
    '2016-09-14 13:23:56'
),(
    'Deliver Hai Di Lao', 
    'I want the freshest !',
    '2016-09-16 12:20:17',
    '2016-09-17 23:20:00',
    7,
    'DELIVERY',
    100,
    '2016-09-16 20:08:22',
    '2016-09-16 20:08:22'
), (
    'My antique Chair is SPOIL, please fix!', 
    'MUST Fix it',
    '2016-09-05 11:18:11',
    '2016-09-11 00:00:00',
    8,
    'HANDYMAN',
    90,
    '2016-09-05 12:45:24',
    '2016-09-05 12:45:24'
),(
    'Light bulb SPOIL', 
    'Need more light in my life -.-',
    '2016-09-17 16:48:52',
    '2016-09-20 12:00:00',
    8,
    'HANDYMAN',
    20,
    '2016-09-18 00:45:56',
    '2016-09-18 00:45:56'
),(
    'Migrating YAY, all furniture OUT!', 
    'I need to get out of SG!',
    '2016-09-18 00:45:56',
    '2016-10-18 00:00:00',
    9,
    'MOVING',
    500,
    '2016-09-30 23:36:22',
    '2016-09-30 23:36:22'
),(
    'Change of house', 
    'Changing to a condo',
    '2016-09-23 09:45:56',
    '2016-09-25 22:00:00',
    9,
    'MOVING',
    200,
    '2016-09-23 12:33:38',
    '2016-09-25 12:33:38'
),(
    'Shower my 10 doggy', 
    'Make them smell nice THANKS !',
    '2016-09-26 08:15:38',
    '2016-09-26 20:30:38',
    10,
    'CLEANING',
    80,
    '2016-09-26 09:17:25',
    '2016-09-26 09:17:25'
),(
    'Cats need shower too', 
    'They might scratch, OUCH',
    '2016-09-27 13:22:17',
    '2016-09-29 21:30:00',
    10,
    'CLEANING',
    40,
    '2016-09-27 15:59:11',
    '2016-09-27 15:59:11'
),(
    'I am dying of HUNGER !', 
    'ANYTHING',
    '2016-09-30 08:00:33',
    '2016-09-30 10:00:00',
    11,
    'DELIVERY',
    20,
    '2016-09-30 08:10:55',
    '2016-09-30 08:10:55'
),(
    'Clothes needed !', 
    'I need a super atas dress',
    '2016-10-01 14:22:33',
    '2016-10-05 20:30:00',
    11,
    'DELIVERY',
    100,
    '2016-10-01 21:22:54',
    '2016-09-30 21:22:54'
),(
    'Wash all the car in SOC', 
    'make it blink !',
    '2016-10-01 14:23:54',
    '2016-10-08 00:00:00',
    12,
    'CLEANING',
    20,
    '2016-10-02 00:15:18',
    '2016-10-02 00:15:18'
),(
    'Polish my F1 Cars', 
    'Make sure i can see my teeth',
    '2016-10-03 00:34:51',
    '2016-10-07 23:00:00',
    12,
    'CLEANING',
    100,
    '2016-10-03 15:23:43',
    '2016-10-03 15:23:43'
),(
    'Fix the F1 cars', 
    'Make it FLY !',
    '2016-10-09 08:24:56',
    '2016-11-10 00:00:00',
    13,
    'HANDYMAN',
    200,
    '2016-10-15 07:55:13',
    '2016-10-15 07:55:13'
),(
    'Jack a cars', 
    'Jack up some cars!',
    '2016-10-09 08:24:56',
    '2016-11-10 00:00:00',
    13,
    'HANDYMAN',
    200,
    '2016-10-15 07:55:13',
    '2016-10-15 07:55:13'
),(
    'Fix my sofa', 
    'GOT A HOLE',
    '2016-10-17 17:11:43',
    '2016-10-30 22:00:00',
    13,
    'HANDYMAN',
    50,
    '2016-10-18 00:54:22',
    '2016-10-18 00:54:22'
),(
    'WASH MY NEW HOUSE', 
    'Make it bling bling',
    '2016-11-08 10:25:56',
    '2016-11-12 00:46:00',
    14,
    'CLEANING',
    180,
    '2016-10-30 07:55:13',
    '2016-10-30 07:55:13'
),(
    'VACUUM MY DOGGY HOUSE', 
    'MAKE SURE ITS DUST FREE !',
    '2016-11-08 17:11:43',
    '2016-11-11 22:00:00',
    14,
    'CLEANING',
    58,
    '2016-10-30 00:54:22',
    '2016-10-30 00:54:22'
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
),
--end of alvinloo offers--

--add on johntan offer 2 more for 2 default user--
( 
    1,
    1,
    20
),(
    2,
    5,
    300
),
--add on jackng offer 2 more for 2 default user--
( 
    1,
    1,
    20
),(
    2,
    5,
    300
),
--add on of sallyswee and marysue offers--
( 
    12,
    27,
    48
),(
    15,
    27,
    90
),( 
    4,
    28,
    22
),(
    15,
    28,
    34
);
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
    '2016-09-01 09:05:30',
    '2016-09-01 09:05:30',
    'ONGOING'
),
--Start of all rounded maid number 1 (marysue) contract--
(
    4,
    12,
    6,
    6,
    '2016-09-06 20:30:17',
    '2016-09-06 20:30:17',
    'ONGOING'
),(
    5,
    12,
    8,
    7,
   
    '2016-09-08 15:12:13',
    '2016-09-08 15:12:13',
    'ONGOING'
),(
    6,
    12,
    10,
    8,
    '2016-09-14 10:15:16',
    '2016-09-14 10:15:16',
    'ONGOING'
),(
    7,
    12,
    12,
    9,
    '2016-09-14 13:23:56',
    '2016-09-14 13:23:56',
    'ONGOING'
),
--end of marysue contract--

--Start of all rounded maid number 2 (sharontoh) contract--
(
    8,
    13,
    14,
    10,
    '2016-09-05 12:45:24',
    '2016-09-05 12:45:24',
    'ONGOING'
),(
    9,
    13,
    16,
    11,
    '2016-09-30 23:36:22',
    '2016-09-30 23:36:22',
    'ONGOING'
),(
    10,
    13,
    18,
    12,
    '2016-09-26 09:17:25',
    '2016-09-26 09:17:25',
    'ONGOING'
),(
    11,
    13,
    20,
    13,
    '2016-09-30 08:10:55',
    '2016-09-30 08:10:55',
    'ONGOING'
),
--end of sharontoh contract--

--Start of at least one maid number 1 (johntan) contract--
(
    5,
    4,
    8,
    14,
    '2016-09-08 15:12:13',
    '2016-09-08 15:12:13',
    'ONGOING'
),(
    6,
    4,
    10,
    15,    
    '2016-09-14 10:15:16',
    '2016-09-14 10:15:16',
    'ONGOING'
),(
    7,
    4,
    12,
    16,
    '2016-09-14 13:23:56',
    '2016-09-14 13:23:56',
    'ONGOING'
),(
    8,
    4,
    14,
    17, 
    '2016-09-05 12:45:24',
    '2016-09-05 12:45:24',
    'ONGOING'
),(
    9,
    4,
    16,
    18,
    '2016-09-30 23:36:22',
    '2016-09-30 23:36:22',
    'ONGOING'
),(
    10,
    4,
    18,
    19,
    '2016-09-26 09:17:25',
    '2016-09-26 09:17:25',
    'ONGOING'
),(
    11,
    4,
    20,
    20,
    '2016-09-30 08:10:55',
    '2016-09-30 08:10:55',
    'ONGOING'
),(
    12,
    4,
    22,
    21, 
    '2016-10-02 00:15:18',
    '2016-10-02 00:15:18',
    'ONGOING'
),(
    13,
    4,
    24,
    22,
    '2016-10-15 07:55:13',
    '2016-10-15 07:55:13',
    'ONGOING'
),
--end of johntan contract--

--Start of at least one maid number 2 (jackng) contract--
(
    4,
    5,
    7,
    23,
    '2016-09-07 23:27:15',
    '2016-09-07 23:27:15',

    'ONGOING'
),(
    6,
    5,
    11,
    24,
    '2016-09-14 18:20:55',
    '2016-09-14 18:20:55',
    'ONGOING'
),(
    7,
    5,
    13,
    25,
    '2016-09-16 20:08:22',
    '2016-09-16 20:08:22',
    'ONGOING'
),(
    8,
    5,
    15,
    26,
    '2016-09-18 00:45:56',
    '2016-09-18 00:45:56',
    'ONGOING'
),(
    9,
    5,
    17,
    27,
    '2016-09-23 12:33:38',
    '2016-09-25 12:33:38',
    'ONGOING'
),(
    10,
    5,
    19,
    28,
    '2016-09-27 15:59:11',
    '2016-09-27 15:59:11',
    'ONGOING'
),(
    11,
    5,
    21,
    29,
    '2016-10-01 21:22:54',
    '2016-09-30 21:22:54',
    'ONGOING'
),(
    12,
    5,
    23,
    30,
    '2016-10-03 15:23:43',
    '2016-10-03 15:23:43',
    'ONGOING'
),(
    13,
    5,
    25,
    31,
    '2016-10-18 00:54:22',
    '2016-10-18 00:54:22',
    'ONGOING'
),
--end of jackng contract--

--start of offer 10 get 1 maid number 1 (petersee)--
(
    4,
    6,
    6,
    32, 
    '2016-09-06 20:30:17',
    '2016-09-06 20:30:17',
    'ONGOING'
),
--end of petersee contract--

--start of offer 10 get 1 maid number 2 (alvinloo)--
(
    4,
    7,
    7,
    42,
    '2016-09-07 23:27:15',
    '2016-09-07 23:27:15',
    'ONGOING'
),
--end of alvinloo contract--

--add on 2 contract for johntan--
(
    1,
    4,
    1,
    52,
    '2016-09-01 10:15:00',
    '2016-09-01 10:15:00',
    'ONGOING'
),(
    2,
    4,
    5,
    53,
    '2016-09-03 10:27:12',
    '2016-09-03 10:27:12',
    'ONGOING'
),

--add on 2 contract for jackng--
(
    1,
    5,
    1,
    54,
    '2016-09-01 10:15:00',
    '2016-09-01 10:15:00',
    'ONGOING'
),(
    2,
    5,
    5,
    55,
    '2016-09-03 10:27:12',
    '2016-09-03 10:27:12',
    'ONGOING'
),
--end of add on contract--
(
    14,
    15,
    27,
    56,
    '2016-11-08 11:00:12',
    '2016-11-12 12:45:12',
    'ONGOING'
);

------------------ ENDCONTRACTS -----------------