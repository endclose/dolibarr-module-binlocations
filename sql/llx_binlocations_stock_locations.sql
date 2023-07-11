CREATE TABLE llxvd_binlocations_stock_locations (
  rowid int AUTO_INCREMENT PRIMARY KEY NOT NULL,
  fk_product int NOT NULL,
  fk_location int NOT NULL,
  reel int NOT NULL
) ENGINE=InnoDB;