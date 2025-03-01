@extends('layouts.app')

@section('content')
    <div class="p-6">
        <!-- Header -->
        <div class="mb-6 flex justify-between items-center">
            <h1 class="text-2xl font-semibold text-foundit-blue">Gestión de Embarques</h1>
            <button onclick="openNewMaterialModal()" class="px-4 py-2 bg-foundit-blue text-white rounded-lg hover:bg-foundit-blue/90 transition-colors duration-150 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                Nuevo Material
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
                        <!-- Ejemplo de fila -->
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

    <!-- Modal de Historial -->
    <div id="historyModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50">
        <div class="bg-white rounded-lg max-w-2xl w-full">
            <div class="p-4 border-b border-gray-200 flex justify-between items-center">
                <h3 class="text-lg font-semibold text-foundit-blue">Historial de Movimientos</h3>
                <button onclick="closeHistoryModal()" class="text-gray-400 hover:text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="p-4">
                <div class="space-y-4">
                    <div class="flex items-center gap-4">
                        <div class="flex-shrink-0">
                            <div class="h-8 w-8 rounded-full bg-foundit-blue/10 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-foundit-blue" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                            </div>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-medium text-gray-900">Entrada de material</p>
                            <p class="text-sm text-gray-500">Cantidad: +500</p>
                            <p class="text-xs text-gray-400">01/03/2024 10:30 - Juan Pérez</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="p-4 border-t border-gray-200 bg-gray-50 rounded-b-lg">
                <button onclick="closeHistoryModal()" class="w-full px-4 py-2 bg-foundit-blue text-white rounded-lg hover:bg-foundit-blue/90 transition-colors duration-150">
                    Cerrar
                </button>
            </div>
        </div>
    </div>

    <!-- Modal de Edición -->
    <div id="editModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50">
        <div class="bg-white rounded-lg max-w-md w-full">
            <div class="p-4 border-b border-gray-200 flex justify-between items-center">
                <h3 class="text-lg font-semibold text-foundit-blue">Editar Material</h3>
                <button onclick="closeEditModal()" class="text-gray-400 hover:text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="p-4">
                <form class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Código</label>
                        <input type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-foundit-blue focus:ring-foundit-blue sm:text-sm" value="MAT001" readonly>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nombre del Material</label>
                        <input type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-foundit-blue focus:ring-foundit-blue sm:text-sm" value="Tornillos M4">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Categoría</label>
                        <select class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-foundit-blue focus:ring-foundit-blue sm:text-sm">
                            <option>Ferretería</option>
                            <option>Electrónica</option>
                            <option>Herramientas</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Cantidad</label>
                        <input type="number" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-foundit-blue focus:ring-foundit-blue sm:text-sm" value="1000">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Ubicación</label>
                        <input type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-foundit-blue focus:ring-foundit-blue sm:text-sm" value="A-01-02">
                    </div>
                </form>
            </div>
            <div class="p-4 border-t border-gray-200 bg-gray-50 rounded-b-lg flex justify-end gap-2">
                <button onclick="closeEditModal()" class="px-4 py-2 text-gray-700 hover:text-gray-900 transition-colors duration-150">
                    Cancelar
                </button>
                <button onclick="saveChanges()" class="px-4 py-2 bg-foundit-blue text-white rounded-lg hover:bg-foundit-blue/90 transition-colors duration-150">
                    Guardar Cambios
                </button>
            </div>
        </div>
    </div>

    <!-- Modal de Nuevo Material -->
    <div id="newMaterialModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50">
        <div class="bg-white rounded-lg max-w-md w-full">
            <div class="p-4 border-b border-gray-200 flex justify-between items-center">
                <h3 class="text-lg font-semibold text-foundit-blue">Nuevo Material</h3>
                <button onclick="closeNewMaterialModal()" class="text-gray-400 hover:text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="p-4">
                <form class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Código</label>
                        <input type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-foundit-blue focus:ring-foundit-blue sm:text-sm" placeholder="Ingrese código">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nombre del Material</label>
                        <input type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-foundit-blue focus:ring-foundit-blue sm:text-sm" placeholder="Ingrese nombre">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Categoría</label>
                        <select class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-foundit-blue focus:ring-foundit-blue sm:text-sm">
                            <option value="">Seleccione categoría</option>
                            <option>Ferretería</option>
                            <option>Electrónica</option>
                            <option>Herramientas</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Cantidad</label>
                        <input type="number" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-foundit-blue focus:ring-foundit-blue sm:text-sm" placeholder="0">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Ubicación</label>
                        <input type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-foundit-blue focus:ring-foundit-blue sm:text-sm" placeholder="Ej: A-01-02">
                    </div>
                </form>
            </div>
            <div class="p-4 border-t border-gray-200 bg-gray-50 rounded-b-lg flex justify-end gap-2">
                <button onclick="closeNewMaterialModal()" class="px-4 py-2 text-gray-700 hover:text-gray-900 transition-colors duration-150">
                    Cancelar
                </button>
                <button onclick="saveNewMaterial()" class="px-4 py-2 bg-foundit-blue text-white rounded-lg hover:bg-foundit-blue/90 transition-colors duration-150">
                    Guardar Material
                </button>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        // Funciones para los modales
        function openHistoryModal(code) {
            document.getElementById('historyModal').classList.remove('hidden');
        }

        function closeHistoryModal() {
            document.getElementById('historyModal').classList.add('hidden');
        }

        function openEditModal(code) {
            document.getElementById('editModal').classList.remove('hidden');
        }

        function closeEditModal() {
            document.getElementById('editModal').classList.add('hidden');
        }

        function openNewMaterialModal() {
            document.getElementById('newMaterialModal').classList.remove('hidden');
        }

        function closeNewMaterialModal() {
            document.getElementById('newMaterialModal').classList.add('hidden');
        }

        function saveChanges() {
            // Aquí iría la lógica para guardar cambios
            closeEditModal();
        }

        function saveNewMaterial() {
            // Aquí iría la lógica para guardar nuevo material
            closeNewMaterialModal();
        }
    </script>
    @endpush
@endsection

