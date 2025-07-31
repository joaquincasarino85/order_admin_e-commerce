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
7. **OpenAPI/Swagger**: Documentación automática de la API con anotaciones
8. **Caché con Redis**: Implementé caché en el Service Layer para optimizar consultas
9. **Request Classes**: Validación de datos con `StoreOrderRequest` y reglas separadas

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

## 📚 Documentación de la API

### Swagger/OpenAPI
- **URL de documentación:** `http://localhost:8000/api/documentation`
- **JSON de la API:** `http://localhost:8000/docs`

La documentación se genera automáticamente desde las anotaciones en el controlador:
```php
/**
 * @OA\Post(
 *     path="/api/orders",
 *     summary="Crear una nueva orden",
 *     tags={"Orders"},
 *     @OA\RequestBody(...)
 *     @OA\Response(...)
 * )
 */
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

4. **Generar documentación Swagger:**
```bash
php artisan l5-swagger:generate
```

5. **Iniciar servidor:**
```bash
php artisan serve
```

## 📁 Estructura del Proyecto

```
app/
├── Events/OrderCreated.php           # Evento cuando se crea una orden
├── Http/
│   ├── Controllers/OrderController.php
│   └── Requests/StoreOrderRequest.php # Validación de datos
├── Jobs/SendOrderNotification.php    # Job para notificaciones
├── Listeners/SendOrderNotificationListener.php
├── Models/Order.php
├── Observers/OrderObserver.php       # Observer para hooks automáticos
├── Rules/OrderValidationRules.php    # Reglas de validación separadas
├── Services/OrderService.php         # Service layer con caché
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

## ⚡ Optimizaciones Implementadas

### Caché con Redis
Implementé caché en el Service Layer para optimizar consultas:

```php
// OrderService.php
public function getOrder(int $id): ?Order
{
    return Cache::remember("order.{$id}", 3600, function () use ($id) {
        return Order::find($id);
    });
}
```

**Beneficios:**
- ✅ Primera consulta → DB
- ✅ Consultas siguientes → Caché (más rápido)
- ✅ Se borra automáticamente después de 1 hora
- ✅ Reduce consultas redundantes a la base de datos

### Validación con Request Classes
Creé un sistema de validación organizado:

```php
// OrderValidationRules.php - Reglas separadas
public static function store(): array
{
    return [
        'customer_name' => 'required|string|max:255',
        'customer_email' => 'required|email|max:255',
        'total' => 'required|numeric|min:0',
        'status' => 'required|string|in:pending,processing,completed,cancelled',
    ];
}
```

**Ventajas:**
- ✅ Reglas reutilizables
- ✅ Mensajes personalizados en español
- ✅ Separación de responsabilidades
- ✅ Fácil mantenimiento

## 🎯 Características Implementadas

- ✅ CRUD de órdenes
- ✅ Service Layer con inyección de dependencias
- ✅ Eventos y Listeners
- ✅ Observers para hooks automáticos
- ✅ Jobs para tareas asíncronas
- ✅ Tests completos
- ✅ API RESTful
- ✅ **OpenAPI/Swagger** - Documentación automática
- ✅ **Caché con Redis** - Optimización de consultas
- ✅ **Request Classes** - Validación organizada
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
- **Swagger para documentación automática**
- **Caché para optimización de performance**
- **Request classes para validación robusta**

¡El proyecto está listo para producción! 🚀
