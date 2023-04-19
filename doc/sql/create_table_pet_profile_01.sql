CREATE TABLE pet_profile (
	pet_no INT PRIMARY KEY AUTO_INCREMENT
	,pet_name VARCHAR(20) NOT NULL
	,pet_birth DATE NOT NULL
	,pet_gender ENUM('M','F') NOT NULL
);

COMMIT;