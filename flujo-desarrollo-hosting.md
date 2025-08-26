# 🔄 FLUJO DE TRABAJO: Desarrollo → GitHub → Hostinger

## 📝 **Proceso Actual (Manual)**

### 1. **Desarrollo Local**
```bash
# Hacer cambios en tu código
# Probar localmente
php artisan serve
```

### 2. **Subir a GitHub**
```bash
git add .
git commit -m "Descripción de los cambios"
git push origin main
```

### 3. **Desplegar a Hostinger (MANUAL)**
**Opción A: File Manager**
- Ve al panel de Hostinger
- Abre File Manager
- Sube los archivos modificados a `public_html`

**Opción B: FTP/SFTP**
- Usa FileZilla o WinSCP
- Conecta con credenciales de Hostinger
- Sube archivos modificados

**Opción C: Zip y extraer**
- Comprimir proyecto en ZIP
- Subir via File Manager
- Extraer en `public_html`

### 4. **Optimizar en Hostinger**
```bash
# Ejecutar en terminal de Hostinger (si disponible)
composer install --no-dev --optimize-autoloader
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

---

## 🚀 **Proceso Automatizado (GitHub Actions)**

### Requisitos:
1. **Configurar secretos en GitHub:**
   - `HOSTINGER_FTP_HOST` (ej: ftp.hostinger.com)
   - `HOSTINGER_FTP_USER` (tu usuario FTP)
   - `HOSTINGER_FTP_PASSWORD` (tu contraseña FTP)

### Flujo automático:
```bash
# Solo necesitas hacer esto:
git add .
git commit -m "Mi cambio"
git push origin main

# GitHub Actions automáticamente:
# 1. Descarga el código
# 2. Instala dependencias
# 3. Optimiza Laravel
# 4. Sube todo a Hostinger vía FTP
# 5. ¡Tu sitio se actualiza solo!
```

---

## ⚙️ **Configurar GitHub Actions**

### Paso 1: Crear secretos en GitHub
1. Ve a tu repositorio: https://github.com/leonarmeneses/moverslaredo
2. Settings → Secrets and variables → Actions
3. Agregar secretos:
   - `HOSTINGER_FTP_HOST`: tu servidor FTP de Hostinger
   - `HOSTINGER_FTP_USER`: tu usuario FTP
   - `HOSTINGER_FTP_PASSWORD`: tu contraseña FTP

### Paso 2: El archivo .github/workflows/deploy.yml ya está creado

### Paso 3: Probar
```bash
git add .
git commit -m "Configurar despliegue automático"
git push origin main
```

---

## 🎯 **Ventajas de Cada Método**

### **Manual:**
- ✅ Control total
- ✅ Sin configuración adicional
- ❌ Lento y repetitivo
- ❌ Propenso a errores

### **Automatizado:**
- ✅ Rápido (solo git push)
- ✅ Consistente
- ✅ Sin errores humanos
- ❌ Configuración inicial
- ❌ Dependes de GitHub Actions

---

## 🔧 **Información Necesaria para Automatizar**

Para configurar el despliegue automático, necesitas:

1. **Host FTP de Hostinger** (ej: `ftp.hostinger.com`)
2. **Usuario FTP** (generalmente tu usuario de hosting)
3. **Contraseña FTP** (tu contraseña de hosting)
4. **Directorio remoto** (generalmente `/public_html`)

¿Tienes acceso a esta información de tu cuenta de Hostinger?

---

**Recomendación:** Empezar con el método manual y luego configurar la automatización cuando tengas las credenciales FTP.
