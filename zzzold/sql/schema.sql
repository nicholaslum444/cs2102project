DROP TABLE IF EXISTS contract;
DROP TABLE IF EXISTS offer;
DROP TABLE IF EXISTS submit;
DROP TABLE IF EXISTS task;
DROP TABLE IF EXISTS account;
DROP TABLE IF EXISTS admin;

CREATE TABLE IF NOT EXISTS admin (
    id SERIAL NOT NULL,
    email VARCHAR(256) NOT NULL,
    password_hash VARCHAR(256) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS account (
    id SERIAL NOT NULL,
    email VARCHAR(256) NOT NULL,
    password_hash VARCHAR(256) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS task (
    id SERIAL NOT NULL,
    title VARCHAR(256) NOT NULL,
    description TEXT,
    PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS submit (
    id SERIAL NOT NULL,
    creator_id INTEGER NOT NULL,
    task_id INTEGER NOT NULL,
    PRIMARY KEY (id),
    UNIQUE (creator_id, task_id),
    FOREIGN KEY (creator_id)
        REFERENCES account(id)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    FOREIGN KEY (task_id)
        REFERENCES task(id)
        ON UPDATE CASCADE
        ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS offer (
    id SERIAL NOT NULL,
    offerer_id INTEGER NOT NULL,
    task_id INTEGER NOT NULL,
    PRIMARY KEY (id),
    UNIQUE (offerer_id, task_id),
    FOREIGN KEY (offerer_id)
        REFERENCES account(id)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    FOREIGN KEY (task_id)
        REFERENCES task(id)
        ON UPDATE CASCADE
        ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS contract (
    id SERIAL NOT NULL,
    contractor_id INTEGER NOT NULL,
    task_id INTEGER NOT NULL,
    PRIMARY KEY (id),
    UNIQUE (contractor_id, task_id),
    FOREIGN KEY (contractor_id)
        REFERENCES account(id)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    FOREIGN KEY (task_id)
        REFERENCES task(id)
        ON UPDATE CASCADE
        ON DELETE CASCADE
);