@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold text-gray-900 mb-6">Dashboard</h1>

    <!-- Alertas Importantes -->
    <div class="mb-6 bg-white rounded-lg border border-gray-200 p-6 shadow-sm">
        <h2 class="text-lg font-semibold text-gray-900 mb-4">Alertas Importantes</h2>
        <div class="space-y-3">
            <div class="flex items-center text-red-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
                <span>15 materiales requieren reposición inmediata</span>
            </div>
            <div class="flex items-center text-yellow-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>8 materiales con bajo stock</span>
            </div>
            <div class="flex items-center text-blue-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                </svg>
                <span>3 órdenes pendientes de surtido prioritarias</span>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Materiales Críticos -->
        <div class="bg-white rounded-lg border border-gray-200 p-6 shadow-sm">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-sm font-medium text-gray-500">Materiales Críticos</p>
                    <h3 class="text-3xl font-bold mt-2 text-foundit-red">42</h3>
                    <p class="text-sm text-gray-500 mt-1">Requieren atención</p>
                </div>
                <div class="p-2 bg-red-50 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-foundit-red" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                </div>
            </div>
            <div class="mt-4 flex items-center text-sm font-medium text-red-600">
                <span>+8 desde ayer</span>
            </div>
        </div>

        <!-- Total Materiales -->
        <div class="bg-white rounded-lg border border-gray-200 p-6 shadow-sm">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-sm font-medium text-gray-500">Total Materiales</p>
                    <h3 class="text-3xl font-bold mt-2 text-foundit-blue">1,248</h3>
                    <p class="text-sm text-gray-500 mt-1">En inventario</p>
                </div>
                <div class="p-2 bg-blue-50 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-foundit-blue" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                    </svg>
                </div>
            </div>
            <div class="mt-4 flex items-center text-sm font-medium text-green-600">
                <span>98.5% precisión de inventario</span>
            </div>
        </div>

        <!-- Eficiencia de Surtido -->
        <div class="bg-white rounded-lg border border-gray-200 p-6 shadow-sm">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-sm font-medium text-gray-500">Eficiencia de Surtido</p>
                    <h3 class="text-3xl font-bold mt-2 text-foundit-blue">94%</h3>
                    <p class="text-sm text-gray-500 mt-1">Última semana</p>
                </div>
                <div class="p-2 bg-blue-50 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-foundit-blue" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
            <div class="mt-4 flex items-center text-sm font-medium text-green-600">
                <span>18 min. tiempo promedio</span>
            </div>
        </div>

        <!-- Materiales sin Movimiento -->
        <div class="bg-white rounded-lg border border-gray-200 p-6 shadow-sm">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-sm font-medium text-gray-500">Sin Movimiento</p>
                    <h3 class="text-3xl font-bold mt-2 text-yellow-600">156</h3>
                    <p class="text-sm text-gray-500 mt-1">+30 días sin movimiento</p>
                </div>
                <div class="p-2 bg-yellow-50 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
            <div class="mt-4 flex items-center text-sm font-medium text-yellow-600">
                <span>23 próximos a 60 días</span>
            </div>
        </div>
    </div>

    <!-- Resumen de Actividades -->
    <div class="mt-6 grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Actividades Pendientes -->
        <div class="bg-white rounded-lg border border-gray-200 p-6 shadow-sm">
            <h2 class="text-lg font-semibold text-gray-900 mb-4">Actividades Pendientes</h2>
            <div class="space-y-4">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="w-2 h-2 bg-red-500 rounded-full mr-3"></div>
                        <span class="text-sm">Reposición de materiales críticos</span>
                    </div>
                    <span class="text-sm text-red-500 font-medium">Urgente</span>
                </div>
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="w-2 h-2 bg-yellow-500 rounded-full mr-3"></div>
                        <span class="text-sm">Revisión de materiales sin movimiento</span>
                    </div>
                    <span class="text-sm text-yellow-500 font-medium">Hoy</span>
                </div>
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="w-2 h-2 bg-blue-500 rounded-full mr-3"></div>
                        <span class="text-sm">Inventario físico programado</span>
                    </div>
                    <span class="text-sm text-blue-500 font-medium">Esta semana</span>
                </div>
            </div>
        </div>

        <!-- Resumen de Rendimiento -->
        <div class="bg-white rounded-lg border border-gray-200 p-6 shadow-sm">
            <h2 class="text-lg font-semibold text-gray-900 mb-4">Resumen de Rendimiento</h2>
            <div class="space-y-4">
                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-600">Órdenes completadas (hoy)</span>
                    <span class="text-sm font-medium">24/26 (92%)</span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-600">Tiempo promedio de surtido</span>
                    <span class="text-sm font-medium">18 minutos</span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-600">Usuarios activos</span>
                    <span class="text-sm font-medium">12/15 conectados</span>
                </div>
            </div>
        </div>
    </div>
@endsection

