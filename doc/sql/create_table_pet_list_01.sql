CREATE TABLE pet_list (
	list_no INT PRIMARY KEY AUTO_INCREMENT
	,list_title VARCHAR(100) NOT NULL
	,list_contents VARCHAR(250) NULL
	,list_start DATETIME NOT NULL
	,list_end DATETIME NOT NULL
	,list_comp_flg INT NOT NULL DEFAULT 0
	,list_location VARCHAR(100) NULL
);

COMMIT;