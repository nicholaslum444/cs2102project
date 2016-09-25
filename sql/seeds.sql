-------------------- PERSONS --------------------
INSERT INTO person (email, username, password_hash) VALUES
    ('Tampopo@live.com', 'gary', '1985-02-10Comedy'),
    ('HG120@mail.com', 'jihyo', 'The Dinner GameComedy');

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
-------------------- ENDTASKS -----------------