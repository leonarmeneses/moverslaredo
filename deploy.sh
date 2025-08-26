#!/bin/bash

# 🚀 Script de Despliegue para Hostinger
# Configuración basada en tu SSH: ssh -p 65002 u797192992@185.28.21.101

echo "🚀 Iniciando despliegue automático a Hostinger..."

# Configuración SSH de Hostinger
HOSTINGER_HOST="185.28.21.101"
HOSTINGER_PORT="65002"
HOSTINGER_USER="u797192992"
REPO_URL="https://github.com/leonarmeneses/moverslaredo.git"

echo "� Conectando a Hostinger via SSH..."

# Conectar por SSH y ejecutar comandos
ssh -p $HOSTINGER_PORT $HOSTINGER_USER@$HOSTINGER_HOST << 'EOF'
    echo "📁 Navegando al directorio web..."
    cd /home/u797192992/domains/moverslaredo.com/public_html
    
    echo "🔄 Verificando repositorio Git..."
    # Si es la primera vez, clonar el repositorio
    if [ ! -d ".git" ]; then
        echo "🆕 Primera instalación - Clonando repositorio..."
        git clone https://github.com/leonarmeneses/moverslaredo.git .
    else
        echo "🔄 Actualizando desde GitHub..."
        # Actualizar desde GitHub
        git pull origin main
    fi
    
    echo "📦 Instalando dependencias de Composer..."
    composer2 install --no-dev --optimize-autoloader
    
    echo "⚡ Optimizando Laravel para producción..."
    php artisan config:cache
    php artisan route:cache
    php artisan view:cache
    
    echo "🔗 Creando enlace de storage..."
    php artisan storage:link
    
    echo "🧹 Limpiando cache anterior..."
    php artisan cache:clear
    
    echo "✅ ¡Despliegue completado exitosamente!"
    echo "🌐 Tu sitio está actualizado en: https://moverslaredo.com"
EOF

echo "🎉 ¡Despliegue terminado desde tu máquina local!"
