-------------------- ACCOUNTS --------------------
INSERT INTO account (
    email, 
    username, 
    password_hash,
    role
) VALUES (
    'admin@admin.asd',
    'admin',
    '$2y$10$PfriHQjK7cQnj98IIpmf0eoo4yEiVxfwMO9wNjaVbtaKP9lTPcjm6', -- password is "admin"
    'ADMIN'
), (
    'jessicalim@dummy.dum',
    'jessicalim',
    '$2y$10$A0qCafrS/gA64.93YenH4ORn5ODsfIxEZ9TsOp8NHOsL5qMUB2Us6', -- password is "asd"
    'USER'
), (
    'sammytan@dummy.dum', 
    'sammytan', 
    '$2y$10$A0qCafrS/gA64.93YenH4ORn5ODsfIxEZ9TsOp8NHOsL5qMUB2Us6', -- password is "asd" 
    'USER'
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
-- Create category:CLEANING tasks; Created by user_id 2 --
-- task 1--
    'Cleaning something', 
    'Wash clothes',
    '2016-09-01 08:00:00',
    '2016-09-01 20:00:00',
    2,
    'CLEANING',
    43.50,
    '2016-09-01 10:15:00',
    '2016-09-01 10:15:00'
), (
    'Clean Car', 
    'Clean my car for good karma. Satisfaction guaranteed.',
    '2016-09-01 08:05:30',
    '2016-09-02 08:05:00',
    2,
    'CLEANING',
    98.7,
    '2016-09-01 09:05:30',
    '2016-09-01 09:05:30'
), (
    'Sweep Floor', 
    'Use a dry mop',
    '2016-09-01 00:15:30',
    '2016-09-03 00:07:00',
    2,
    'CLEANING',
    0.2,
    '2016-09-01 10:15:30',
    '2016-09-01 10:15:30'
), (
    'Wipe screens', 
    'Wipe laptop screen',
    '2016-09-02 23:30:36',
    '2016-09-04 00:10:00',
    2,
    'CLEANING',
    3.50,
    '2016-09-03 00:30:36',
    '2016-09-03 00:30:36'
), (
-- Create category:DELIVERY tasks; Created by user_id 5; --
-- task 5 --
    'Deliver pizzas', 
    'During national day, 6pm to 12am. Will be compensated well',
    '2016-08-09 18:00:00',
    '2016-08-10 00:00:00',
    5,
    'DELIVERY',
    20.50,
    '2016-09-03 00:30:36',
    '2016-09-03 00:30:36'
), (
    'Fetch my child', 
    'During children day. Raffles Primary',
    '2016-09-02 23:30:36',
    '2016-09-04 00:10:00',
    5,
    'DELIVERY',
    5.0,
    '2016-09-03 00:30:36',
    '2016-09-03 00:30:36'
);


------------------- ENDTASKS --------------------

-------------------- OFFER -----------------------
INSERT INTO offer (
    acceptee_id,
    task_id,
    price
) VALUES (
--acceptee_id: 3, accepts creator_id: 2; tasks--
--offered all cleaning tasks--
    3,
    1,
    20000000.00000
), (
    3, 
    2, 
    1985.50
), (
    3,
    3,
    10
), (
--acceptee_id: 4, accepts creator_id: 2; tasks--
--offered all cleaning tasks--
    4,
    1,
    15
), (
    4,
    2,
    15
), (
    4,
    3,
    15
), (
--acceptee_id: 6, accepts creator_id: 5; tasks--
--offered all delivery tasks--
    5,
    5,
    22
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
    2,
    4,
    1,
    4,
    '2016-10-01 09:05:30',
    '2016-10-01 09:05:30',
    'ONGOING'
);

UPDATE task
SET is_accepted = 1
WHERE id = 1;
------------------ ENDCONTRACTS -----------------