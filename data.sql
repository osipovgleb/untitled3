SELECT 'Creating table users';
DROP TABLE IF EXISTS users;
CREATE TABLE users (
  id          serial,
  login       text,               -- user login
  password      text,               -- user passwd
  name        text,               -- display name
  email       text,               -- user email
  reg_date    date,               -- registration date
  last_login  TIMESTAMP DEFAULT NULL, -- last login attempt
  disabled    bool DEFAULT FALSE, -- user is disabled
  UNIQUE ( login ),
  UNIQUE ( email )
);

INSERT INTO users(
        login,
        password,
        name,
        email,
        reg_date)
    VALUES
        ('test', 'login',
        'Login Login',
        'test@login.com',
        '2016-06-08');