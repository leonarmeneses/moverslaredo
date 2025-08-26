<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} - Admin Panel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Font Awesome -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Custom Admin Styles -->
        <style>
            /* Enhanced responsive navigation styles */
            .admin-nav-responsive {
                backdrop-filter: blur(10px);
                -webkit-backdrop-filter: blur(10px);
            }

            /* Custom scrollbar */
            ::-webkit-scrollbar {
                width: 8px;
            }

            ::-webkit-scrollbar-track {
                background: #f1f1f1;
                border-radius: 8px;
            }

            ::-webkit-scrollbar-thumb {
                background: linear-gradient(180deg, #3b82f6, #1e40af);
                border-radius: 8px;
            }

            ::-webkit-scrollbar-thumb:hover {
                background: linear-gradient(180deg, #2563eb, #1d4ed8);
            }

            /* Enhanced smooth transitions */
            * {
                transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
            }

            /* Custom card styles */
            .admin-card {
                @apply bg-white rounded-xl shadow-lg border border-gray-100 hover:shadow-xl;
                transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
                backdrop-filter: blur(10px);
            }

            .admin-card:hover {
                transform: translateY(-2px);
                box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            }

            /* Enhanced mobile navigation styles */
            @media (max-width: 1024px) {
                .mobile-nav-enhanced {
                    background: linear-gradient(135deg, rgba(59, 130, 246, 0.95), rgba(29, 78, 216, 0.95));
                    backdrop-filter: blur(20px);
                    -webkit-backdrop-filter: blur(20px);
                }
            }

            /* Responsive text adjustments */
            @media (max-width: 640px) {
                .admin-nav-logo {
                    font-size: 1rem !important;
                }
                
                .admin-nav-subtitle {
                    font-size: 0.75rem !important;
                }
            }

            /* Loading states */
            .loading-overlay {
                background: linear-gradient(45deg, rgba(59, 130, 246, 0.1), rgba(147, 197, 253, 0.1));
                backdrop-filter: blur(5px);
            }

            /* Enhanced focus states for accessibility */
            .focus-enhanced:focus {
                outline: none;
                box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.5);
                border-color: #3b82f6;
            }

            /* Notification animations */
            @keyframes slideInRight {
                from {
                    transform: translateX(100%);
                    opacity: 0;
                }
                to {
                    transform: translateX(0);
                    opacity: 1;
                }
            }

            @keyframes fadeInUp {
                from {
                    transform: translateY(10px);
                    opacity: 0;
                }
                to {
                    transform: translateY(0);
                    opacity: 1;
                }
            }

            .slide-in-right {
                animation: slideInRight 0.3s ease-out;
            }

            .fade-in-up {
                animation: fadeInUp 0.4s ease-out;
            }

            /* Enhanced responsive grid */
            .admin-grid {
                display: grid;
                gap: 1.5rem;
                grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            }

            @media (max-width: 768px) {
                .admin-grid {
                    grid-template-columns: 1fr;
                    gap: 1rem;
                }
            }

            /* Mobile-first table responsiveness */
            .responsive-table {
                @apply w-full;
                min-width: 0;
            }

            @media (max-width: 768px) {
                .responsive-table thead {
                    display: none;
                }

                .responsive-table,
                .responsive-table tbody,
                .responsive-table tr,
                .responsive-table td {
                    display: block;
                }

                .responsive-table tr {
                    @apply border border-gray-200 rounded-lg mb-4 p-4;
                }

                .responsive-table td {
                    @apply border-none pb-2;
                    position: relative;
                    padding-left: 35%;
                }

                .responsive-table td:before {
                    content: attr(data-label);
                    position: absolute;
                    left: 6px;
                    width: 30%;
                    text-align: left;
                    font-weight: bold;
                    color: #374151;
                }
            }

            /* Enhanced button styles */
            .btn-admin {
                @apply px-4 py-2 rounded-lg font-medium transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2;
            }

            .btn-admin-primary {
                @apply btn-admin bg-blue-600 text-white hover:bg-blue-700 focus:ring-blue-500;
            }

            .btn-admin-secondary {
                @apply btn-admin bg-gray-200 text-gray-800 hover:bg-gray-300 focus:ring-gray-500;
            }

            .btn-admin-danger {
                @apply btn-admin bg-red-600 text-white hover:bg-red-700 focus:ring-red-500;
            }

            /* Dark mode support */
            @media (prefers-color-scheme: dark) {
                .admin-card {
                    @apply bg-gray-800 border-gray-700;
                }
            }

            /* Print styles */
            @media print {
                .admin-nav,
                .mobile-nav-enhanced {
                    display: none !important;
                }
                
                .admin-card {
                    box-shadow: none !important;
                    border: 1px solid #ccc !important;
                }
            }

            .admin-card:hover {
                transform: translateY(-2px);
            }

            /* Custom button styles */
            .btn-primary {
                @apply bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md hover:shadow-lg transform hover:-translate-y-0.5;
            }

            .btn-secondary {
                @apply bg-gradient-to-r from-gray-500 to-gray-600 hover:from-gray-600 hover:to-gray-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md hover:shadow-lg transform hover:-translate-y-0.5;
            }

            .btn-success {
                @apply bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md hover:shadow-lg transform hover:-translate-y-0.5;
            }

            .btn-danger {
                @apply bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md hover:shadow-lg transform hover:-translate-y-0.5;
            }

            /* Custom table styles */
            .admin-table {
                @apply w-full text-sm text-left text-gray-700;
            }

            .admin-table thead {
                @apply bg-gradient-to-r from-gray-50 to-gray-100 text-gray-900 font-semibold;
            }

            .admin-table th {
                @apply px-6 py-4 border-b border-gray-200;
            }

            .admin-table td {
                @apply px-6 py-4 border-b border-gray-100;
            }

            .admin-table tbody tr:hover {
                @apply bg-blue-50;
            }

            /* Status badges */
            .status-badge {
                @apply inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium;
            }

            .status-pending {
                @apply bg-yellow-100 text-yellow-800;
            }

            .status-paid {
                @apply bg-green-100 text-green-800;
            }

            .status-overdue {
                @apply bg-red-100 text-red-800;
            }

            /* Mobile responsive adjustments */
            @media (max-width: 768px) {
                .admin-card {
                    @apply mx-2;
                }

                .admin-table {
                    @apply text-xs;
                }

                .admin-table th,
                .admin-table td {
                    @apply px-3 py-2;
                }
            }
        </style>
    </head>
    <body class="font-sans antialiased bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen">
        <div class="min-h-screen">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow-md border-b border-gray-200">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                            {{ $header }}
                        </div>
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main class="pb-8">
                {{ $slot }}
            </main>
        </div>

        <!-- Loading overlay -->
        <div id="loading-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden items-center justify-center">
            <div class="bg-white rounded-lg p-6 flex items-center space-x-3">
                <div class="animate-spin rounded-full h-6 w-6 border-b-2 border-blue-600"></div>
                <span class="text-gray-700">Loading...</span>
            </div>
        </div>

        <!-- Success notification -->
        @if(session('success'))
        <div id="success-notification" class="fixed top-4 right-4 z-50 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg flex items-center space-x-2">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
            </svg>
            <span>{{ session('success') }}</span>
        </div>
        @endif

        <!-- Error notification -->
        @if(session('error'))
        <div id="error-notification" class="fixed top-4 right-4 z-50 bg-red-500 text-white px-6 py-3 rounded-lg shadow-lg flex items-center space-x-2">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
            </svg>
            <span>{{ session('error') }}</span>
        </div>
        @endif

        <script>
            // Enhanced admin navigation functionality
            document.addEventListener('DOMContentLoaded', function() {
                // Auto-hide notifications
                const notifications = document.querySelectorAll('#success-notification, #error-notification');
                notifications.forEach(notification => {
                    if (notification) {
                        notification.classList.add('slide-in-right');
                        setTimeout(() => {
                            notification.style.transform = 'translateX(100%)';
                            notification.style.opacity = '0';
                            setTimeout(() => notification.remove(), 300);
                        }, 5000);
                    }
                });

                // Enhanced mobile navigation
                const mobileMenuButton = document.querySelector('[data-mobile-menu]');
                const mobileMenu = document.querySelector('[data-mobile-menu-content]');
                
                if (mobileMenuButton && mobileMenu) {
                    mobileMenuButton.addEventListener('click', function() {
                        const isOpen = !mobileMenu.classList.contains('hidden');
                        if (isOpen) {
                            mobileMenu.classList.add('animate-fade-out');
                            setTimeout(() => {
                                mobileMenu.classList.add('hidden');
                                mobileMenu.classList.remove('animate-fade-out');
                            }, 150);
                        } else {
                            mobileMenu.classList.remove('hidden');
                            mobileMenu.classList.add('animate-fade-in');
                        }
                    });
                }

                // Close mobile menu when clicking outside
                document.addEventListener('click', function(event) {
                    if (mobileMenu && !mobileMenu.contains(event.target) && !mobileMenuButton?.contains(event.target)) {
                        if (!mobileMenu.classList.contains('hidden')) {
                            mobileMenu.classList.add('animate-fade-out');
                            setTimeout(() => {
                                mobileMenu.classList.add('hidden');
                                mobileMenu.classList.remove('animate-fade-out');
                            }, 150);
                        }
                    }
                });

                // Close mobile menu on escape key
                document.addEventListener('keydown', function(event) {
                    if (event.key === 'Escape' && mobileMenu && !mobileMenu.classList.contains('hidden')) {
                        mobileMenu.classList.add('animate-fade-out');
                        setTimeout(() => {
                            mobileMenu.classList.add('hidden');
                            mobileMenu.classList.remove('animate-fade-out');
                        }, 150);
                    }
                });

                // Enhanced table responsiveness
                const tables = document.querySelectorAll('table');
                tables.forEach(table => {
                    if (table.classList.contains('responsive-table')) {
                        const headers = table.querySelectorAll('thead th');
                        const rows = table.querySelectorAll('tbody tr');
                        
                        rows.forEach(row => {
                            const cells = row.querySelectorAll('td');
                            cells.forEach((cell, index) => {
                                if (headers[index]) {
                                    cell.setAttribute('data-label', headers[index].textContent.trim());
                                }
                            });
                        });
                    }
                });

                // Smooth scroll for anchor links
                document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                    anchor.addEventListener('click', function (e) {
                        e.preventDefault();
                        const target = document.querySelector(this.getAttribute('href'));
                        if (target) {
                            target.scrollIntoView({
                                behavior: 'smooth',
                                block: 'start'
                            });
                        }
                    });
                });

                // Enhanced form validation feedback
                const inputs = document.querySelectorAll('input, select, textarea');
                inputs.forEach(input => {
                    input.addEventListener('blur', function() {
                        if (this.hasAttribute('required') && !this.value.trim()) {
                            this.classList.add('border-red-300', 'focus:border-red-500', 'focus:ring-red-500');
                            this.classList.remove('border-gray-300', 'focus:border-blue-500', 'focus:ring-blue-500');
                        } else {
                            this.classList.remove('border-red-300', 'focus:border-red-500', 'focus:ring-red-500');
                            this.classList.add('border-gray-300', 'focus:border-blue-500', 'focus:ring-blue-500');
                        }
                    });
                });

                // Auto-resize textareas
                const textareas = document.querySelectorAll('textarea');
                textareas.forEach(textarea => {
                    textarea.addEventListener('input', function() {
                        this.style.height = 'auto';
                        this.style.height = this.scrollHeight + 'px';
                    });
                });

                // Initialize tooltips (if any)
                const tooltips = document.querySelectorAll('[data-tooltip]');
                tooltips.forEach(element => {
                    element.addEventListener('mouseenter', function() {
                        const tooltip = document.createElement('div');
                        tooltip.className = 'absolute z-50 px-2 py-1 text-sm text-white bg-gray-900 rounded shadow-lg';
                        tooltip.textContent = this.getAttribute('data-tooltip');
                        tooltip.id = 'tooltip-' + Math.random().toString(36).substr(2, 9);
                        
                        document.body.appendChild(tooltip);
                        
                        const rect = this.getBoundingClientRect();
                        tooltip.style.left = rect.left + 'px';
                        tooltip.style.top = (rect.top - tooltip.offsetHeight - 5) + 'px';
                        
                        this.addEventListener('mouseleave', function() {
                            tooltip.remove();
                        }, { once: true });
                    });
                });
            });

            // Loading overlay functions
            function showLoading() {
                const overlay = document.getElementById('loading-overlay');
                if (overlay) {
                    overlay.classList.remove('hidden');
                    overlay.classList.add('flex');
                }
            }

            function hideLoading() {
                const overlay = document.getElementById('loading-overlay');
                if (overlay) {
                    overlay.classList.add('hidden');
                    overlay.classList.remove('flex');
                }
            }

            // Form submission loading
            document.addEventListener('DOMContentLoaded', function() {
                const forms = document.querySelectorAll('form:not([data-no-loading])');
                forms.forEach(form => {
                    form.addEventListener('submit', function(e) {
                        const submitButton = form.querySelector('button[type="submit"]');
                        if (submitButton) {
                            submitButton.disabled = true;
                            submitButton.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Processing...';
                        }
                        showLoading();
                    });
                });
            });

            // Add CSS animations dynamically
            const style = document.createElement('style');
            style.textContent = `
                .animate-fade-in {
                    animation: fadeIn 0.2s ease-out;
                }
                
                .animate-fade-out {
                    animation: fadeOut 0.15s ease-in;
                }
                
                @keyframes fadeIn {
                    from { opacity: 0; transform: translateY(-10px); }
                    to { opacity: 1; transform: translateY(0); }
                }
                
                @keyframes fadeOut {
                    from { opacity: 1; transform: translateY(0); }
                    to { opacity: 0; transform: translateY(-10px); }
                }
                
                /* Enhanced focus styles for better accessibility */
                .focus-enhanced:focus {
                    outline: 2px solid #3b82f6;
                    outline-offset: 2px;
                }
                
                /* Mobile navigation enhancements */
                @media (max-width: 1024px) {
                    .mobile-nav-backdrop {
                        backdrop-filter: blur(8px);
                        -webkit-backdrop-filter: blur(8px);
                    }
                }
            `;
            document.head.appendChild(style);
        </script>
    </body>
</html>
