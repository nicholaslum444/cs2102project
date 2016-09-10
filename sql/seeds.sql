-------------------- PERSONS --------------------
INSERT INTO person (email, password_hash) VALUES
    ('Tampopo@live.com', '1985-02-10Comedy'),
    ('HG120@mail.com', 'The Dinner GameComedy');

-------------------- TASKS --------------------
INSERT INTO task (
    title, 
    description,
    start_datetime,
    end_datetime,
    creator_id,
    workers_needed,
    price,
    created_datetime,
    last_updated_datetime
) VALUES (
    'Clean Car', 
    'Clean my car for good karma. Satisfaction guaranteed.',
    now(),
    now(),
    1,
    1,
    10,
    now(),
    now()
);

INSERT INTO task (
    title, 
    description,
    start_datetime,
    end_datetime,
    creator_id,
    workers_needed,
    price,
    created_datetime,
    last_updated_datetime
) VALUES (
    'Sweep Floor', 
    'When your CAP hits the floor, sweep it up together with your future.',
    now(),
    now(),
    1,
    1,
    10,
    now(),
    now()
);

-------------------- CONTRACTS --------------------
INSERT INTO contract (
	creator_id,
	task_id,
	start_datetime,
	end_datetime,
	accepted_conditions,
	status
) VALUES (
	1,
	1,
	now(),
	now(),
	TRUE,
	'pending'
);
-------------------- ENDTASKS -----------------