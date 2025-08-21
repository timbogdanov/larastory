# Contributing to Larastory

Thank you for considering contributing to Larastory! We welcome contributions from everyone.

## Development Setup

### Prerequisites

- PHP 8.2+
- Composer
- Node.js & NPM
- Laravel 12+ knowledge
- Git

### Setting Up Development Environment

1. **Fork the repository** on GitHub

2. **Clone your fork** locally:
```bash
git clone https://github.com/your-username/larastory.git
cd larastory
```

3. **Install dependencies**:
```bash
composer install
```

4. **Create a test Laravel project** for development:
```bash
cd ..
composer create-project laravel/laravel larastory-test
cd larastory-test
```

5. **Link your local package** for development:
```json
// In larastory-test/composer.json
{
    "repositories": [
        {
            "type": "path",
            "url": "../larastory"
        }
    ],
    "require": {
        "timbogdanov/larastory": "dev-main"
    }
}
```

6. **Install the package**:
```bash
composer update timbogdanov/larastory
```

7. **Set up subdomain** in hosts file:
```
127.0.0.1 larastory.larastory-test.test
```

8. **Start development**:
```bash
composer run dev
```

### Alternative: Symlink Development

For faster development (instant file changes):

```bash
cd larastory-test/vendor
rm -rf timbogdanov
mkdir -p timbogdanov
cd timbogdanov
ln -s ../../../larastory larastory
cd ../..
composer dump-autoload
```

## Code Style

We follow Laravel's coding standards:

### PHP Code Style

- Follow PSR-12 coding standard
- Use Laravel's naming conventions
- Use type hints where possible
- Write descriptive variable and method names

```php
// Good
public function getComponentStories(string $componentName): array
{
    return $this->storyParser->parse($componentName);
}

// Bad
public function get($name)
{
    return $this->parser->parse($name);
}
```

### Frontend Code Style

- Use Tailwind CSS utility classes
- Follow Laravel Livewire best practices
- Keep JavaScript minimal and functional
- Use Alpine.js for simple interactions

## Testing

### Running Tests

```bash
# Run all tests
composer test

# Run specific test file
./vendor/bin/pest tests/Unit/ServiceProviderTest.php

# Run with coverage
./vendor/bin/pest --coverage
```

### Writing Tests

- Write tests for all new features
- Use Pest testing framework
- Follow Arrange-Act-Assert pattern
- Test both happy path and edge cases

```php
// Example test
it('can discover blade components', function () {
    // Arrange
    $discovery = new ComponentDiscovery($this->app['files']);
    
    // Act
    $components = $discovery->discoverBladeComponents();
    
    // Assert
    expect($components)->toBeArray()
        ->and($components)->not->toBeEmpty();
});
```

## Pull Request Process

### Before Submitting

1. **Create a feature branch**:
```bash
git checkout -b feature/component-discovery
```

2. **Make your changes** with clear, focused commits

3. **Write or update tests** for your changes

4. **Run the test suite**:
```bash
composer test
```

5. **Update documentation** if needed

### Submitting Pull Request

1. **Push your branch**:
```bash
git push origin feature/component-discovery
```

2. **Create pull request** on GitHub with:
    - Clear title describing the change
    - Detailed description of what was changed and why
    - Screenshots for UI changes
    - Reference any related issues

3. **Ensure CI passes** - all tests must pass

4. **Respond to feedback** and make requested changes

### Pull Request Guidelines

- **One feature per PR** - keep PRs focused and small
- **Clear commit messages** - use conventional commit format:
  ```
  feat: add component discovery service
  fix: resolve subdomain routing issue
  docs: update installation instructions
  test: add tests for story parser
  ```
- **No breaking changes** without discussion
- **Include tests** for new functionality
- **Update documentation** when adding features

## Issue Reporting

### Bug Reports

When reporting bugs, include:

- **Laravel version**
- **PHP version**
- **Larastory version**
- **Operating system**
- **Browser (for UI issues)**
- **Steps to reproduce**
- **Expected behavior**
- **Actual behavior**
- **Error messages** (if any)

Use this template:

```markdown
**Environment:**
- Laravel: 12.x
- PHP: 8.2.x
- Larastory: x.x.x
- OS: macOS/Windows/Linux

**Steps to Reproduce:**
1. Install Larastory
2. Create component
3. Visit subdomain
4. Error occurs

**Expected Behavior:**
Component should display correctly

**Actual Behavior:**
Error message appears

**Error Messages:**
```
[error message here]
```
```

### Feature Requests

For feature requests, include:

- **Problem** you're trying to solve
- **Proposed solution**
- **Alternative solutions** considered
- **Use case examples**
- **Benefits** to other users

## Development Workflow

### Architecture Overview

```
src/
├── Http/Controllers/          # Route controllers
├── Services/                  # Business logic
├── Livewire/                 # Livewire components
├── Console/Commands/         # Artisan commands
└── LarastoryServiceProvider.php

resources/
├── views/                    # Blade templates
├── css/                      # Stylesheets
└── js/                       # JavaScript

config/
└── larastory.php            # Configuration

routes/
└── web.php                  # Package routes
```

### Adding New Features

1. **Plan the feature** - discuss in issues first
2. **Write tests** - TDD approach preferred
3. **Implement feature** - follow existing patterns
4. **Update documentation** - README, config, etc.
5. **Submit PR** - follow guidelines above

### Common Development Tasks

#### Adding a New Service

```php
// 1. Create service class
namespace Larastory\Services;

class NewService
{
    public function handle(): mixed
    {
        // Implementation
    }
}

// 2. Register in ServiceProvider
$this->app->singleton('larastory.new-service', function ($app) {
    return new NewService();
});

// 3. Write tests
it('can handle new service functionality', function () {
    $service = app('larastory.new-service');
    expect($service->handle())->toBeTruthy();
});
```

#### Adding Configuration Options

```php
// 1. Add to config/larastory.php
'new_option' => env('LARASTORY_NEW_OPTION', 'default'),

// 2. Document in README
// 3. Update tests if needed
```

#### Adding Livewire Components

```php
// 1. Create component class
namespace Larastory\Livewire;

use Livewire\Component;

class NewComponent extends Component
{
    public function render()
    {
        return view('larastory::livewire.new-component');
    }
}

// 2. Create view template
// 3. Register in ServiceProvider
Livewire::component('larastory.new-component', NewComponent::class);
```

## Documentation

### Code Documentation

- Use PHPDoc blocks for all public methods
- Include parameter types and return types
- Explain complex logic with inline comments

```php
/**
 * Discover components in specified directories.
 *
 * @param array<string> $paths Directories to scan
 * @return array<string, array<string, mixed>> Component information
 */
public function discoverComponents(array $paths): array
{
    // Implementation
}
```

### README Updates

When adding features:

- Update feature list
- Add configuration examples
- Include usage examples
- Update development status

## Questions?

- **GitHub Issues** - for bugs and feature requests
- **GitHub Discussions** - for questions and ideas
- **Email** - tim.bogdanov@icloud.com for security issues

## Code of Conduct

- Be respectful and inclusive
- Provide constructive feedback
- Help others learn and grow
- Focus on the code, not the person

## License

By contributing, you agree that your contributions will be licensed under the MIT License.