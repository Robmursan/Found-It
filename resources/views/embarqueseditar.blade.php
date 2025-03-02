@extends('layouts.app')

@section('content')
<div class="p-6">
    <!-- Header -->
    <div class="mb-6">
        <h1 class="text-2xl font-semibold text-foundit-blue">Editar Material</h1>
        <p class="text-gray-600 mt-1">MAT001 - Tornillos M4</p>
    </div>

    <!-- Formulario de Edición -->
    <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-sm border border-gray-200">
        <form class="p-8">
            <div class="space-y-6">
                <!--  Material No editable -->
                <div>
                    <label class="block text-base font-medium text-gray-700 mb-2">
                        Código del Material
                    </label>
                    <input 
                        type="text" 
                        value="MAT001"
                        class="w-full h-12 text-lg rounded-lg bg-gray-50 border-gray-300 text-gray-500"
                        readonly
                    >
                </div>

                <!-- Material -->
                <div>
                    <label class="block text-base font-medium text-gray-700 mb-2">
                        Material
                    </label>
                    <input 
                        type="text" 
                        value="Tornillos M4"
                        class="w-full h-12 text-lg rounded-lg border-gray-300 focus:border-foundit-blue focus:ring-foundit-blue"
                        required
                    >
                </div>

                <!-- Categoría -->
                <div>
                    <label class="block text-base font-medium text-gray-700 mb-2">
                        Categoría
                    </label>
                    <select 
                        class="w-full h-12 text-lg rounded-lg border-gray-300 focus:border-foundit-blue focus:ring-foundit-blue"
                        required
                    >
                        <option value="ferreteria" selected>Ferretería</option>
                        <option value="electronica">Electrónica</option>
                        <option value="herramientas">Herramientas</option>
                    </select>
                </div>

                <!-- Cantidad -->
                <div>
                    <label class="block text-base font-medium text-gray-700 mb-2">
                        Cantidad
                    </label>
                    <input 
                        type="number" 
                        value="1000"
                        class="w-full h-12 text-lg rounded-lg border-gray-300 focus:border-foundit-blue focus:ring-foundit-blue"
                        min="0"
                        required
                    >
                </div>

                <!-- Ubicación Actual -->
                <div>
                    <label class="block text-base font-medium text-gray-700 mb-2">
                        Ubicación Actual
                    </label>
                    <input 
                        type="text" 
                        value="A-01-02"
                        class="w-full h-12 text-lg rounded-lg bg-gray-50 border-gray-300 text-gray-500"
                        readonly
                    >
                </div>
            </div>

            <!-- Botones de Acción -->
            <div class="flex justify-end space-x-4 mt-8 pt-6 border-t border-gray-200">
                <button 
                    type="button"
                    onclick="history.back()" 
                    class="px-6 py-3 text-lg font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50"
                >
                    Cancelar
                </button>
                <button 
                    type="submit"
                    class="px-6 py-3 text-lg font-medium text-white bg-foundit-blue rounded-lg hover:bg-foundit-blue/90"
                >
                    Guardar Cambios
                </button>
            </div>
        </form>
    </div>
</div>
@endsection