-- CRUD operations and queries for authors table
-- Add a new author
INSERT INTO authors (author_name) VALUES ('New Author');

-- Retrieve all authors
SELECT * FROM authors;

-- Retrieve a specific author by ID
SELECT * FROM authors WHERE id = 1;

-- Update an author's name
UPDATE authors SET author_name = 'Updated Author' WHERE id = 1;

-- Delete an author by ID
DELETE FROM authors WHERE id = 1;

-- CRUD operations and queries for categories table
-- Add a new category
INSERT INTO categories (category_name) VALUES ('New Category');

-- Retrieve all categories
SELECT * FROM categories;

-- Retrieve a specific category by ID
SELECT * FROM categories WHERE id = 1;

-- Update a category’s name
UPDATE categories SET category_name = 'Updated Category' WHERE id = 1;

-- Delete a category by ID
DELETE FROM categories WHERE id = 1;

-- CRUD operations and queries for blogs table
-- Add a new blog
INSERT INTO blogs (title, body, category_id, author_id) VALUES ('New Blog', 'Blog content', 1, 1);

-- Retrieve all blogs
SELECT * FROM blogs;

-- Retrieve a specific blog by ID
SELECT * FROM blogs WHERE id = 1;

-- Retrieve all blogs with category and author information
SELECT blogs.*, categories.category_name, authors.author_name
FROM blogs
JOIN categories ON blogs.category_id = categories.id
JOIN authors ON blogs.author_id = authors.id;

-- Update a blog’s title
UPDATE blogs SET title = 'Updated Blog Title' WHERE id = 1;

-- Update a blog’s category or author
UPDATE blogs SET category_id = 2, author_id = 3 WHERE id = 1;

-- Delete a blog by ID
DELETE FROM blogs WHERE id = 1;

-- Get all blogs written by a specific author
SELECT * FROM blogs WHERE author_id = 1;

-- Get all blogs under a specific category
SELECT * FROM blogs WHERE category_id = 1;

