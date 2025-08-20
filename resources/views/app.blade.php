<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Larastory</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { margin: 0; font-family: system-ui, sans-serif; }
    </style>
</head>
<body class="bg-gray-50">
<div class="flex h-screen">
    <!-- Sidebar -->
    <div class="w-64 bg-white border-r border-gray-200 flex-shrink-0">
        <div class="p-4 border-b border-gray-200">
            <h1 class="text-xl font-bold text-gray-900">Larastory</h1>
            <p class="text-sm text-gray-500">Component Library</p>
        </div>

        <div class="p-4">
            <h2 class="text-sm font-medium text-gray-900 mb-2">Components</h2>
            <div class="space-y-1">
                <a href="#" class="block px-3 py-2 text-sm text-gray-700 hover:bg-gray-50 rounded">
                    Button
                </a>
                <a href="#" class="block px-3 py-2 text-sm text-gray-700 hover:bg-gray-50 rounded">
                    Card
                </a>
                <a href="#" class="block px-3 py-2 text-sm text-gray-700 hover:bg-gray-50 rounded">
                    Input
                </a>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col">
        <!-- Toolbar -->
        <div class="bg-white border-b border-gray-200 px-6 py-3">
            <div class="flex items-center justify-between">
                <h2 class="text-lg font-medium text-gray-900">
                    {{ $component ?? 'Welcome to Larastory' }}
                </h2>
                <div class="flex space-x-2">
                    <button class="px-3 py-1 text-sm bg-blue-100 text-blue-700 rounded">Canvas</button>
                    <button class="px-3 py-1 text-sm text-gray-600 hover:bg-gray-100 rounded">Docs</button>
                    <button class="px-3 py-1 text-sm text-gray-600 hover:bg-gray-100 rounded">Code</button>
                </div>
            </div>
        </div>

        <!-- Preview Area -->
        <div class="flex-1 p-6">
            @if(isset($component))
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-8">
                    <div class="text-center text-gray-500">
                        Component Preview: {{ $component }}
                    </div>
                </div>
            @else
                <div class="text-center py-12">
                    <h3 class="text-lg font-medium text-gray-900 mb-2">Welcome to Larastory</h3>
                    <p class="text-gray-600">Select a component from the sidebar to get started.</p>
                </div>
            @endif
        </div>
    </div>
</div>
</body>
</html>