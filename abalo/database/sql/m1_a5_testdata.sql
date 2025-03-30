CREATE TABLE testdata.ab_testdata(
    id INT8 PRIMARY KEY,
    ab_testname VARCHAR(80) NOT NULL UNIQUE
);



INSERT INTO testdata.ab_testdata (id, ab_testname) VALUES (1, 'Fotokamera');
INSERT INTO testdata.ab_testdata (id, ab_testname) VALUES (2, 'Blitz');



