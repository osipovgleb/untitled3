SELECT 'Creating table users';
DROP TABLE IF EXISTS users;
CREATE TABLE users (
  id          serial,
  admin       bool DEFAULT FALSE,
  login       text,
  password    text NOT NULL,
  name        text,
  email       text,
  reg_date    date,
  last_login  TIMESTAMP DEFAULT NULL,
  disabled    bool DEFAULT FALSE,
  UNIQUE ( login ),
  UNIQUE ( email )
);

INSERT INTO users(
        admin,
        login,
        password,
        name,
        email,
        reg_date,
        last_login)
    VALUES
        ('f',
        'test', 'login',
        'Login Login',
        'test@login.com',
        NOW(),
        NOW());

INSERT INTO users(
  admin,
  login,
  password,
  name,
  email,
  reg_date,
  last_login)
VALUES
  ('t',
   'mas_laresk', 'test',
   'Mas Laresk',
   'mas.laresk@gmail.com',
    NOW(),
    NOW());