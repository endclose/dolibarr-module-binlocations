CREATE TABLE llx_binlocations_locations (
  rowid integer AUTO_INCREMENT PRIMARY KEY NOT NULL, 
  fk_warehouse int NOT NULL,
  label varchar(30) NOT NULL,
  enabled int NOT NULL
) ENGINE=InnoDB;