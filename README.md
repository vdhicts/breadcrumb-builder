# Breadcrumb

This package allows you to easily build a breadcrumb from PHP.

## Requirements

This package requires PHP 7 and the renderers make use of [vdhicts/htmlelement](https://github.com/vdhicts/html-element).

## Installation

This package can be used in any PHP project or with any framework.

You can install the package via composer:

``` bash
composer require vdhicts/breadcrumb-builder
```

## Usage

```php
use Vdhicts\BreadcrumbBuilder;

// Create breadcrumb items
$applicationItem = new BreadcrumbBuilder\Item('Application', null, 'bars'); // without link, with icon
$pageItem = new BreadcrumbBuilder\Item('Page', 'http://www.example.com/page'); // with link, without icon
$actionItem = new BreadcrumbBuilder\Item('Add', 'http://www.example.com/page/add', 'plus'); // with link, with icon

// Start the item collection
$itemCollection = new BreadcrumbBuilder\ItemCollection();
// Add multiple items at once
$itemCollection->setItems([
	$applicationItem,
	$pageItem
]);
// Add a single item
$itemCollection->addItem($actionItem);

// Boot the renderer
$renderer = new BreadcrumbBuilder\Renderers\Bootstrap3();

// Boot the builder with the collection and renderer
$builder = new BreadcrumbBuilder\Builder($itemCollection, $renderer);

// Generate the breadcrumb
$builder->generate();
```

### Renderers

There are 2 renderers available by default, for Bootstrap 3 and Bootstrap 4:

#### Bootstrap 3

```html
<ol class="breadcrumb">
	<li>
		<i class="fa fa-fw fa-bars"></i> Application
	</li>
	<li>
		<a href="http://www.example.com/page">Page</a>
	</li>
	<li class="active">
		<a href="http://www.example.com/page/add"><i class="fa fa-fw fa-plus"></i> Add</a>
	</li>
</ol>
```

#### Bootstrap 4

```html
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<i class="fa fa-fw fa-bars"></i> Application
	</li>
	<li class="breadcrumb-item">
		<a href="http://www.example.com/page">Page</a>
	</li>
	<li class="breadcrumb-item active">
		<a href="http://www.example.com/page/add"><i class="fa fa-fw fa-plus"></i> Add</a>
	</li>
</ol>
```

#### Custom renderer

You can use your own renderer as long as it implements the `Renderer` interface.

## Tests

Full code coverage unit tests are available in the `tests` folder. Run via phpunit:

`vendor\bin\phpunit`

By default a coverage report will be generated in the `build/coverage` folder.

## Contribution

Any contribution is welcome, but it should be fully tested, meet the PSR-2 standard and please create one pull request 
per feature. In exchange you will be credited as contributor on this page.

## License

This package is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
