# 🚀 CONFIGURACIÓN DE DESPLIEGUE AUTOMÁTICO SSH - HOSTINGER

## 📋 Tu información SSH de Hostinger:
- **Host:** `185.28.21.101`
- **Puerto:** `65002`
- **Usuario:** `u797192992`
- **Comando completo:** `ssh -p 65002 u797192992@185.28.21.101`

---

## 🎯 **OPCIÓN 1: Despliegue Manual con Script**

### Paso 1: Hacer tu script ejecutable
```bash
# En Git Bash o PowerShell (si tienes SSH configurado)
chmod +x deploy.sh
./deploy.sh
```

### Paso 2: Usar el script cuando hagas cambios
```bash
# 1. Hacer cambios en tu código
# 2. Subir a GitHub
git add .
git commit -m "Mis cambios"
git push origin main

# 3. Ejecutar despliegue
./deploy.sh
```

---

## ⚡ **OPCIÓN 2: Despliegue Automático con GitHub Actions**

### Paso 1: Configurar secretos en GitHub

Ve a tu repositorio: https://github.com/leonarmeneses/moverslaredo

1. **Settings** → **Secrets and variables** → **Actions**
2. **New repository secret** y agregar:

```
HOSTINGER_SSH_HOST = 185.28.21.101
HOSTINGER_SSH_PORT = 65002
HOSTINGER_SSH_USER = u797192992
HOSTINGER_SSH_PASSWORD = [tu contraseña de Hostinger]
```

### Paso 2: El archivo de GitHub Actions ya está configurado
- Ubicación: `.github/workflows/deploy.yml`
- Se ejecutará automáticamente cada vez que hagas `git push origin main`

### Paso 3: Probar el despliegue automático
```bash
git add .
git commit -m "Configurar despliegue automático SSH"
git push origin main
```

---

## 🔧 **OPCIÓN 3: Configuración Manual Directa en Hostinger**

### Conectar y configurar por primera vez:
```bash
# Conectar a Hostinger
ssh -p 65002 u797192992@185.28.21.101

# Una vez conectado, ejecutar:
cd /home/u797192992/public_html

# Clonar tu repositorio
git clone https://github.com/leonarmeneses/moverslaredo.git .

# Instalar dependencias
composer install --no-dev --optimize-autoloader

# Optimizar Laravel
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan storage:link

# Verificar que todo funciona
php artisan about
```

### Para futuras actualizaciones:
```bash
# Conectar a Hostinger
ssh -p 65002 u797192992@185.28.21.101

# Actualizar código
cd /home/u797192992/public_html
git pull origin main

# Actualizar dependencias (si es necesario)
composer install --no-dev --optimize-autoloader

# Re-optimizar
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

---

## 📁 **Estructura esperada en Hostinger**

```
/home/u797192992/public_html/
├── app/
├── bootstrap/
├── config/
├── database/
├── public/
│   ├── index.php
│   ├── .htaccess
│   └── ...
├── resources/
├── routes/
├── storage/
├── vendor/
├── .env
├── artisan
├── composer.json
└── .git/
```

---

## ⚠️ **Importante: Archivo .env**

### El archivo `.env` en Hostinger debe tener:
```env
APP_NAME="MoversLaredo"
APP_ENV=production
APP_KEY=base64:15tB5CBoDME+lm4kLJ+Gq2mSZwj03bfDFSp/OnFIsxI=
APP_DEBUG=false
APP_URL=https://moverslaredo.com

# ... resto de tu configuración actual
```

### Verificar/crear .env en Hostinger:
```bash
# Conectar a Hostinger
ssh -p 65002 u797192992@185.28.21.101

# Navegar al directorio
cd /home/u797192992/public_html

# Copiar .env.example si no existe .env
cp .env.example .env

# Editar .env con tu configuración
nano .env
```

---

## 🎯 **Flujo Recomendado**

### Para desarrollo diario:
1. **Hacer cambios** en tu código local
2. **Probar localmente:** `php artisan serve`
3. **Subir a GitHub:** `git push origin main`
4. **Desplegar a Hostinger:** Automático (si configuraste GitHub Actions) o manual con `./deploy.sh`

### Primera configuración:
1. **Configurar secretos** en GitHub (para automatización)
2. **Conectar a Hostinger** via SSH
3. **Clonar repositorio** en `/home/u797192992/public_html`
4. **Configurar .env** para producción
5. **Optimizar Laravel** para producción

---

## 🚨 **Comandos de Emergencia**

### Si algo sale mal en Hostinger:
```bash
# Conectar
ssh -p 65002 u797192992@185.28.21.101

# Ir al directorio
cd /home/u797192992/public_html

# Resetear a última versión estable
git reset --hard origin/main

# Limpiar todo
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Re-optimizar
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

---

## ✅ **Verificar que todo funciona**

### Después del despliegue:
1. **Visitar:** https://moverslaredo.com
2. **Verificar rutas:** https://moverslaredo.com/quote
3. **Verificar admin:** https://moverslaredo.com/admin (si tienes acceso)

### Comandos de verificación en Hostinger:
```bash
# Estado de la aplicación
php artisan about

# Verificar rutas
php artisan route:list

# Verificar configuración
php artisan config:show app
```

---

**¿Cuál opción prefieres usar? ¿Manual con script o automático con GitHub Actions?**
