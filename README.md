# Sistema de Administración de Pedidos E-commerce

## 🎯 Descripción

Este es mi proyecto de administración de pedidos para e-commerce desarrollado en Laravel. Me enfoqué en crear una arquitectura robusta usando las mejores prácticas de Laravel.

## 🏗️ Arquitectura del Proyecto

### Lo que implementé:

1. **Tests First**: Empecé escribiendo tests para definir el comportamiento esperado
2. **Service Layer**: Creé un `OrderService` inyectado al contenedor de dependencias
3. **Eventos**: Implementé `OrderCreated` event para desacoplar lógica
4. **Observers**: Usé `OrderObserver` para hooks automáticos
5. **Jobs**: Agregué `SendOrderNotification` job para notificaciones asíncronas
6. **Listeners**: Creé `SendOrderNotificationListener` para manejar eventos

## 🚀 Cómo usar la API

### Crear una orden:
```bash
curl -X POST http://localhost:8000/api/create-order \
  -H "Content-Type: application/json" \
  -H "Accept: application/json" \
  -d '{
    "customer_name": "Juan Pérez",
    "customer_email": "juan.perez@email.com",
    "total": 150.50,
    "status": "pending"
  }'
```

### Obtener todas las órdenes:
```bash
curl -X GET http://localhost:8000/api/orders \
  -H "Accept: application/json"
```

### Obtener una orden específica:
```bash
curl -X GET http://localhost:8000/api/orders/1 \
  -H "Accept: application/json"
```

## 🛠️ Instalación

1. **Clonar y instalar dependencias:**
```bash
composer install
```

2. **Configurar base de datos:**
```bash
php artisan migrate
```

3. **Ejecutar tests:**
```bash
php artisan test
```

4. **Iniciar servidor:**
```bash
php artisan serve
```

## 📁 Estructura del Proyecto

```
app/
├── Events/OrderCreated.php           # Evento cuando se crea una orden
├── Http/Controllers/OrderController.php
├── Jobs/SendOrderNotification.php    # Job para notificaciones
├── Listeners/SendOrderNotificationListener.php
├── Models/Order.php
├── Observers/OrderObserver.php       # Observer para hooks automáticos
├── Services/OrderService.php         # Service layer inyectado
└── Providers/
    ├── AppServiceProvider.php        # Registro de servicios
    └── EventServiceProvider.php      # Registro de eventos
```

## 🧪 Tests

Todos los tests pasan ✅:
- `OrderControllerTest`: Tests de controlador
- `OrderServiceTest`: Tests de servicio
- `OrderEventTest`: Tests de eventos
- `ApiTest`: Tests de API

## 🔧 Problemas que resolví

**CSRF Token Issue**: Las rutas API tenían problemas con CSRF. Solucioné creando una ruta alternativa `/api/create-order` que funciona perfectamente.

## 🎯 Características Implementadas

- ✅ CRUD de órdenes
- ✅ Service Layer con inyección de dependencias
- ✅ Eventos y Listeners
- ✅ Observers para hooks automáticos
- ✅ Jobs para tareas asíncronas
- ✅ Tests completos
- ✅ API RESTful
- ✅ Docker configurado

## 🐳 Docker

El proyecto incluye configuración Docker completa:
- PHP 8.2
- MySQL
- Nginx
- Scripts de instalación automática

```bash
docker-compose up -d
```

## 📝 Notas

- Usé Laravel 11 con la nueva estructura de bootstrap
- Implementé TDD (Test Driven Development)
- Arquitectura limpia con separación de responsabilidades
- Eventos para desacoplar lógica de negocio
- Service layer para lógica de dominio

¡El proyecto está listo para producción! 🚀
