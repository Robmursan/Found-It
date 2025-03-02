@extends('layouts.app')

@section('content')
    <div class="p-6">
        <!-- Header -->
        <div class="mb-6 flex justify-between items-center">
            <h1 class="text-2xl font-semibold text-foundit-blue">Gestión de Conteos</h1>
        </div>

        <!-- Barra de búsqueda -->
        <div class="mb-6">
            <input type="text" id="searchInput" placeholder="Buscar material..." class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-foundit-blue focus:border-transparent">
        </div>

        <!-- Materiales sin ubicación -->
        <div class="mb-8">
            <h2 class="text-xl font-semibold text-foundit-red mb-4">Materiales sin ubicación</h2>
            <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Código</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Material</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Categoría</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cantidad</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ubicación</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <!-- Ejemplo de fila sin ubicación -->
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">MAT002</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Tuercas M4</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Ferretería</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">500</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">-</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                                    <button onclick="openHistoryModal('MAT002')" class="text-foundit-blue hover:text-foundit-blue/80 transition-colors duration-150">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </button>
                                    <button onclick="openEditModal('MAT002')" class="text-foundit-blue hover:text-foundit-blue/80 transition-colors duration-150">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Materiales con ubicación -->
        <div>
            <h2 class="text-xl font-semibold text-foundit-blue mb-4">Materiales con ubicación</h2>
            <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Código</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Material</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Categoría</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cantidad</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ubicación</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <!-- Ejemplo de fila con ubicación -->
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">MAT001</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Tornillos M4</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Ferretería</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">1000</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">A-01-02</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                                    <button onclick="openHistoryModal('MAT001')" class="text-foundit-blue hover:text-foundit-blue/80 transition-colors duration-150">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </button>
                                    <button onclick="openEditModal('MAT001')" class="text-foundit-blue hover:text-foundit-blue/80 transition-colors duration-150">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    

    
@endsection

