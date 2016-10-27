DROP TABLE IF EXISTS account CASCADE;
DROP TABLE IF EXISTS task CASCADE;
DROP TABLE IF EXISTS offer CASCADE;
DROP TABLE IF EXISTS contract CASCADE;

DROP TYPE IF EXISTS role_type CASCADE;
DROP TYPE IF EXISTS status_type;
DROP TYPE IF EXISTS category_type;

-- ENUMS --
CREATE TYPE category_type AS ENUM (
    'DELIVERY',
    'CLEANING',
    'HANDYMAN',
    'MOVING'
);

CREATE TYPE status_type AS ENUM (
    'PENDING', 
    'ONGOING', 
    'COMPLETED', 
    'CANCELLED'
);

CREATE TYPE role_type AS ENUM (
    'ADMIN',
    'USER'
);
-- END ENUMS --

-- ACCOUNT AND ROLE --
CREATE TABLE IF NOT EXISTS account (
    id SERIAL NOT NULL,
    email VARCHAR(256) NOT NULL,
    username VARCHAR(256) NOT NULL,
    password_hash VARCHAR(256) NOT NULL,
    role role_type NOT NULL,
    PRIMARY KEY (id)
);
-- END ACCOUNT AND ROLE --

-- TASKS, OFFERS AND CONTRACTS --
CREATE TABLE IF NOT EXISTS task (
    id SERIAL NOT NULL,
    title VARCHAR(512) NOT NULL,
    description TEXT,
    start_datetime TIMESTAMP NOT NULL,
    end_datetime TIMESTAMP NOT NULL CHECK (end_datetime >= start_datetime),
    creator_id INTEGER NOT NULL,
    category category_type NOT NULL,
    price NUMERIC(1000, 2) CHECK (price > 0),
    is_accepted INTEGER NOT NULL DEFAULT 0,
    created_datetime TIMESTAMP NOT NULL,
    last_updated_datetime TIMESTAMP NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (creator_id) REFERENCES account(id) 
        ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS offer (
    id SERIAL NOT NULL,
    acceptee_id INTEGER NOT NULL,
    task_id INTEGER NOT NULL,
    price NUMERIC(1000, 2) CHECK (price > 0),
    PRIMARY KEY (id),
    FOREIGN KEY (acceptee_id) REFERENCES account(id)
        ON DELETE CASCADE,
    FOREIGN KEY (task_id) REFERENCES task(id)
        ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS contract ( 
    id SERIAL NOT NULL,
	employer_id SERIAL NOT NULL,
	employee_id SERIAL NOT NULL,
	task_id SERIAL NOT NULL,
    offer_id INTEGER NOT NULL,
    created_datetime TIMESTAMP NOT NULL,
    last_updated_datetime TIMESTAMP NOT NULL,
    completion_status status_type NOT NULL,
    PRIMARY KEY (id),
	FOREIGN KEY (task_id) REFERENCES task(id)
		ON DELETE CASCADE,
	FOREIGN KEY (employer_id) REFERENCES account(id)
		ON DELETE CASCADE,
	FOREIGN KEY (employee_id) REFERENCES account(id)
		ON DELETE CASCADE,	
    FOREIGN KEY (offer_id) REFERENCES offer(id)
        ON DELETE CASCADE
);
-- END TASKS, OFFERS AND CONTRACTS --