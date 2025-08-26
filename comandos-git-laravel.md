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

1. **Antes de empezar a trabajar:**
   ```bash
   git pull origin main
   ```

2. **Después de hacer cambios:**
   ```bash
   git add .
   git commit -m "Descripción clara de los cambios"
   git push origin main
   ```

3. **Para trabajar en nueva funcionalidad:**
   ```bash
   git checkout -b nueva-funcionalidad
   # Hacer cambios...
   git add .
   git commit -m "Implementar nueva funcionalidad"
   git push -u origin nueva-funcionalidad
   ```

---

## 🔗 URLs Importantes

- **Repositorio GitHub:** https://github.com/leonarmeneses/moverslaredo.git
- **Clonar repositorio:** `git clone https://github.com/leonarmeneses/moverslaredo.git`

---

## 💡 Consejos

- Siempre hacer `git pull` antes de empezar a trabajar
- Hacer commits frecuentes con mensajes descriptivos
- Mantener el archivo `.env` en `.gitignore` (nunca subirlo a GitHub)
- Usar ramas para nuevas funcionalidades
- Probar cambios localmente antes de hacer push

---

**Fecha de creación:** ${new Date().toLocaleDateString()}
**Proyecto:** Movers Laredo Laravel Application
