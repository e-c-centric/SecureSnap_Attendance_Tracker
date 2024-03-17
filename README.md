# SecureSnap Attendance Tracker

Welcome to the SecureSnap Attendance Tracker project! This web-based application is designed to help schools efficiently record student attendance using a secure pin and picture system. The application allows users to register, log in, manage student information, track attendance, and handle course registrations. This README provides an overview of the project, installation instructions, and usage guidelines.

## Table of Contents
- [Introducuction](#introduction)
- [Features](#features)
- [Installation](#installation)
- [Usage](#usage)
- [Contributing](#contributing)

## Introduction
Did you know that despite the introduction of online attendance-taking apps, schools still struggle to ensure accurate attendance records? This is due to potential attendance fraud and privacy concerns associated with capturing real-time images of students during attendance marking.
This problem extends to Ashesi's attendance-taking system, which has no real way to verify that students were actually in class while taking attendance. Students regular take attendance while not in class yet.

## Solution
Secure Snap Tracker effectively addresses attendance issues by seamlessly integrating photo capture during the attendance process. Upon taking attendance, the camera activates for five seconds, capturing the user's face and storing the information securely. This feature enables instructors to reference the captured photo, providing clarity in case of any confusion regarding a user's attendance status.


## Link to repository
[SecureSnap_Attendance_Tracker](https://github.com/e-c-centric/SecureSnap_Attendance_Tracker.git)


## Features
The SecureSnap Attendance Tracker offers the following key features:

1. **Login Page**: Allows users to securely log into the system using their credentials.
2. **Register Page**: Provides a registration form for new users to create an account.
3. **Dashboard Page**: Serves as the main hub, providing an overview of the user's activities and navigation to other pages.
4. **Profile Page**: Allows users to view and update their personal information.
5. **Tracker Page**: Enables users to take a student's PIN and picture to record attendance.
6. **Photos Page**: Displays and manages temporarily stored pictures in the database.
7. **Attendance Page**: Shows recorded attendance for students, allowing users to manage and analyze attendance data.
8. **Course Registration Page**: Allows users to register students for courses.
9. **Student Registration Page**: Provides a form to register new students, including necessary information.
10. **Courses Page**: Displays available courses and allows users to manage course-related information.

## Installation
To install and run the SecureSnap Attendance Tracker, follow these steps:

1. Clone the project repository from [GitHub](https://github.com/e-c-centric/SecureSnap_Attendance_Tracker.git).
2. Move the project folder into the `htdocs` or `var/www/` folder of your preferred server (e.g., Apache).
3. Import the `SS2024.sql` file into your PHPMyAdmin or SQL server to create the necessary database.
4. Configure the database connection in the project's configuration file.
5. Start the server and ensure it is running without any errors.
6. Access the application by entering the URL of your server in your preferred web browser.

If you encounter any issues during the installation process or need further assistance, please don't hesitate to contact us.

## Usage
Once the installation process is complete and the server is running, follow these steps to use the SecureSnap Attendance Tracker:

1. Access the application using your preferred web browser.
2. On the login page, enter your credentials to log into the system.
3. If you don't have an account, click on the "Register" link to create a new account.
4. After logging in, you will be redirected to the dashboard page.
5. Navigate through the different pages using the navigation menu or sidebar.
6. Update your profile information on the profile page if needed.
7. Use the tracker page to record attendance by capturing a student's PIN and picture.
8. View and manage temporarily stored pictures on the photos page.
9. Monitor and manage student attendance on the attendance page.
10. Register students for courses on the course registration page.
11. Add new students to the system using the student registration page.
12. Manage courses and related information on the courses page.

## Contributing
We welcome contributions from the community to enhance the SecureSnap Attendance Tracker project. To contribute, follow these steps:

1. Fork the repository.
2. Create a new branch for your feature or bug fix.
3. Make your modifications and ensure they adhere to the project's coding style.
4. Write appropriate tests for your changes.
5. Commit your changes and push them to your forked repository.
6. Submit a pull request, detailing the changes you have made.

---