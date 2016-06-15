DROP FUNCTION user_create(text, text, text, text, date);
DROP FUNCTION update_user(int, text, text, text, text);
DROP FUNCTION sign_in(text, text);
DROP FUNCTION get_rights(int);

CREATE OR REPLACE FUNCTION get_rights(id int)
  RETURNS TABLE (
    profile_upd bool,
    users_upd bool
  ) AS $$
SELECT profile_upd, users_upd FROM roles WHERE id=(SELECT role_id FROM users WHERE id=$1);
$$ LANGUAGE SQL STABLE;

CREATE OR REPLACE FUNCTION update_user(
  id int,         -- $1
  login text,
  password text,    -- $3
  name text,
  email text      -- $5
) RETURNS int AS $$
UPDATE users SET (login, password, name, email) =
                                                 ($2,
                                                  CASE $3 IS NULL
                                                    WHEN TRUE THEN(SELECT password FROM users WHERE id=$1)
                                                  ELSE $3
                                                  END,
                                                  $4,
                                                  $5)
WHERE id=$1 RETURNING id;
$$ LANGUAGE SQL VOLATILE;

/*CREATE OR REPLACE FUNCTION get_users( id int )
  RETURNS TABLE (
    id int,
    login text,
    name text,
    email text,
    reg_date date,
    last_login timestamp
  ) AS $$
SELECT id, login, name, email, reg_date, last_login FROM users WHERE
  CASE $1 IS NULL
      WHEN TRUE THEN TRUE
      ELSE id=$1
      END;
$$ LANGUAGE SQL STABLE;
*/
CREATE OR REPLACE FUNCTION sign_in( l_login text, l_passwd text )
  RETURNS TABLE (
    id int,
    login text,
    name text,
    email text,
    reg_date date,
    last_login timestamp
  ) AS $$
DECLARE
  l_last_login TIMESTAMP;
BEGIN
  SELECT users.last_login INTO l_last_login FROM users WHERE users.login=$1 AND users.password=$2 AND NOT users.disabled;
  UPDATE users SET last_login=NOW() WHERE users.login=$1 AND users.password=$2;
  RETURN QUERY
  SELECT users.id,  users.login, users.name, users.email, users.reg_date, l_last_login FROM users WHERE users.login=$1 AND users.password=$2;
END;
$$ LANGUAGE plpgsql VOLATILE;

CREATE OR REPLACE FUNCTION user_create( login text, password text, name text, email text, reg_date date ) RETURNS int AS $$
DECLARE
 i INT;
BEGIN
  INSERT INTO users (login, password, name, email, reg_date, last_login) VALUES ($1, $2, $3, $4, $5, NOW())  RETURNING id INTO i;
  RETURN i;
  EXCEPTION
  WHEN UNIQUE_VIOLATION THEN
    RETURN -1;
  WHEN NOT_NULL_VIOLATION THEN
    RETURN -2;
END;
$$ LANGUAGE plpgsql VOLATILE;



