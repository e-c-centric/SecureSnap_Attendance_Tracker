CREATE TABLE Users (
    UserID INT PRIMARY KEY AUTO_INCREMENT,
    Name VARCHAR(255) NOT NULL,
    Email VARCHAR(255) UNIQUE,
    Password VARCHAR(255),
    UserType ENUM('student', 'faculty', 'faculty_intern') NOT NULL
);

CREATE TABLE Students (
    StudentID INT PRIMARY KEY,
    Major VARCHAR(255),
    YearGroup INT
);

CREATE TABLE Departments (
    DepartmentID INT PRIMARY KEY AUTO_INCREMENT,
    DepartmentName VARCHAR(255) NOT NULL
);

CREATE TABLE Faculty (
    FacultyID INT PRIMARY KEY,
    DepartmentID INT,
    FOREIGN KEY (DepartmentID) REFERENCES Departments(DepartmentID)
);


CREATE TABLE FacultyInterns (
    FacultyInternID INT PRIMARY KEY
);

CREATE TABLE Courses (
    CourseID INT PRIMARY KEY AUTO_INCREMENT,
    CourseName VARCHAR(255) NOT NULL,
    FacultyID INT,
    FacultyInternID INT,
    CourseDescription TEXT,
    ClassDays VARCHAR(255),
    ClassTimes VARCHAR(255),
    AttendancePin VARCHAR(10),
    FOREIGN KEY (FacultyID) REFERENCES Faculty(FacultyID),
    FOREIGN KEY (FacultyInternID) REFERENCES FacultyInterns(FacultyInternID)
);

CREATE TABLE StudentCourses (
    StudentID INT,
    CourseID INT,
    PRIMARY KEY (StudentID, CourseID),
    FOREIGN KEY (StudentID) REFERENCES Students(StudentID),
    FOREIGN KEY (CourseID) REFERENCES Courses(CourseID)
);

INSERT INTO Departments (DepartmentName) VALUES 
    ('CSIS'),
    ('HSS'),
    ('BUSA'),
    ('ENGR');

ALTER TABLE Users MODIFY COLUMN UserType ENUM('student', 'faculty', 'faculty_intern', 'admin') NOT NULL;

INSERT INTO Users (Name, Email, Password, UserType)
VALUES ('Elikem Gale-Zoyiku', 'elikem.gale-zoyiku@ashesi.edu.gh', 'EATprof@2002', 'admin');
