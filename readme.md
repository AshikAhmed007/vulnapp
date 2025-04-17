# VulnApp – Vulnerable Web Application (For Educational Use Only)

> ⚠️ This is a **vulnerable web application** designed for educational and penetration testing purposes. **Do not deploy on a public-facing server.**

---

# 🌐 Web Application Feature List


## 🔐 Authentication & User Management

### `register.php`
- User registration form
- Collects username, email, and password
- Stores user data in the database (with password hashing)

### `login.php` *(Assumed if present alongside `logout.php`)*
- User login functionality
- Validates credentials against stored database records

### `logout.php`
- Ends the user session securely
- Redirects to the login or home page

### `change_password.php`
- Allows logged-in users to change their password
- Validates current password before allowing change

---

## 👤 User Dashboard & Profile

### `dashboard.php`
- User landing page after login
- Displays user stats, post summaries, or recent activity

### `profile.php`
- User can view and update their profile information (e.g., name, bio, avatar)

---

## 📝 Content Management

### `create_post.php`
- Form for users to create new blog posts or content entries
- Supports title, body, and optional file/image upload

### `upload.php`
- Handles file/image uploads securely
- Used by `create_post.php` or `profile.php` for media content

---

# 🧰 Tech Stack

The application is built using the following technologies:

---

## 🔙 Backend
- **PHP**  
  Used to handle server-side logic, session management, form processing, and database interactions.

## 🗃️ Database
- **MySQL**  
  Stores user data, posts, uploads, and other application-related records.

## 🎨 Frontend
- **HTML**  
  Core structure and markup for all web pages.

- **Bootstrap**  
  Utilized for responsive design and UI components (buttons, forms, modals, grids, etc.).

---


## 📦 Installation Instructions

### 1. Download and Extract
- Download `vulnapp.zip` from [this link](https://drive.google.com/file/d/121bmI6yJZI48nHqf2yIqhIuyqfcaE7CA/view?usp=sharing)
- Extract the contents into your web server directory:
xampp/htdocs

### 2. Start the Web Server and Database
- Open **XAMPP Control Panel**
- Start both:
- **Apache**
- **MySQL**

### 3. Import the Database
- Open your browser and go to:
```
  http://localhost/phpmyadmin
```
- Create a new database, e.g., `vulnapp`
- Import the `vulnapp.sql` file into the newly created database

---

## 🌐 Accessing the Application

### Option 1: Default (localhost)
- Open your browser and go to:
```
  http://127.0.0.1
```

### Option 2: Custom Domain (`vulnapp.com`)

#### Linux:
1. Open the hosts file:
 ```bash
 sudo nano /etc/hosts
```
2. Add the following line:
```
127.0.0.1 vulnapp.com
```
3. Save and exit.
4. Open your browser and visit: 
```
http://vulnapp.com
```   
#### Windows:
1. Open `Notepad as Administrator`
2. Open the file:
```
C:\Windows\System32\drivers\etc\hosts

```
3. Add the following line:
```
127.0.0.1 vulnapp.com
```
3. Save and exit.
4. Open your browser and visit: 
```
http://vulnapp.com
```   
