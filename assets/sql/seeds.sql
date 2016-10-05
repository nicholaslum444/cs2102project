-------------------- PERSONS --------------------
INSERT INTO person (
    email, 
    username, 
    password_hash
) VALUES (
    'asd@asd.asd', 
    'asd', 
    '$2y$10$A0qCafrS/gA64.93YenH4ORn5ODsfIxEZ9TsOp8NHOsL5qMUB2Us6' -- password is "asd" 
), (
    'qwe@qwe.qwe',
    'qwe',
    '$2y$10$3mSKzPDzzGSL7hHBxYR6pufyx/YGtd3vQb9qRLGtIwY/cBnmhBCzK' -- password is "qwe"
);
------------------ ENDPERSONS ------------------

-------------------- TASKS --------------------
INSERT INTO task (
    title, 
    description,
    start_datetime,
    end_datetime,
    creator_id,
    created_datetime,
    last_updated_datetime
) VALUES (
    'Important announcement. LETS SEE IF YOU NOTICE THIS', 
    'Maximum offer price is limited to 1000 in db. So try anything funny and it will fail.',
    now(),
    now(),
    1,
    now(),
    now()
);

INSERT INTO task (
    title, 
    description,
    start_datetime,
    end_datetime,
    creator_id,
    created_datetime,
    last_updated_datetime
) VALUES (
    'Clean Car', 
    'Clean my car for good karma. Satisfaction guaranteed.',
    now(),
    now(),
    1,
    now(),
    now()
);

INSERT INTO task (
    title, 
    description,
    start_datetime,
    end_datetime,
    creator_id,
    created_datetime,
    last_updated_datetime
) VALUES (
    'Sweep Floor', 
    'When your CAP hits the floor, sweep it up together with your future.',
    now(),
    now(),
    1,
    now(),
    now()
);

INSERT INTO task (
    title, 
    description,
    start_datetime,
    end_datetime,
    creator_id,
    created_datetime,
    last_updated_datetime
) VALUES (
    'Fail your midterms?', 
    'No worries! Just cry and try harder next time ;)',
    now(),
    now(),
    1,
    now(),
    now()
);

INSERT INTO task (
    title, 
    description,
    start_datetime,
    end_datetime,
    creator_id,
    created_datetime,
    last_updated_datetime
) VALUES (
    'Try and Try and Cry and Cry', 
    'Crying and trying and bleeding and dying. For user 2',
    now(),
    now(),
    2,
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
    20
);
-------------------- ENDOFFER -----------------------

-------------------- CONTRACTS --------------------
INSERT INTO contract (
	offer_id,
    created_datetime,
    last_updated_datetime,
    accepted_conditions,
    status
) VALUES (
	1,
	now(),
	now(),
	TRUE,
	'ongoing'
);
------------------ ENDCONTRACTS -----------------