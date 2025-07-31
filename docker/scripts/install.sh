#!/bin/bash

echo "🚀 Starting Order Admin E-commerce setup..."

# Create Laravel project if it doesn't exist
if [ ! -f "composer.json" ]; then
    echo "📦 Creating new Laravel project..."
    composer create-project laravel/laravel .
fi

# Install dependencies
echo "📦 Installing PHP dependencies..."
composer install

# Copy environment file
if [ ! -f ".env" ]; then
    echo "📋 Copying environment file..."
    cp .env.example .env
fi

# Generate application key
echo "🔑 Generating application key..."
php artisan key:generate

# Set proper permissions
echo "🔐 Setting proper permissions..."
chmod -R 775 storage bootstrap/cache

echo "✅ Setup completed! You can now run: docker-compose up -d" 