# Breadcrumb

This package allows you to easily build a breadcrumb from PHP.

## Requirements

This package requires PHP 7 and the renderers make use of [vdhicts/html-element](https://github.com/vdhicts/dicms-html-element).

## Installation

This package can be used in any PHP project or with any framework.

You can install the package via composer:

``` bash
composer require vdhicts/breadcrumb-builder
```

## Usage

```php
use Vdhicts\Dicms\Breadcrumb;

// Create breadcrumb items
$applicationItem = new Breadcrumb\Item('Application', null, 'bars'); // without link, with icon
$pageItem = new Breadcrumb\Item('Page', 'http://www.example.com/page'); // with link, without icon
$actionItem = new Breadcrumb\Item('Add', 'http://www.example.com/page/add', 'plus'); // with link, with icon

// Start the item collection
$itemCollection = new Breadcrumb\ItemCollection();
// Add multiple items at once
$itemCollection->setItems([
	$applicationItem,
	$pageItem
]);
// Add a single item
$itemCollection->addItem($actionItem);

// Boot the renderer
$renderer = new Breadcrumb\Renderers\Bootstrap3();

// Boot the builder with the collection and renderer
$builder = new Breadcrumb\Builder($itemCollection, $renderer);

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

## Security

If you discover any security related issues in this or other packages of Vdhicts, please email info@vdhicts.nl instead
of using the issue tracker.

## License

This package is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).

## About vdhicts

[Van der Heiden ICT services](https://www.vdhicts.nl) is the name of my personal company for which I work as
freelancer. Van der Heiden ICT services develops and implements IT solutions for businesses and educational
institutions.
