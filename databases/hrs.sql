
-- Admin Table

CREATE TABLE if not exists `admin` (
  `adminID` int(8) NOT NULL,
  `a_name` varchar(30) NOT NULL,
  `a_username` varchar(30) NOT NULL,
--   `a_imgLoc` varchar(300) DEFAULT NULL,
--   `role` varchar(10) NOT NULL,
  `a_password` varchar(256) NOT NULL,
  `a_email` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Admin Table data

