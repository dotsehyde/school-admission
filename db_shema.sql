
-- Users
CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT,
  email VARCHAR(255),
  password VARCHAR(255),
  name VARCHAR(255),
  PRIMARY KEY (prog_id)
);

-- Entries
CREATE TABLE IF NOT EXISTS entries (
	id INT AUTO_INCREMENT,
    --Personal Info
	application_mode TEXT,
	mature_student BOOLEAN,
	surname TEXT,
	first_name TEXT,
	other_name TEXT,
	gender TEXT,
	dob TEXT,
	place_of_birth TEXT,
	nationality TEXT,
	marital_status Text,
	mailing_address TEXT,
	email TEXT,
	country TEXT,
	phone TEXT,
	picture TEXT,
    date_created DATE,
    --Program info
    prog_type TEXT,
    prog_enroll TEXT,
    --Sponsor info
    sp_title TEXT,
    sp_name TEXT,
    sp_relation TEXT,
    sp_occupation TEXT,
    sp_address TEXT,
    sp_email TEXT,
    sp_phone TEXT,
    -- religious info
    rel_type TEXT,
    rel_deno TEXT,
	PRIMARY KEY (id)
);


-- Programs TABLE
CREATE TABLE IF NOT EXISTS entries_prog (
  prog_id INT,
  prog_choice TEXT,
  PRIMARY KEY (prog_id),
  FOREIGN KEY (prog_id) REFERENCES entries(id)
);

-- Education TABLE
CREATE TABLE IF NOT EXISTS entries_edu (
  edu_id INT,
  edu_school TEXT,
  edu_from DATE,
  edu_to DATE,
  edu_obtained DATE,
  edu_qualification TEXT,
  PRIMARY KEY (edu_id),
  FOREIGN KEY (edu_id) REFERENCES entries(id)
);