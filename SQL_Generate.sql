DROP DATABASE IF EXISTS ecommerce;
CREATE DATABASE IF NOT EXISTS ecommerce;
USE ecommerce;

DROP TABLE IF EXISTS category,
                     product,
                     mobile,
                     laptop, 
                     user_ids,
                     cart,
                     orders,
                     order_details;

CREATE TABLE category (
    c_type      VARCHAR(30)     NOT NULL,
    c_info	    VARCHAR(30)     NOT NULL,
	PRIMARY KEY (c_type)
);

INSERT INTO category VALUES('Laptop','Portable Computers'),
						   ('Mobile','Hand-held Devices'),
                           ('TV','Entertainment Devices'),
                           ('Speakers','Audio Devices');

CREATE TABLE product (
	p_id           INT            NOT NULL,
    p_name         VARCHAR(30)    NOT NULL,
    price          FLOAT          NOT NULL,
    availability   INT            NOT NULL,
	c_type  	   VARCHAR(30)    NOT NULL,
	PRIMARY KEY (p_id),
	KEY c_type (c_type),
    CONSTRAINT c_typepfk FOREIGN KEY (c_type) REFERENCES category (c_type)
);

INSERT INTO product VALUES  ('1521','ASUS Laptop','600','2000','Laptop'),
							('1631','DELL Laptop','700','500','Laptop'),
                            ('2261','HP Laptop','650','600','Laptop'),
                            ('3241','APPLE Laptop','1100','300','Laptop'),
                            ('1191','SAMSUNG Mobile','800','400','Mobile'),
                            ('3322','OPPO Mobile','650','500','Mobile'),
                            ('4634','XIAOMI Mobile','350','700','Mobile'),
                            ('7614','SONY Mobile','300','600','Mobile');
	
CREATE TABLE mobile (
	 p_id 			INT 			NOT NULL,
	 p_category 	VARCHAR(30) 	NOT NULL,
	 brand 			VARCHAR(30) 	NOT NULL,
	 model_name 	VARCHAR(30) 	NOT NULL,
	 display_size 	FLOAT 			DEFAULT NULL,
	 color 			VARCHAR(15) 	DEFAULT NULL,
	 storage 		FLOAT 			DEFAULT NULL,
	 ram 			INT 		 	NOT NULL,
	 PRIMARY KEY (p_id),
	 KEY p_category (p_category),
	 CONSTRAINT p_idmfk FOREIGN KEY (p_id) REFERENCES product (p_id) ON DELETE CASCADE,
	 CONSTRAINT p_catemfk FOREIGN KEY (p_category) REFERENCES category (c_type) ON DELETE CASCADE
);

INSERT INTO mobile VALUES ('1191','Mobile','SAMSUNG','A10E','5.5','Blue','32','4'),
						  ('3322','Mobile','OPPO','F1S','5','Black','64','5'),
                          ('4634','Mobile','XIAOMI','Redmi K10','6','Red','128','6.5'),
                          ('7614','Mobile','SONY','Xperia','4.5','Green','64','5.5');
                          

CREATE TABLE laptop (
	 p_id 			INT 			NOT NULL,
	 p_category 	VARCHAR(30) 	NOT NULL,
	 brand 			VARCHAR(30) 	NOT NULL,
	 model_no	 	VARCHAR(30) 	NOT NULL,
	 color 			VARCHAR(15) 	DEFAULT NULL,
     ram 			INT 		 	NOT NULL,
     storage 		FLOAT 			DEFAULT NULL,
     display_size 	FLOAT 			DEFAULT NULL,
	 PRIMARY KEY (p_id),
	 KEY p_category (p_category),
	 CONSTRAINT p_idlfk FOREIGN KEY (p_id) REFERENCES product (p_id) ON DELETE CASCADE,
	 CONSTRAINT p_catelfk FOREIGN KEY (p_category) REFERENCES category (c_type) ON DELETE CASCADE
);

INSERT INTO laptop VALUES  ('1521','Laptop','ASUS','Zenbook','Black','8','2','15'),
						   ('1631','Laptop','DELL','5559','Silver','16','2','15'),
                           ('2261','Laptop','HP','Pavilion','Blue','8','1','13'),
                           ('3241','Laptop','APPLE','Macbook Pro','White','4','0.5','13');


CREATE TABLE user_ids(
	 u_id 			INT 			NOT NULL,
	 fname		 	VARCHAR(30) 	NOT NULL,
	 lname 			VARCHAR(30) 	NOT NULL,
	 email		 	VARCHAR(30) 	NOT NULL,
	 user_name		VARCHAR(30) 	NOT NULL,
     address 		VARCHAR(90) 	NOT NULL,
     phone_no 		VARCHAR(10) 	NOT NULL,
     password 		VARCHAR(20) 	DEFAULT NULL,
	 PRIMARY KEY (u_id),
	 UNIQUE KEY user_name (user_name),
     UNIQUE KEY email (email,phone_no)
);

INSERT INTO user_ids VALUES ('45215','John','Smith','johnsmith@gmail.com','johnsmith25','428 Harvey Drive, Auburn, NY 13021','6142574125','xxx3321'),
							('25142','Paul','Howell','paulhowl@gmail.com','paulhoul1','9257 Edgewood St. Greensboro, NC 27405','9178452142','yyy2145'),
                            ('14521','Dave','Brown','davebrown@gmail.com','davebr34','508 Central Ave. Klamath Falls, OR 97603','2564154215','lakhjsn'),
                            ('78451','Allan','Henry','allanhenry@gmail.com','allenhy65','148 S. Ketch Harbour Dr. Revere, MA 02151','5421542355','lll4521');
			

CREATE TABLE cart(
	 quantity 	INT 	NOT NULL,
	 p_id		INT 	NOT NULL,
	 u_id		INT 	NOT NULL,
	 KEY p_id (p_id),
	 KEY u_id (u_id),
	 CONSTRAINT p_idcfk FOREIGN KEY (p_id) REFERENCES product (p_id) ON DELETE CASCADE,
     CONSTRAINT u_idufk FOREIGN KEY (u_id) REFERENCES user_ids (u_id) ON DELETE CASCADE
);

INSERT INTO cart VALUES ('1','1521','45215'),
						('2','2261','25142'),
                        ('1','1191','14521'),
                        ('3','3322','14521');

CREATE TABLE orders(
	 order_date DATE    NOT NULL,
	 quantity 	INT 	NOT NULL,
	 p_id		INT 	NOT NULL,
	 u_id		INT 	NOT NULL,
     o_id       INT     NOT NULL,
     PRIMARY KEY (o_id,p_id),
	 KEY p_id (p_id),
	 KEY u_id (u_id),
	 CONSTRAINT p_idofk FOREIGN KEY (p_id) REFERENCES product (p_id) ON DELETE CASCADE,
     CONSTRAINT u_idofk FOREIGN KEY (u_id) REFERENCES user_ids (u_id) ON DELETE CASCADE
);

INSERT INTO orders VALUES ('2021-03-18','1','1521','45215','27425'),
						  ('2021-03-19','3','2261','14521','65216'),
                          ('2021-03-19','2','1191','14521','65216'),
                          ('2021-03-23','1','3241','25142','41254');

CREATE TABLE orders_details(
	 p_id			INT 			NOT NULL,
     o_id       	INT     		NOT NULL,
     p_name     	VARCHAR(30)     NOT NULL,
     price 			INT     		NOT NULL,
     c_type 		VARCHAR(30) 	NOT NULL,
	 order_date 	DATE    		NOT NULL,
     quantity 		INT 			NOT NULL,
	 u_id			INT 			NOT NULL,
     PRIMARY KEY (o_id,p_id),
	 KEY p_id (p_id),
	 KEY u_id (u_id),
     CONSTRAINT o_idodfk FOREIGN KEY (p_id) REFERENCES orders (p_id) ON DELETE CASCADE,
	 CONSTRAINT p_idodfk FOREIGN KEY (p_id) REFERENCES product (p_id) ON DELETE CASCADE,
     CONSTRAINT u_idodfk FOREIGN KEY (u_id) REFERENCES user_ids (u_id) ON DELETE CASCADE
);

INSERT INTO orders_details VALUES ('1521','27425','ASUS Laptop','600','Laptop','2021-03-18','1','45215'),
								 ('2261','65216','HP Laptop','650','Laptop','2021-03-19','3','14521'),
                                 ('1191','65216','SAMSUNG Mobile','800','Mobile','2021-03-19','2','14521'),
                                 ('3241','41254','APPLE Laptop','1100','Laptop','2021-03-23','1','25142');


