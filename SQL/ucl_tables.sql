/*TABLES CREATION*/

--Main Tables
CREATE TABLE Player(
		pid INT AUTO_INCREMENT PRIMARY KEY,
		s_num INT NOT NULL, 
		p_name VARCHAR(50), 
		age INT NOT NULL,
		pos VARCHAR(5),
		country VARCHAR(100),
		salary INT NOT NULL,
		goals INT NOT NULL,
		assists INT NOT NULL
);

CREATE TABLE Team(
		t_name VARCHAR(50),
		abbreviation VARCHAR(5),
		points INT NOT NULL,
		country VARCHAR(100),
		trophies INT NOT NULL,
		placement VARCHAR(10),
		PRIMARY KEY(abbreviation)
);

CREATE TABLE Manager(
		m_name VARCHAR(50),
		c_trophies INT NOT NULL,
		PRIMARY KEY(m_name)
);

CREATE TABLE Stadium(
		stad_name VARCHAR(100),
		cap INT NOT NULL,
		PRIMARY KEY(stad_name)
); 

CREATE TABLE Matches( 
		m_date VARCHAR(20),
		result VARCHAR(30),
		p_earned INT NOT NULL,
		t1_name VARCHAR(50),
		t2_name VARCHAR(50),
		PRIMARY KEY(m_date)
);

CREATE TABLE Groups(
		g_id VARCHAR(1),
		t_scorer VARCHAR(50),
		god VARCHAR(1),
		PRIMARY KEY(g_id)
);

CREATE TABLE Champions_League(
		l_year INT NOT NULL,
		mvp VARCHAR(50),
		winner VARCHAR(50),
		PRIMARY KEY(l_year)
);


--Relationship Tables
CREATE TABLE Is_in(
		pid INT NOT NULL,
		abbreviation VARCHAR(5),
		PRIMARY KEY(pid, abbreviation),
		FOREIGN KEY(pid) REFERENCES Player(pid) ON DELETE CASCADE ON UPDATE CASCADE,
		FOREIGN KEY(abbreviation) REFERENCES Team(abbreviation) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE Manages(
		m_name VARCHAR(50),
		abbreviation VARCHAR(5),
		PRIMARY KEY(m_name, abbreviation),
		FOREIGN KEY(m_name) REFERENCES Manager(m_name),
		FOREIGN KEY(Abbreviation) REFERENCES Team(abbreviation)
);


CREATE TABLE PLays_in(
        abbreviation VARCHAR(5),
        stad_name VARCHAR(100),
        PRIMARY KEY(abbreviation, stad_name),
        FOREIGN KEY(abbreviation) REFERENCES Team(abbreviation) ON DELETE CASCADE ON UPDATE CASCADE,
        FOREIGN KEY(stad_name) REFERENCES Stadium(stad_name) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE Plays(
        abbreviation VARCHAR(50),
        m_date VARCHAR(20),
        PRIMARY KEY(abbreviation, m_date),
        FOREIGN KEY(abbreviation) REFERENCES Team(abbreviation) ON DELETE CASCADE ON UPDATE CASCADE,
        FOREIGN KEY(m_date) REFERENCES Matches(m_date) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE Is_pLayed_in(
        m_date VARCHAR(20),
        stad_name VARCHAR(100),
        PRIMARY KEY(m_date, stad_name),
        FOREIGN KEY(m_date) REFERENCES Matches(m_date) ON DELETE CASCADE ON UPDATE CASCADE,
        FOREIGN KEY(stad_name) REFERENCES Stadium(stad_name) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE Participates_in(
        abbreviation VARCHAR(50),
        l_year INT NOT NULL,
        PRIMARY KEY(abbreviation, l_year),
        FOREIGN KEY(abbreviation) REFERENCES Team(abbreviation) ON DELETE CASCADE ON UPDATE CASCADE,
        FOREIGN KEY(l_year) REFERENCES Champions_League(l_year) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE Belongs_to(
        abbreviation VARCHAR(20),
        g_id VARCHAR(1),
        PRIMARY KEY(abbreviation, g_id),
        FOREIGN KEY(abbreviation) REFERENCES Team(abbreviation) ON DELETE CASCADE ON UPDATE CASCADE,
        FOREIGN KEY(g_id) REFERENCES Groups(g_id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE Has(
        m_date VARCHAR(20),
        g_id VARCHAR(1),
        PRIMARY KEY(m_date, g_id),
        FOREIGN KEY(m_date) REFERENCES Matches(m_date) ON DELETE CASCADE ON UPDATE CASCADE,
        FOREIGN KEY(g_id) REFERENCES Groups(g_id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE Users(
	user_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	username VARCHAR(100) NOT NULL,
	password VARCHAR(100) NOT NULL,
);
