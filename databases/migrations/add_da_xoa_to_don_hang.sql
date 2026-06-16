-- Migration: Add da_xoa to don_hang
-- Created At: 2026-06-16

ALTER TABLE don_hang ADD COLUMN da_xoa TINYINT(1) NOT NULL DEFAULT 0;
