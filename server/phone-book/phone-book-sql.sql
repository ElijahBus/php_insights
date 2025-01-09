CREATE TABLE IF NOT EXISTS `phone_book` (
    id BIGINT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    contacts JSON NOT NULL
);

INSERT INTO phone_book VALUES (1, 'Mark', 'mark@somedumpserver.com', JSON_ARRAY('matt@somedumpserver.com', 'peter@raininthesun.com'));
INSERT INTO phone_book VALUES (2, 'Matt', 'matt@somedumpserver.com', '["mark@somedumpserver.com", "peter@raininthesun.com"]');

