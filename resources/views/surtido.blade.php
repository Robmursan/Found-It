
@extends('layouts.app')

@section('content')
    <div class="p-6">
        <!-- Header -->
        <div class="mb-6 flex justify-between items-center">
            <h1 class="text-2xl font-semibold text-foundit-blue">Gestión de Surtido</h1>
            <button onclick="openSurtirModal()" class="px-4 py-2 bg-foundit-blue text-white rounded-lg hover:bg-foundit-blue/90 transition-colors duration-150">
                Surtir Material
            </button>
        </div>

        <!-- Tabla de Materiales -->
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
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">MAT001</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Tornillos M4</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Ferretería</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">1000</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">A-01-02</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                                <button onclick="openSurtirModal('MAT001')" class="text-foundit-blue hover:text-foundit-blue/80 transition-colors duration-150">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17l3-3m0 0l3 3m-3-3v6m0-6V7m0 6h-6m6 0h6" />
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal de Surtido -->
    <div id="surtirModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50">
        <div class="bg-white rounded-lg max-w-md w-full">
            <div class="p-4 border-b border-gray-200 flex justify-between items-center">
                <h3 class="text-lg font-semibold text-foundit-blue">Surtir Material</h3>
                <button onclick="closeSurtirModal()" class="text-gray-400 hover:text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="p-4">
                <form class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Código del Material</label>
                        <input type="text" id="surtirCodigo" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-foundit-blue focus:ring-foundit-blue sm:text-sm" readonly>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Cantidad a Surtir</label>
                        <input type="number" id="surtirCantidad" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-foundit-blue focus:ring-foundit-blue sm:text-sm">
                    </div>
                </form>
            </div>
            <div class="p-4 border-t border-gray-200 bg-gray-50 rounded-b-lg flex justify-end gap-2">
                <button onclick="closeSurtirModal()" class="px-4 py-2 text-gray-700 hover:text-gray-900 transition-colors duration-150">
                    Cancelar
                </button>
                <button onclick="confirmarSurtido()" class="px-4 py-2 bg-foundit-blue text-white rounded-lg hover:bg-foundit-blue/90 transition-colors duration-150">
                    Confirmar
                </button>
            </div>
        </div>
    </div>

   
@endsection