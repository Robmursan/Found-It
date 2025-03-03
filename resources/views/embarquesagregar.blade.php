@extends('layouts.app')

@section('content')
<div class="p-6">
    <!-- Header -->
    <div class="mb-6">
        <h1 class="text-2xl font-semibold text-foundit-blue">Agregar Embarque</h1>
        <p class="text-gray-600 mt-1">Ingrese los detalles del nuevo embarque</p>
    </div>

    <!-- Formulario de Nuevo Embarque -->
    <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-sm border border-gray-200">
        <form action="/api/materialCreate?" method="post" class="p-8">
            @csrf
            <div class="space-y-6">
                <!-- Código del Material -->
                <div>
                    <label class="block text-base font-medium text-gray-700 mb-2">
                        Código del Material
                    </label>
                    <input 
                        type="text" 
                        name="codigo" {{-- atributo de DB --}}
                        placeholder="Ingrese el código del material"
                        class="w-full h-12 text-lg rounded-lg border-gray-300 focus:border-foundit-blue focus:ring-foundit-blue"
                        required
                    >
                </div>

                <!-- Material -->
                <div>
                    <label class="block text-base font-medium text-gray-700 mb-2">
                        Material
                    </label>
                    <input 
                        type="text" 
                        name="nombre" {{-- atributo de DB --}}
                        placeholder="Ingrese el nombre del material"
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
                        name="categoria" {{-- atributo de DB --}}
                        class="w-full h-12 text-lg rounded-lg border-gray-300 focus:border-foundit-blue focus:ring-foundit-blue"
                        required
                    >
                        <option value="" disabled selected>Seleccione una categoría</option>
                        <option value="ferreteria">Ferretería</option>
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
                        name="cantidad" {{-- atributo de DB --}}
                        placeholder="Ingrese la cantidad"
                        class="w-full h-12 text-lg rounded-lg border-gray-300 focus:border-foundit-blue focus:ring-foundit-blue"
                        min="1"
                        required
                    >
                </div>

                <!-- Ubicación (Deshabilitada) -->
                <div>
                    <label class="block text-base font-medium text-gray-700 mb-2">
                        Ubicación
                    </label>
                    <input 
                        type="text" 
                        placeholder="Pendiente de asignar en área de conteo"
                        class="w-full h-12 text-lg rounded-lg bg-gray-50 border-gray-300 text-gray-500"
                        disabled
                    >
                    <p class="mt-2 text-sm text-gray-500">La ubicación será asignada en el área de conteo</p>
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
                    Registrar Embarque
                </button>
            </div>
        </form>
        @if (isset($mensaje))
            <script>
                alert('{{$mensaje}}');
            </script>
        @elseif(session('mensaje'))
            <script>
                alert({{ session('mensaje') }})
            </script>
        @endif

    </div>
</div>
@endsection