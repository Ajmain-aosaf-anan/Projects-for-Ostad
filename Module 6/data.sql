-- Inserting demo data for authors
INSERT INTO authors (author_name) VALUES ('Author 1'), ('Author 2'), ('Author 3');

-- Inserting demo data for categories
INSERT INTO categories (category_name) VALUES ('Tech'), ('Health'), ('Lifestyle');

-- Inserting demo data for blogs
INSERT INTO blogs (title, body, category_id, author_id)
VALUES
    ('Blog 1', 'Content for blog 1', 1, 1),
    ('Blog 2', 'Content for blog 2', 2, 2),
    ('Blog 3', 'Content for blog 3', 3, 3);
