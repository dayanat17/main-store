-- create users table
CREATE TABLE users (
    id            BIGSERIAL     PRIMARY KEY,
    firstname     VARCHAR(100)  NOT NULL,
    lastname      VARCHAR(100)  NOT NULL,
    ident_number  VARCHAR(20)   NOT NULL UNIQUE,
    mobile_phone  VARCHAR(20),
    email         VARCHAR(150)  NOT NULL UNIQUE,
    password      VARCHAR(255)  NOT NULL,
    url_photo     TEXT,
    birth_date    DATE,
    status        BOOLEAN       NOT NULL DEFAULT TRUE,
    created_at    TIMESTAMPTZ   NOT NULL DEFAULT NOW(),
    updated_at    TIMESTAMPTZ   NOT NULL DEFAULT NOW(),
    deleted_at    TIMESTAMPTZ
);

--Select all users from table
SELECT + FROM users;
-- Insert a new user into users table
INSERT INTO users (firstname, lastname, ident_number, mobile_phone, email, password) VALUES ('jhoan', 'ayala', '1253675', '31279621', 'jhoan@gmail.com', '127662');