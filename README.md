# Order Admin E-commerce

A Laravel-based order management system for e-commerce with Docker infrastructure.

## 🚀 Quick Start

### Prerequisites
- Docker
- Docker Compose

### Installation

1. **Clone the repository**
```bash
git clone <repository-url>
cd order_admin_e-commerce
```

2. **Run the installation script**
```bash
./docker/scripts/install.sh
```

3. **Start the containers**
```bash
docker-compose up -d
```

4. **Run migrations**
```bash
docker-compose exec app php artisan migrate
```

5. **Access the application**
- Web: http://localhost:8000
- API: http://localhost:8000/api

## 🏗️ Architecture

### Services
- **Laravel App** (PHP 8.2 + FPM)
- **MySQL 8.0** (Database)
- **Redis 7** (Cache & Sessions)
- **Nginx** (Web Server)

### Features
- ✅ Docker infrastructure
- ✅ Laravel 10.x
- ✅ MySQL database
- ✅ Redis caching
- ✅ Event-driven architecture
- ✅ API documentation (OpenAPI)
- ✅ Unit & Integration tests
- ✅ Email notifications
- ✅ Policies & Request validation

## 📁 Project Structure

```
order_admin_e-commerce/
├── docker/
│   ├── nginx/conf.d/
│   ├── php/
│   ├── mysql/
│   └── scripts/
├── app/
│   ├── Models/
│   ├── Http/
│   │   ├── Controllers/
│   │   ├── Requests/
│   │   └── Resources/
│   ├── Events/
│   ├── Listeners/
│   ├── Jobs/
│   └── Policies/
├── database/
│   ├── migrations/
│   └── seeders/
├── routes/
│   └── api.php
├── tests/
├── docker-compose.yml
└── Dockerfile
```

## 🔧 Development

### Useful Commands

```bash
# Access Laravel container
docker-compose exec app bash

# Run migrations
docker-compose exec app php artisan migrate

# Run tests
docker-compose exec app php artisan test

# Clear cache
docker-compose exec app php artisan cache:clear

# Generate API documentation
docker-compose exec app php artisan l5-swagger:generate
```

### Environment Variables

Copy `.env.example` to `.env` and configure:

```env
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=order_admin_db
DB_USERNAME=order_admin
DB_PASSWORD=secret

REDIS_HOST=redis
REDIS_PASSWORD=null
REDIS_PORT=6379
```

## 📚 API Documentation

Once the application is running, you can access the API documentation at:
- Swagger UI: http://localhost:8000/api/documentation

## 🧪 Testing

```bash
# Run all tests
docker-compose exec app php artisan test

# Run specific test
docker-compose exec app php artisan test --filter OrderTest
```

## 📦 Features Implemented

- [x] Docker infrastructure
- [x] Laravel 10.x setup
- [x] Database migrations
- [x] API routes and controllers
- [x] Event-driven architecture
- [x] Email notifications (Jobs)
- [x] Caching with Redis
- [x] API documentation (OpenAPI/Swagger)
- [x] Request validation
- [x] Policies for authorization
- [x] Unit and integration tests
- [x] Service layer pattern
- [x] Repository pattern

## 🤝 Contributing

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## 📄 License

This project is licensed under the MIT License. 