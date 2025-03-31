CREATE TABLE ab_testdata(
    id INT8 PRIMARY KEY,
    ab_testname VARCHAR(80) NOT NULL UNIQUE
);



INSERT INTO ab_testdata (id, ab_testname) VALUES (1, 'Fotokamera');
INSERT INTO ab_testdata (id, ab_testname) VALUES (2, 'Blitz');



