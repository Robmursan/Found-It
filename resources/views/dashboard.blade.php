@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold text-gray-900 mb-6">Dashboard</h1>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Total Materiales -->
        <div class="bg-white rounded-lg border border-gray-200 p-6 shadow-sm">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-sm font-medium text-gray-500">Materiales Totales</p>
                    <h3 class="text-3xl font-bold mt-2">1,248</h3>
                </div>
                <div class="p-2 bg-gray-50 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                    </svg>
                </div>
            </div>
            <div class="mt-4 text-sm font-medium text-green-600">
                +12.5% ↑
            </div>
        </div>

        <!-- Materiales Críticos -->
        <div class="bg-white rounded-lg border border-gray-200 p-6 shadow-sm">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-sm font-medium text-gray-500">Materiales Críticos</p>
                    <h3 class="text-3xl font-bold mt-2">42</h3>
                </div>
                <div class="p-2 bg-gray-50 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                </div>
            </div>
            <div class="mt-4 text-sm font-medium text-red-600">
                -8.1% ↓
            </div>
        </div>

        <!-- Estantes Ocupados -->
        <div class="bg-white rounded-lg border border-gray-200 p-6 shadow-sm">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-sm font-medium text-gray-500">Estantes Ocupados</p>
                    <h3 class="text-3xl font-bold mt-2">86%</h3>
                </div>
                <div class="p-2 bg-gray-50 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                </div>
            </div>
            <div class="mt-4 text-sm font-medium text-green-600">
                +2.3% ↑
            </div>
        </div>

        <!-- Usuarios Registrados -->
        <div class="bg-white rounded-lg border border-gray-200 p-6 shadow-sm">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-sm font-medium text-gray-500">Usuarios Registrados</p>
                    <h3 class="text-3xl font-bold mt-2">24</h3>
                </div>
                <div class="p-2 bg-gray-50 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </div>
            </div>
            <div class="mt-4 text-sm font-medium text-green-600">
                +4 ↑
            </div>
        </div>
    </div>

    <!-- Charts -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
        <!-- Materiales Críticos Chart -->
        <div class="bg-white rounded-lg border border-gray-200 shadow-sm">
            <div class="p-6">
                <h2 class="text-lg font-semibold text-gray-900">Materiales Críticos</h2>
                <p class="text-sm text-gray-500">Materiales con bajo stock</p>
            </div>
            <div class="p-6 border-t border-gray-200">
                <div class="h-80 flex items-center justify-center text-gray-400">
                    Gráfico de materiales críticos
                </div>
            </div>
        </div>

        <!-- Distribución de Materiales Chart -->
        <div class="bg-white rounded-lg border border-gray-200 shadow-sm">
            <div class="p-6">
                <h2 class="text-lg font-semibold text-gray-900">Distribución de Materiales</h2>
                <p class="text-sm text-gray-500">Por categoría</p>
            </div>
            <div class="p-6 border-t border-gray-200">
                <div class="h-80 flex items-center justify-center text-gray-400">
                    Gráfico de distribución de materiales
                </div>
            </div>
        </div>
    </div>
@endsection

