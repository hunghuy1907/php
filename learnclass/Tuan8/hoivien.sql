CREATE TABLE hoivien (
  maHV int(11) NOT NULL,
  tenhv varchar(50) NOt NULL,
  ngayvao date NOt NULL,
  noicongtac varchar(200),
  PRIMARY KEY (maHV)
);

CREATE TABLE giaithuong (
  maGT int(11) NOT NULL,
  tenGT varchar(70) NOt NULL,
  PRIMARY KEY (maGT)
);

CREATE TABLE hoivien_giaithuong (
   maHV int(11) NOT NULL,
   maGT int(11) NOT NULL,
   ngaynhan date NOT NULL,
   PRIMARY KEY (maHV,maGT),
   CONSTRAINT `hoivien_ibfk` FOREIGN KEY (maHV) REFERENCES hoivien (maHV),
   CONSTRAINT `giaithuong_ibfk` FOREIGN KEY (maGT) REFERENCES giaithuong (maGT)
);

SELECT hoivien_giaithuong.maHV, hoivien_giaithuong.ngaynhan, giaithuong.tenGT 
FROM hoivien_giaithuong 
RIGHT JOIN giaithuong ON hoivien_giaithuong.maGT=giaithuong.maGT


SELECT hoivien_giaithuong.maHV, COUNT(hoivien_giaithuong.maGT) as sogt 
FROM hoivien_giaithuong 
WHERE ngaynhan > '2017/10/01' AND Ngaynhan < '2017/10/20' 
GROUP BY hoivien_giaithuong.maHV
