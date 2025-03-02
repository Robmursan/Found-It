@extends('layouts.app')

@section('content')
    <div class="p-6">
        <!-- Header -->
        <div class="mb-6 flex justify-between items-center">
            <h1 class="text-2xl font-semibold text-foundit-blue">Gestión de Surtido</h1>
            <form action="{{ route('surtsalida') }}" method="GET" id="surtirForm">
                <button type="submit" 
                        id="surtirButton"
                        disabled
                        class="px-4 py-2 bg-foundit-blue text-white rounded-lg hover:bg-foundit-blue/90 transition-colors duration-150 disabled:opacity-50 disabled:cursor-not-allowed">
                    Surtir Material
                </button>
            </form>
        </div>

        <!-- Búsqueda y Filtros -->
        <div class="mb-6 bg-white rounded-lg shadow-sm border border-gray-200 p-4">
            <div class="flex flex-col md:flex-row gap-4">
                <!-- Búsqueda -->
                <div class="flex-1">
                    <div class="relative flex">
                        <input 
                            type="text" 
                            placeholder="Buscar por código o nombre..."
                            class="w-full h-10 pl-10 pr-4 rounded-l-lg border border-gray-300 focus:border-foundit-blue focus:ring-foundit-blue"
                        >
                        <svg 
                            xmlns="http://www.w3.org/2000/svg" 
                            class="h-5 w-5 absolute left-3 top-2.5 text-gray-400"
                            fill="none" 
                            viewBox="0 0 24 24" 
                            stroke="currentColor"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                        <button 
                            type="button"
                            class="h-10 px-4 bg-foundit-blue text-white rounded-r-lg hover:bg-foundit-blue/90 transition-colors duration-150"
                        >
                            Buscar
                        </button>
                    </div>
                </div>

                <!-- Filtros -->
                <div class="flex flex-wrap gap-4">
                    <select class="h-10 rounded-lg border-gray-300 focus:border-foundit-blue focus:ring-foundit-blue">
                        <option value="">Todas las categorías</option>
                        <option value="ferreteria">Ferretería</option>
                        <option value="electronica">Electrónica</option>
                        <option value="herramientas">Herramientas</option>
                    </select>
                    <select class="h-10 rounded-lg border-gray-300 focus:border-foundit-blue focus:ring-foundit-blue">
                        <option value="">Ordenar por</option>
                        <option value="codigo">Código</option>
                        <option value="nombre">Nombre</option>
                        
                    </select>
                </div>
            </div>
        </div>

        <!-- Tabla de Materiales -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <input type="checkbox" 
                                       id="selectAll"
                                       class="rounded border-gray-300 text-foundit-blue focus:ring-foundit-blue"
                                       onchange="toggleAllCheckboxes(this)">
                            </th>
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
                            <td class="px-6 py-4 whitespace-nowrap">
                                <input type="checkbox" 
                                       name="selectedItems[]" 
                                       value="MAT001"
                                       class="material-checkbox rounded border-gray-300 text-foundit-blue focus:ring-foundit-blue"
                                       onchange="updateSurtirButton()">
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">MAT001</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Tornillos M4</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Ferretería</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">1000</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">A-01-02</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <button 
                                    type="button" 
                                    class="px-3 py-1 text-sm font-medium text-white bg-foundit-blue rounded-lg hover:bg-foundit-blue/90 flex items-center gap-1"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin">
                                        <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/>
                                        <circle cx="12" cy="10" r="3"/>
                                    </svg>
                                    Localizar
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        function toggleAllCheckboxes(source) {
            const checkboxes = document.getElementsByClassName('material-checkbox');
            for (let checkbox of checkboxes) {
                checkbox.checked = source.checked;
            }
            updateSurtirButton();
        }

        function updateSurtirButton() {
            const checkboxes = document.getElementsByClassName('material-checkbox');
            const surtirButton = document.getElementById('surtirButton');
            let checkedCount = 0;
            
            for (let checkbox of checkboxes) {
                if (checkbox.checked) checkedCount++;
            }
            
            surtirButton.disabled = checkedCount === 0;
        }
    </script>
@endsection