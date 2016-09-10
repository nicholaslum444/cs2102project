DROP TABLE IF EXISTS person CASCADE;
DROP TABLE IF EXISTS task CASCADE;
DROP TABLE IF EXISTS contract;
DROP TYPE IF EXISTS status_type;

CREATE TABLE IF NOT EXISTS person (
    id SERIAL NOT NULL,
    email VARCHAR(256) NOT NULL,
    password_hash VARCHAR(256) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS task (
    id SERIAL NOT NULL,
    title VARCHAR(512) NOT NULL,
    description TEXT,
    start_datetime TIMESTAMP NOT NULL,
    end_datetime TIMESTAMP NOT NULL,
    creator_id INTEGER NOT NULL,
    workers_needed INTEGER CHECK (workers_needed > 0),
    price INTEGER CHECK (price > 0),
    created_datetime TIMESTAMP NOT NULL,
    last_updated_datetime TIMESTAMP NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (creator_id) REFERENCES person(id) 
        ON UPDATE CASCADE
        ON DELETE RESTRICT
);

CREATE TYPE status_type AS ENUM (
    'pending', 
    'ongoing', 
    'completed', 
    'cancelled'
);

CREATE TABLE IF NOT EXISTS contract (
    id SERIAL NOT NULL,
    creator_id INTEGER NOT NULL,
    task_id INTEGER NOT NULL,
    start_datetime TIMESTAMP NOT NULL,
    end_datetime TIMESTAMP NOT NULL,
    accepted_conditions BOOLEAN NOT NULL,
    status status_type NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (creator_id) REFERENCES person(id)
        ON DELETE RESTRICT,
    FOREIGN KEY (task_id) REFERENCES task(id)
        ON DELETE RESTRICT
);