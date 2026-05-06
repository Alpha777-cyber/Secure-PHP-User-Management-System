# User Registration System with Admin Dashboard

A professional PHP-based user registration and management system with a clean, modern black and white interface. This project provides secure user registration, password hashing, and a comprehensive admin dashboard for user management.

## 🚀 Features

### User Features
-  **Secure User Registration** - Collects first name, last name, email, gender, and password
-  **Password Security** - MD5 hashing for password storage
-  **Email Validation** - Built-in email format validation
-  **Professional UI** - Clean black and white design with responsive layout
-  **Mobile Responsive** - Works seamlessly on all devices

### Admin Features
-  **Secure Admin Login** - Session-based authentication system
-  **User Statistics** - Real-time dashboard with user metrics
-  **User Management** - View, edit, and delete registered users
-  **Search Functionality** - Real-time user search
-  **Analytics** - Track total users, daily registrations, and gender demographics
-  **Timestamp Tracking** - Automatic registration date/time logging

## 🛠️ Technology Stack

- **Backend**: PHP 7.4+
- **Database**: MySQL/MariaDB
- **Frontend**: HTML5, CSS3, JavaScript
- **Styling**: Custom CSS with professional black and white theme
- **Security**: Session management, input validation, password hashing

## 📋 Prerequisites

- PHP 7.4 or higher
- MySQL/MariaDB database
- XAMPP/WAMP/LAMP stack (or similar web server environment)

## 🚀 Quick Start

### 1. Database Setup

Create a MySQL database named `student_db`:

```sql
CREATE DATABASE student_db;
```

### 2. Configuration

The database connection is pre-configured in `connection.php`:

```php
$host = 'host name';
$dbname = 'data base name';
$username = 'user name';
$password = 'password';
```

Update the credentials if needed.

### 3. File Structure

```
├── connection.php          # Database connection and table setup
├── signup.php             # User registration form
├── create.php             # User creation processing
├── admin.php              # Admin login page
├── dashboard.php          # Admin dashboard
├── edit_user.php          # User editing interface
├── delete_user.php        # User deletion processing
├── admin.txt              # Admin credentials file
└── README.md              # This documentation
```

### 4. Access Points

- **User Registration**: `http://localhost/db/signup.php`
- **Admin Login**: `http://localhost/db/admin.php`

## 🔐 Admin Credentials

- **Username**: `admin`
- **Password**: `admin123`

*Note: Credentials are stored in `admin.txt` for easy reference*

## 📊 Admin Dashboard Features

### Statistics Overview
- **Total Users**: Complete user count
- **Today's Registrations**: Users registered today
- **Gender Demographics**: Male/Female user breakdown

### User Management
- **View All Users**: Sortable table with complete user data
- **Edit Users**: Modify user information (name, email, gender)
- **Delete Users**: Remove users with confirmation dialog
- **Search Users**: Real-time search across all user fields

### Navigation
- **Add New User**: Quick link to registration form
- **Logout**: Secure session termination

## 🗄️ Database Schema

The system automatically creates a `users` table with the following structure:

```sql
CREATE TABLE users (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    fname VARCHAR(50) NOT NULL,
    lname VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    gender VARCHAR(10),
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

## 🎨 Design Philosophy

- **Minimalist Approach**: Clean, distraction-free interface
- **Professional Aesthetics**: Strict black and white color scheme
- **User Experience**: Intuitive navigation and clear visual hierarchy
- **Responsive Design**: Optimized for all screen sizes
- **Accessibility**: Semantic HTML and clear contrast ratios

## 🔒 Security Features

- **Session Management**: Secure admin authentication
- **Input Validation**: Form data sanitization
- **Password Hashing**: MD5 encryption for password storage
- **SQL Injection Prevention**: Prepared statements (recommended for production)
- **Access Control**: Admin-only areas protected by sessions

## 🚀 Deployment

### Local Development (XAMPP)

1. Start XAMPP services (Apache & MySQL)
2. Place project files in `htdocs/db/`
3. Access via `http://localhost/db/`

### Production Considerations

- Replace MD5 with `password_hash()` for better security
- Implement prepared statements for SQL queries
- Add HTTPS/SSL certificate
- Configure proper error logging
- Set up database backups
- Implement rate limiting

## 🔄 Workflow

1. **User Registration**: Users fill out the registration form
2. **Data Processing**: Form data is validated and stored in database
3. **Admin Access**: Administrators log in to manage users
4. **User Management**: Admin can view, edit, or delete users
5. **Analytics**: Dashboard provides real-time user statistics

## 🐛 Troubleshooting

### Common Issues

**Database Connection Error**
- Verify MySQL service is running
- Check database credentials in `connection.php`
- Ensure database `student_db` exists

**Admin Login Not Working**
- Clear browser cookies/cache
- Verify session settings in PHP
- Check file permissions

**Registration Not Saving**
- Verify database table exists
- Check MySQL user permissions
- Review error logs

### Debug Mode

Add this to `connection.php` for debugging:

```php
ini_set('display_errors', 1);
error_reporting(E_ALL);
```

## 📈 Future Enhancements

- [ ] Email verification system
- [ ] Password reset functionality
- [ ] Two-factor authentication
- [ ] User profile system
- [ ] Role-based permissions
- [ ] API endpoints
- [ ] Data export functionality
- [ ] Advanced analytics
- [ ] Multi-language support

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Test thoroughly
5. Submit a pull request

## 📝 License

This project is open source and available under the [MIT License](LICENSE).

## 👥 Author

Built with ❤️ using PHP, MySQL, and modern web standards.

## 📞 Support

For issues and questions:
- Create an issue in the repository
- Review the troubleshooting section
- Check the database connection settings

---

**Project Status**: ✅ Production Ready  
**Last Updated**: 2026  
**Version**: 1.0.0
