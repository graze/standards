# JavaScript

Please refer to the [airbnb style guide](https://github.com/airbnb/javascript) for styling standards, **in particular**:

- [Variables](https://github.com/airbnb/javascript#variables)
- [jQuery](https://github.com/airbnb/javascript#jquery)
- [Commas](https://github.com/airbnb/javascript#commas)
- [Objects](https://github.com/airbnb/javascript#objects)
- [Arrays](https://github.com/airbnb/javascript#arrays)
- [Strings](https://github.com/airbnb/javascript#strings)
- [Functions](https://github.com/airbnb/javascript#functions)

## Immediately-invoked function expressions (IIFE)

1. MUST NOT be used for CommonJS exporting modules (built with Browserify).
1. MUST be used in inline scripts and non Browserify compiled JS to avoid populating the global scope.

### Example of usage in non CommonJS modules

```javascript
(function($) {
    console.log($);
    // Defined as long as global jQuery object is available
})(jQuery);

console.log($);
// Undefined
```
