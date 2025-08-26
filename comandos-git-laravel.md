# Comandos para Proyecto Laravel - Movers Laredo

## 🔄 Comandos Git Básicos

### Verificar estado del repositorio
```bash
git status
```

### Ver historial de commits
```bash
git log --oneline
```

### Agregar archivos al staging
```bash
# Agregar todos los archivos
git add .

# Agregar archivo específico
git add nombre_archivo.php
```

### Crear commit
```bash
git commit -m "Descripción de los cambios"
```

### Subir cambios a GitHub
```bash
git push origin main
```

### Descargar cambios de GitHub
```bash
git pull origin main
```

### Ver remotos configurados
```bash
git remote -v
```

---

## 🌿 Comandos de Ramas (Branches)

### Ver ramas locales
```bash
git branch
```

### Crear nueva rama
```bash
git checkout -b nombre-nueva-rama
```

### Cambiar de rama
```bash
git checkout nombre-rama
```

### Subir nueva rama a GitHub
```bash
git push -u origin nombre-rama
```

### Eliminar rama local
```bash
git branch -d nombre-rama
```

---

## 📋 Comandos Laravel

### Instalar dependencias
```bash
composer install
```

### Actualizar dependencias
```bash
composer update
```

### Ejecutar migraciones
```bash
php artisan migrate
```

### Crear nueva migración
```bash
php artisan make:migration nombre_migracion
```

### Crear controlador
```bash
php artisan make:controller NombreController
```

### Crear modelo
```bash
php artisan make:model NombreModelo
```

### Crear modelo con migración
```bash
php artisan make:model NombreModelo -m
```

### Limpiar cache
```bash
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

### Ejecutar servidor de desarrollo
```bash
php artisan serve
```

### Ejecutar servidor en puerto específico
```bash
php artisan serve --port=8001
```

### Generar clave de aplicación
```bash
php artisan key:generate
```

### Crear seeder
```bash
php artisan make:seeder NombreSeeder
```

### Ejecutar seeders
```bash
php artisan db:seed
```

### Crear factory
```bash
php artisan make:factory NombreFactory
```

---

## 🔧 Comandos de Configuración

### Verificar versión de PHP
```bash
php --version
```

### Verificar versión de Composer
```bash
composer --version
```

### Verificar sintaxis de archivo PHP
```bash
php -l ruta/al/archivo.php
```

### Instalar paquete de Composer
```bash
composer require nombre/paquete
```

### Remover paquete de Composer
```bash
composer remove nombre/paquete
```

---

## 📁 Comandos de Archivos y Directorios

### Listar archivos
```bash
dir
```

### Navegar a directorio
```bash
cd ruta/del/directorio
```

### Crear directorio
```bash
mkdir nombre_directorio
```

### Copiar archivos
```bash
copy origen destino
```

### Mover/renombrar archivos
```bash
move origen destino
```

---

## 🚀 Comandos para Despliegue

### Optimizar aplicación para producción
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
composer install --optimize-autoloader --no-dev
```

### Limpiar optimizaciones
```bash
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

---

## 🆘 Comandos de Emergencia

### Restaurar archivo desde último commit
```bash
git checkout -- nombre_archivo.php
```

### Deshacer último commit (mantener cambios)
```bash
git reset --soft HEAD~1
```

### Ver diferencias con último commit
```bash
git diff HEAD
```

### Stash cambios temporalmente
```bash
# Guardar cambios
git stash

# Recuperar cambios
git stash pop
```

---

## 📝 Flujo de Trabajo Típico

### **Para desarrollo local:**
1. **Antes de empezar a trabajar:**
   ```bash
   git pull origin main
   ```

2. **Desarrollo y pruebas locales:**
   ```bash
   php artisan serve
   # Probar en http://localhost:8000
   ```

3. **Después de hacer cambios:**
   ```bash
   git add .
   git commit -m "Descripción clara de los cambios"
   git push origin main
   ```

4. **Desplegar a Hostinger:**
   ```bash
   # Opción 1: Script automático
   ./deploy.sh
   
   # Opción 2: Manual
   ssh -p 65002 u797192992@185.28.21.101 "cd domains/moverslaredo.com/public_html && git pull origin main && php artisan config:cache"
   ```

### **Para trabajar en nueva funcionalidad:**
1. **Crear nueva rama:**
   ```bash
   git checkout -b nueva-funcionalidad
   ```

2. **Desarrollar y probar:**
   ```bash
   # Hacer cambios...
   php artisan serve
   git add .
   git commit -m "Implementar nueva funcionalidad"
   ```

3. **Subir rama y crear Pull Request:**
   ```bash
   git push -u origin nueva-funcionalidad
   # Crear PR en GitHub para revisar antes de merge
   ```

4. **Después del merge a main:**
   ```bash
   git checkout main
   git pull origin main
   ./deploy.sh  # Desplegar a producción
   ```

### **Para emergencias y rollbacks:**
1. **Verificar último commit estable:**
   ```bash
   git log --oneline
   ```

2. **Rollback en producción:**
   ```bash
   # En Hostinger, volver a commit específico
   ssh -p 65002 u797192992@185.28.21.101 "cd domains/moverslaredo.com/public_html && git reset --hard COMMIT_HASH && php artisan config:cache"
   ```

---

## 🔗 URLs y Conexiones Importantes

- **Repositorio GitHub:** https://github.com/leonarmeneses/moverslaredo.git
- **Clonar repositorio:** `git clone https://github.com/leonarmeneses/moverslaredo.git`
- **Sitio Web LIVE:** https://moverslaredo.com

### 🔌 **Conexión SSH Hostinger**
```bash
# Conectar a Hostinger
ssh -p 65002 u797192992@185.28.21.101

# Información de conexión:
# Host: 185.28.21.101
# Puerto: 65002
# Usuario: u797192992
# Directorio del proyecto: /home/u797192992/domains/moverslaredo.com/public_html
```

---

## 🚀 **Comandos Específicos de Despliegue Hostinger**

### Actualizar proyecto en Hostinger
```bash
# Conectar y actualizar en una línea
ssh -p 65002 u797192992@185.28.21.101 "cd domains/moverslaredo.com/public_html && git pull origin main && php artisan config:cache"

# O conectar y ejecutar paso a paso:
ssh -p 65002 u797192992@185.28.21.101
cd domains/moverslaredo.com/public_html
git pull origin main
composer2 install --no-dev --optimize-autoloader
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### Script de despliegue automático
```bash
# Ejecutar script desde tu computadora local
./deploy.sh

# Contenido del script deploy.sh:
# - Conecta a Hostinger via SSH
# - Actualiza código desde GitHub
# - Instala dependencias con Composer 2
# - Optimiza Laravel para producción
```

### Verificar estado en Hostinger
```bash
# Verificar aplicación Laravel
ssh -p 65002 u797192992@185.28.21.101 "cd domains/moverslaredo.com/public_html && php artisan about"

# Verificar estado de Git
ssh -p 65002 u797192992@185.28.21.101 "cd domains/moverslaredo.com/public_html && git status"

# Ver logs de errores
ssh -p 65002 u797192992@185.28.21.101 "cd domains/moverslaredo.com/public_html && tail -f storage/logs/laravel.log"
```

---

## 💡 Consejos

### **Desarrollo:**
- Siempre hacer `git pull` antes de empezar a trabajar
- Hacer commits frecuentes con mensajes descriptivos
- Probar cambios localmente con `php artisan serve` antes de subir
- Usar ramas para nuevas funcionalidades grandes

### **Seguridad:**
- Mantener el archivo `.env` en `.gitignore` (nunca subirlo a GitHub)
- Usar diferentes configuraciones para desarrollo y producción
- Nunca hardcodear credenciales en el código

### **Hostinger específico:**
- Usar `composer2` en lugar de `composer` (Hostinger tiene ambos)
- El directorio del proyecto es: `/home/u797192992/domains/moverslaredo.com/public_html`
- Siempre ejecutar `php artisan config:cache` después de cambios
- El comando SSH completo es: `ssh -p 65002 u797192992@185.28.21.101`

### **Comandos útiles en producción:**
```bash
# Limpiar todos los caches
php artisan cache:clear && php artisan config:clear && php artisan route:clear && php artisan view:clear

# Re-optimizar todo
php artisan config:cache && php artisan route:cache && php artisan view:cache

# Verificar permisos de storage
chmod -R 775 storage bootstrap/cache

# Ver espacio en disco
df -h

# Ver procesos PHP activos
ps aux | grep php
```

### **Monitoreo y debugging:**
```bash
# Ver logs en tiempo real
tail -f storage/logs/laravel.log

# Verificar configuración de email
php artisan tinker
>> Mail::raw('Test', function($message) { $message->to('test@example.com')->subject('Test'); });

# Verificar rutas funcionando
curl -I https://moverslaredo.com
curl -I https://moverslaredo.com/quote
```

---

**Fecha de creación:** 25 de agosto de 2025  
**Proyecto:** Movers Laredo Laravel Application  
**Hosting:** Hostinger (SSH habilitado)  
**Dominio:** https://moverslaredo.com  
**GitHub:** https://github.com/leonarmeneses/moverslaredo  

**SSH Hostinger:** `ssh -p 65002 u797192992@185.28.21.101`  
**Directorio proyecto:** `/home/u797192992/domains/moverslaredo.com/public_html`  

---

## 🆘 **COMANDOS DE EMERGENCIA**

### Si el sitio no carga:
```bash
# Conectar a Hostinger
ssh -p 65002 u797192992@185.28.21.101

# Ir al proyecto
cd domains/moverslaredo.com/public_html

# Verificar estado
php artisan about
git status

# Limpiar y re-optimizar
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
composer2 install --no-dev --optimize-autoloader
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Verificar permisos
chmod -R 775 storage bootstrap/cache
```

### Si hay errores de Git:
```bash
# Reset completo al último commit de GitHub
git fetch origin
git reset --hard origin/main
git clean -fd

# Re-optimizar Laravel
php artisan config:cache
```

### Contactos de emergencia:
- **Hostinger Support:** Panel de control → Support
- **GitHub Issues:** https://github.com/leonarmeneses/moverslaredo/issues
- **Laravel Docs:** https://laravel.com/docs
