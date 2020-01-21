# quickweb-laravel-preset
The default quickweb Laravel preset, requires laravel ui ^1.1

## Warning!

Npm will give you a warning when compiling for development. This is because all of bootstrap is being compiled inside a parent 
class, include the comment block. It will stil work.  

This package brings in a lot of dependancies you may not need. It does however isolate major css materilize and bootstrap 
to seperate classes.  Bootstrap will only work inside a parent element with a class of .bstrap4-iso . Materialize inside the class
.mt1-iso

Don't defer loading of app.js. Takes about a  10th of a millisecond longer to load than a blade template, 
and you will get $ is not defined if you attempt to use jquery.

This preset is meant for large projects across multiple platforms, and  your packages will need to be pruned quite a bit as your project goes on.
