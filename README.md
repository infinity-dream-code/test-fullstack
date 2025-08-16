# 🚀 Fullstack Developer Challenge Test

A comprehensive employee attendance management system built with Laravel backend API and Laravel frontend, featuring CRUD operations for employees, departments, and attendance tracking.

## 📋 Case Study

A multinational company with over 50 employees needs an attendance management system for various divisions/departments. Due to the large number of employees, the company requires an Absence System to record and systematically evaluate employee discipline.

## 🏗️ Project Architecture

```
test-fullstack/
├── backend/     # Laravel REST API (Departments, Employees, Attendance)
└── frontend/    # Laravel Frontend (Blade Templates + API Consumer)
```

## ✨ Features

- **Employee Management**: Complete CRUD operations for employee data
- **Department Management**: Manage company departments and divisions  
- **Attendance System**: Digital check-in/check-out functionality
- **Attendance Reporting**: Filter logs by date range and department
- **RESTful API**: Clean API endpoints with proper HTTP methods
- **Documentation**: Auto-generated API documentation using Scribe

## 🛠️ Tech Stack

- **Backend**: Laravel 12.x (REST API)
- **Frontend**: Laravel 12.x (Blade Templates + HTTP Client)
- **Database**: MySQL 8.0+
- **Documentation**: Scribe API Documentation
- **Styling**: Bootstrap 5 / Tailwind CSS

## 📚 API Endpoints

### 🏢 Departments
| Method | Endpoint | Description |
|--------|----------|-------------|
| `GET` | `/api/departments` | Get all departments |
| `POST` | `/api/departments` | Create new department |
| `GET` | `/api/departments/{id}` | Get department by ID |
| `PUT` | `/api/departments/{id}` | Update department |
| `DELETE` | `/api/departments/{id}` | Delete department |

### 👥 Employees  
| Method | Endpoint | Description |
|--------|----------|-------------|
| `GET` | `/api/employee` | Get all employees |
| `POST` | `/api/employee` | Create new employee |
| `GET` | `/api/employee/{id}` | Get employee by ID |
| `PUT` | `/api/employee/{id}` | Update employee |
| `DELETE` | `/api/employee/{id}` | Delete employee |

### ⏰ Attendance
| Method | Endpoint | Description |
|--------|----------|-------------|
| `POST` | `/api/attendance/check-in` | Employee check-in |
| `POST` | `/api/attendance/check-out` | Employee check-out |
| `GET` | `/api/attendance/logs` | Get attendance logs with filters |

#### Attendance Log Filters
- `date_from`: Start date (YYYY-MM-DD)
- `date_to`: End date (YYYY-MM-DD)  
- `department_id`: Filter by department

## 🚀 Installation Guide

### Prerequisites
- PHP 8.1+
- Composer
- MySQL 8.0+

### 1. Clone Repository
```bash
git clone https://github.com/infinity-dream-code/test-fullstack.git
cd test-fullstack
```

### 2. Backend Setup

```bash
cd backend
cp .env.example .env
composer install
php artisan key:generate
```

#### Configure Environment
Edit `.env` file:
```env
APP_NAME="Laravel"
APP_URL=http://localhost:8000
APP_ENV=local
APP_DEBUG=true

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=backend_fullstack
DB_USERNAME=root
DB_PASSWORD=
```

#### Database Setup
```bash
# Create database
mysql -u root -p
CREATE DATABASE backend_fullstack;
EXIT;

# Run migrations
php artisan migrate
```

#### Start Backend Server
```bash
php artisan serve --port=8000
```
Backend will be available at: `http://localhost:8000`

### 3. Frontend Setup

```bash
cd ../frontend
cp .env.example .env
composer install
php artisan key:generate
```

#### Configure Environment
Edit `.env` file:
```env
APP_NAME="Fullstack Challenge Frontend"
APP_URL=http://localhost:9000
APP_ENV=local

BACKEND_API_URL=http://localhost:8000/api
```

#### Start Frontend Server
```bash
php artisan serve --port=9000
```
Frontend will be available at: `http://localhost:9000`

## 📖 API Documentation

### Generate Documentation
```bash
cd backend
composer require --dev knuckleswtf/scribe
php artisan vendor:publish --tag=scribe-config
php artisan scribe:generate
```

### Access Documentation
Visit: `http://localhost:8000/docs`

## 🎯 Usage Examples

### Employee Check-in
```bash
curl -X POST http://localhost:8000/api/attendance/check-in \
  -H "Content-Type: application/json" \
  -d '{"employee_id": "EMP001"}'
```

### Employee Check-out
```bash
curl -X POST http://localhost:8000/api/attendance/check-out \
  -H "Content-Type: application/json" \
  -d '{"employee_id": "EMP001"}'
```

### Get Attendance Logs
```bash
curl "http://localhost:8000/api/attendance/logs?date_from=2025-08-01&date_to=2025-08-16&department_id=1"
```

## 📊 Database Schema

### Employee Table
- `id` - Primary Key
- `employee_id` - Unique employee identifier (auto-generated: EMP001, EMP002, etc.)
- `department_id` - Foreign key to departments
- `name` - Employee full name
- `address` - Employee address 
- `created_at`, `updated_at`

### Departments Table  
- `id` - Primary Key
- `department_name` - Department name
- `max_clock_in_time` - Maximum allowed check-in time
- `max_clock_out_time` - Minimum required check-out time
- `created_at`, `updated_at`

### Attendance Table
- `id` - Primary Key
- `attendance_id` - UUID for attendance record
- `employee_id` - Foreign key to employees (employee_id field)
- `clock_in` - Check-in datetime
- `clock_out` - Check-out datetime (nullable)
- `created_at`, `updated_at`

### Attendance History Table
- `id` - Primary Key
- `employee_id` - Foreign key to employees
- `attendance_id` - Reference to attendance UUID
- `date_attendance` - Attendance date
- `attendance_type` - Type (1: Check-in, 2: Check-out)
- `description` - Action description
- `created_at`, `updated_at`

## 🔧 Development

### Project Structure
```
backend/
├── app/
│   ├── Http/Controllers/Api/
│   ├── Models/
│   └── Services/
├── database/
│   ├── migrations/
│   └── seeders/
└── routes/api.php

frontend/
├── app/Http/Controllers/
├── resources/views/
└── routes/web.php
```
