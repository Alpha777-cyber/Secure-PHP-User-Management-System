<?php




?>
<!DOCTYPE html>

<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    
    <title>Sign Up - User Registration</title>
    
    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;  
        }
 
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;  
            background: #f5f5f5;  
            min-height: 100vh;     
            display: flex;         
            justify-content: center;  
            align-items: center;     
            padding: 15px;         
        }
 
        
        .container {
            width: 100%;
            max-width: 380px;
            background: #ffffff;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }
 
        
        form {
            padding: 20px;
        }
 
        
        fieldset {
            border: none;         
            background: transparent;  
            padding: 0;           
        }
 
        
        legend {
            font-size: 1.3rem;
            font-weight: 600;
            color: #000000;
            text-align: center;
            margin-bottom: 18px;
            padding: 0;
            width: 100%;
        }
 
        
        label {
            display: block;
            font-weight: 500;
            color: #333333;
            margin-bottom: 4px;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
 
        
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 8px 10px;
            border: 1px solid #d0d0d0;
            border-radius: 4px;
            font-size: 0.9rem;
            transition: all 0.2s ease;
            background: #ffffff;
            margin-bottom: 12px;
        }
 
        
        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus {
            outline: none;        
            border-color: #000000;  
            background: #ffffff;  
            box-shadow: 0 0 0 2px rgba(0, 0, 0, 0.1);  
        }
 
        
        input[type="submit"] {
            width: 100%;
            padding: 9px;
            background: #000000;
            color: #ffffff;
            border: none;
            border-radius: 4px;
            font-size: 0.9rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-top: 4px;
        }
 
        
        input[type="submit"]:hover {
            background: #333333;  
        }
 
        
        input[type="submit"]:active {
            background: #000000;   
        }
 
        
        br {
            display: none;         
        }
 
        
        .success-message {
            text-align: center;
            padding: 30px;
        }
 
        .success-message h1 {
            color: #000000;
            font-size: 1.5rem;
            margin-bottom: 15px;
            animation: fadeInUp 0.6s ease;
        }
 
        .success-message p {
            color: #666666;
            font-size: 0.95rem;
            margin-bottom: 20px;
            animation: fadeInUp 0.8s ease;
        }
 
        
        .back-link {
            display: inline-block;
            padding: 10px 20px;
            background: #000000;
            color: #ffffff;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 500;
            transition: all 0.2s ease;
            animation: fadeInUp 1s ease;
        }
 
        .back-link:hover {
            background: #333333;  
            color: #ffffff;        
        }
 
        
        @keyframes fadeInUp {
            from {
                opacity: 0;        
                transform: translateY(30px);  
            }
            to {
                opacity: 1;        
                transform: translateY(0);  
            }
        }
 
        
        @media (max-width: 600px) {
            body {
                padding: 10px;     
            }
 
            .container {
                border-radius: 4px;    
            }
 
            form {
                padding: 30px 20px;  
            }
 
            legend {
                font-size: 1.5rem;  
            }
 
            input[type="text"],
            input[type="email"],
            input[type="password"] {
                padding: 12px;     
            }
 
            input[type="submit"] {
                padding: 12px;     
                font-size: 1rem;   
            }
        }
 
        
        input.error {
            border-color: #000000;  
            background: #f8f8f8;  
        }
 
        input.error:focus {
            border-color: #000000;  
            box-shadow: 0 0 0 2px rgba(0, 0, 0, 0.1);  
        }
 
        
        input[type="submit"].loading {
            opacity: 0.7;         
            cursor: not-allowed;  
        }
 
        
        .form-group {
            margin-bottom: 12px;
        }
 
        .error-message {
            color: #000000;       
            font-size: 0.85rem;    
            margin-top: 5px;       
            display: none;         
        }
 
        .form-group.error .error-message {
            display: block;        
        }
    </style>
</head>

<body>
    
    <div class="container">
        
        
        
        <form action="create.php" method="POST">
            
            
            <fieldset>
                
                
                <legend>Sign Up</legend>

                
                <div class="form-group">
                    
                    
                    <label for="fname">First Name:</label>
                    
                    
                    
                    
                    
                    <input type="text" name="fname" id="fname" required>
                    
                    
                    <span class="error-message">Please enter your first name</span>
                </div>

                
                <div class="form-group">
                    
                    <label for="lname">Last Name:</label>
                    
                    
                    
                    
                    
                    <input type="text" name="lname" id="lname" required>
                    
                    
                    <span class="error-message">Please enter your last name</span>
                </div>

                
                <div class="form-group">
                    
                    <label for="email">Email:</label>
                    
                    
                    
                    
                    
                    
                    <input type="email" name="email" id="email" required>
                    
                    
                    <span class="error-message">Please enter a valid email address</span>
                </div>

                
                <div class="form-group">
                    
                    <label for="gender">Gender:</label>
                    
                    
                    
                    
                    
                    
                    <input type="text" name="gender" id="gender" placeholder="Male, Female, or Other">
                    
                    
                    <span class="error-message">Please enter your gender</span>
                </div>

                
                <div class="form-group">
                    
                    <label for="password">Password:</label>
                    
                    
                    
                    
                    
                    
                    <input type="password" name="password" id="password" required>
                    
                    
                    <span class="error-message">Please enter a password</span>
                </div>

                
                
                <input type="submit" value="Sign Up">
                
            </fieldset>
        </form>
        
        
        
        <div style="text-align: center; margin-top: 15px; padding: 0 20px 20px;">
            <a href="admin.php" style="color: #666666; text-decoration: none; font-size: 0.85rem;">Admin Login</a>
        </div>
        
    </div>
    
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            
            
            const form = document.querySelector('form');
            
            
            const fnameInput = document.getElementById('fname');
            const lnameInput = document.getElementById('lname');
            const emailInput = document.getElementById('email');
            const passwordInput = document.getElementById('password');
            

            form.addEventListener('submit', function(event) {
                let isValid = true;
                
                
                if (fnameInput.value.trim() === '') {
                    
                    fnameInput.parentElement.classList.add('error');
                    isValid = false;
                } else {
                    
                    fnameInput.parentElement.classList.remove('error');
                }
                
                
                if (lnameInput.value.trim() === '') {
                    lnameInput.parentElement.classList.add('error');
                    isValid = false;
                } else {
                    lnameInput.parentElement.classList.remove('error');
                }
                
                
                if (emailInput.value.trim() === '' || !isValidEmail(emailInput.value)) {
                    emailInput.parentElement.classList.add('error');
                    isValid = false;
                } else {
                    emailInput.parentElement.classList.remove('error');
                }
                
                
                if (passwordInput.value.trim() === '') {
                    passwordInput.parentElement.classList.add('error');
                    isValid = false;
                } else {
                    passwordInput.parentElement.classList.remove('error');
                }
                
                
                if (!isValid) {
                    event.preventDefault();
                }
            });
            

            function isValidEmail(email) {
                const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                return emailPattern.test(email);
            }
            

            fnameInput.addEventListener('input', function() {
                this.parentElement.classList.remove('error');
            });
            
            lnameInput.addEventListener('input', function() {
                this.parentElement.classList.remove('error');
            });
            
            emailInput.addEventListener('input', function() {
                this.parentElement.classList.remove('error');
            });
            
            passwordInput.addEventListener('input', function() {
                this.parentElement.classList.remove('error');
            });
            
        });
    </script>
    
</body>
</html>

<?php
