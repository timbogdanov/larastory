# Larastory

A Laravel component library documentation tool inspired by Storybook. Build, test, and document your Laravel Blade components, Livewire components, and view components in an isolated environment.

![Laravel](https://img.shields.io/badge/Laravel-12%2B-red.svg)
![PHP](https://img.shields.io/badge/PHP-8.2%2B-blue.svg)
![Livewire](https://img.shields.io/badge/Livewire-3.0%2B-purple.svg)
![License](https://img.shields.io/badge/License-MIT-green.svg)

## Features

- 🔍 **Auto-discovery** of Blade, Livewire, and class-based components
- 🎨 **Live preview** with real-time prop editing
- 📱 **Responsive testing** with multiple viewport sizes
- 🌙 **Theme support** (light/dark mode)
- 📚 **Documentation** with markdown support
- 🔗 **Deep linking** to specific component states
- ⚡ **Hot reload** during development
- 🎯 **Isolated environment** for component testing

## Installation

### 1. Set Up Laravel Project
Either create a fresh Laravel project or use an existing one:

```bash
# Fresh Laravel project
composer create-project laravel/laravel my-project
cd my-project

# Or use existing Laravel project
cd your-existing-project
```

### 2. Install Larastory
Add Larastory to your project:
```bash
composer require timbogdanov/larastory --dev
```

### 3. Configure Local Domain
Add the following line to your hosts file to enable subdomain access:
Mac/Linux - Edit `/etc/hosts`:
```bash
127.0.0.1 larastory.your-project.test
127.0.0.1 your-project.test
```
Replace your-project.test with your actual Laravel project domain.

### 4. Start Development Server
```bash
composer run dev
```

### 5. Open Larastory
Visit your Larastory interface at:
```bash
http://larastory.your-project.test:8000
```
By default, Larastory runs on the larastory subdomain of your main project.

## Configuration
Publish the configuration file to customize Larastory:
```base
php artisan vendor:publish --tag=larastory-config
```
The configuration file config/larastory.php allows you to customize:
```php
return [
    // Subdomain for Larastory (default: 'larastory')
    'subdomain' => env('LARASTORY_SUBDOMAIN', 'larastory'),
    
    // Directories to scan for components
    'component_paths' => [
        'resources/views/components',
        'app/View/Components',
        'app/Livewire',
    ],
    
    // Auto-discovery of components
    'auto_discovery' => true,  
];
```

## Custom Subdomain
To use a different subdomain, add to your `.env` file:
```text
LARASTORY_SUBDOMAIN=storybook
```
Then update your hosts file accordingly:
```text
127.0.0.1 storybook.your-project.test
```

## Development Status
🚧 This package is currently in early development.

## Contributing
We welcome contributions! Please see `CONTRIBUTING.md` for details.

## Credits
Inspired by Storybook

Star ⭐ this repo if you find it useful!