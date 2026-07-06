 Wireless Network Performance Analyzer

Project Overview

The Wireless Network Performance Analyzer is a web-based application developed to monitor and analyze the performance of wireless networks in real time. The system measures key Quality of Service (QoS) metrics including latency, throughput, packet loss, signal strength, jitter, and bandwidth utilization. It provides network administrators with graphical visualizations, historical records, and alert notifications to support efficient network monitoring and troubleshooting.

This project was developed as part of the CSC 402 Final Year Project.

Objectives

The objectives of this project are to:

- Monitor wireless network performance in real time.
- Measure important QoS metrics.
- Display performance data through an interactive dashboard.
- Generate alerts when network performance exceeds predefined thresholds.
- Store historical performance records for future analysis.
- Present graphical representations of network performance trends.

Features

- User Authentication (Login & Logout)
- Real-Time Network Monitoring
- Dashboard displaying:
  - Latency
  - Throughput
  - Packet Loss
  - Signal Strength
  - Jitter
  - Bandwidth Utilization
- Automatic Network Alerts
- Historical Performance Records
- Interactive Graphs using Chart.js
- MySQL Database Integration

Technologies Used

- PHP
- MySQL
- HTML5
- CSS3
- JavaScript
- Chart.js
- XAMPP

System Requirements

- XAMPP (Apache & MySQL)
- PHP 8.x or later
- MySQL
- Modern Web Browser

Installation Guide

1. Clone the repository
 bash
git clone https://github.com/SithembisO00625/wireless-network-performance-analyzer

Or download the ZIP file.

2. Copy the project

Place the project folder inside:

xampp/htdocs/

3. Import the database

- Open phpMyAdmin
- Create a database named:

network-analyzer

- Import the file:

database.sql
4. Start XAMPP

Start:
- Apache
- MySQL

5. Open the application

http://localhost/network-analyzer/login.php

Default Login Credentials

Username

admin

Password

admin123

 Screenshots

Login
<img width="605" height="335" alt="login" src="https://github.com/user-attachments/assets/78ec4357-c80e-4ca5-b540-1adf902fa052" />

Dashboard

<img width="1854" height="918" alt="metrics card" src="https://github.com/user-attachments/assets/97c46c9c-01b7-4b45-9b34-33ac7516d7ac" />

Performance Graph

<img width="1834" height="801" alt="latency graph" src="https://github.com/user-attachments/assets/821bce8a-6b8f-483a-a3e6-54188f262345" />

Historical table measurements

<img width="944" height="628" alt="perform table" src="https://github.com/user-attachments/assets/05c693eb-9756-44b1-8e68-d0e97e957ce0" />

Test Results

<img width="1105" height="475" alt="system testing" src="https://github.com/user-attachments/assets/63f4fb20-9395-43a4-b975-bf5b104d9b14" />

Project Structure

wireless-network-performance-analyzer/

│── db.php
│── login.php
│── logout.php
│── index.php
│── ping.php
│── test_results.php
│── style.css
│── database.sql
│── README.md

 Future Improvements

Future versions of the system may include:

- Secure password hashing
- Email notifications
- Multi-user authentication
- Mobile application support
- AI-based network performance prediction
- Cloud deployment
- Role-based access control


  
Author

Name: Sithembiso Hlophe
Student identification number: 202203678
Bachelor of Science in Computer Science Education
CSC 402 Final Year Project

License

This project is developed for educational purposes.

MIT License.
