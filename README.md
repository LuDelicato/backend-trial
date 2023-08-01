<h1 align="center" id="title">Backend-trial</h1>

<p align="center"><img src="https://socialify.git.ci/LuDelicato/backend-trial/image?language=1&amp;name=1&amp;owner=1&amp;pattern=Solid&amp;theme=Light" alt="project-image"></p>

<p id="description">This is a trial for a job opening it's a backend app where you can CRUD some products.</p>

  
  
<h2>🧐 Features</h2>

Here're some of the project's best features:

*   View all Products
*   Add a Product
*   Edit a Product
*   Delete a Product
*   SKU's are unique

<h2>🛠️ Installation Steps:</h2>

<p>1. Run the following command to install the required dependencies using Composer:</p>

```
composer install
```

<p>2. Install the vlucas/phpdotenv package for managing environment variables:</p>

```
composer require vlucas/phpdotenv
```

<p>3. Create the MySQL database:</p>

```
CREATE DATABASE IF NOT EXISTS sharesolutions;
```

<p>4. Create the products table:</p>

```
CREATE TABLE IF NOT EXISTS products (     id INT AUTO_INCREMENT PRIMARY KEY     sku VARCHAR(50) UNIQUE NOT NULL     name VARCHAR(255) NOT NULL     price DECIMAL(10 2) NOT NULL     description TEXT );
```

<p>5. Finally navigate to the public folder and run the index.php script to start the application.</p>

  
  
<h2>💻 Built with</h2>

Technologies used in the project:

*   PHP
*   SQL
