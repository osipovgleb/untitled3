SELECT 'Creating table users';
DROP TABLE IF EXISTS users;
CREATE TABLE users (
  id          serial,
  admin       bool DEFAULT FALSE,
  login       text,
  password      text,
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
        reg_date)
    VALUES
        ('f',
        'test', 'login',
        'Login Login',
        'test@login.com',
        '2016-06-08');

INSERT INTO users(
  admin,
  login,
  password,
  name,
  email,
  reg_date)
VALUES
  ('t',
   'mas_laresk',
   'test',
   'Mas Laresk',
   'mas.laresk@gmail.com',
   '2016-06-09');