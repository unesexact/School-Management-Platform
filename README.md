# School Management System (PHP MVC)

This is a School Management System web application developed as an academic project.
The system allows administrators, teachers, and students to manage courses, enrollments, grades, timetables, and student bulletins.

The project is built using PHP with an MVC architecture and a MySQL database.

---

## 🚀 Features

### Admin
- Manage students, teachers, and subjects  
- Create courses (assign teacher + subject)  
- Enroll students in courses  
- Create and manage timetables  
- View student bulletins  

### Teacher
- View assigned courses  
- Enter and update student grades  
- View personal timetable  

### Student
- View personal timetable  
- Consult grades and general average  
- View bulletin  

---

## 🛠️ Technologies Used

- PHP – Backend logic  
- MySQL – Database  
- HTML / CSS / Bootstrap – User interface  
- MVC Architecture (Model – View – Controller)  
- XAMPP – Local development environment  
- Git & GitHub – Version control and hosting  

---

## 🔐 Security

- Passwords are hashed using `password_hash()`  
- SQL Injection prevention using prepared statements (PDO)  
- Session-based authentication with role protection (admin / teacher / student)  

---

## ⚙️ Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/unesexact/School-Management-Platform.git
   ```

2. Move the project into your XAMPP `htdocs` folder.

3. Create a MySQL database and import the SQL file (if provided).

4. Configure database connection in:
   ```
   config/database.php
   ```

5. Start Apache and MySQL using XAMPP.

6. Open in browser:
   ```
   http://localhost/school_management/public
   ```

---

## 🔑 User Roles

The system supports three roles:
- Admin  
- Teacher  
- Student  

---

## 📊 Database Structure

Main tables:
- users  
- students  
- teachers  
- subjects  
- courses  
- enrollments  
- grades  
- timetable  

---

## 👨‍💻 Author

Developed by Younes Oukessou  
Academic project – School Management System  

---

## 📄 License

This project is for educational purposes only.
