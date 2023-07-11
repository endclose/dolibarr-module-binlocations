ALTER TABLE llx_binlocations_locations ADD INDEX idx_binlocations_locations_rowid (rowid);
-- ALTER TABLE llx_binlocations_locations ADD CONSTRAINT llx_binlocations_locations_fk_entity FOREIGN KEY (fk_entity) REFERENCES llx_entity(rowid);
ALTER TABLE llx_binlocations_locations ADD CONSTRAINT llx_binlocations_locations_fk_entrepot FOREIGN KEY (fk_warehouse) REFERENCES llx_entrepot(rowid);
-- ALTER TABLE llx_binlocations_locations ADD UNIQUE INDEX uk_binlocations_locations_fk_entity_label (fk_entity, label);