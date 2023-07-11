ALTER TABLE llx_binlocations_stock_locations ADD INDEX idx_binlocations_stock_locations_rowid (rowid);
ALTER TABLE llxvd_binlocations_stock_locations ADD CONSTRAINT fk_locationstock_product FOREIGN KEY (fk_product) REFERENCES llx_product (rowid);
ALTER TABLE llxvd_binlocations_stock_locations ADD CONSTRAINT fk_locationstock_location FOREIGN KEY (fk_location) REFERENCES llx_binlocations_locations (rowid);