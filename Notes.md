 # Notes

 * Get all declared classes
 `get_declared_class()`
 * Get class methods
 `get_class_methods('ClassName')`
* Auto load class
   * `__autoload` is deprecated in 8.0
   * [Use ](https://www.php.net/manual/en/language.oop5.autoload.php) `sql_autoload_register($methodName)` instead
 
* File
   * `file_exists`
   * `is_file|dir`
   * `class_exists`
* Magic constants
  * `__FILE__`
  * `__LINE__`
  * `__DIR__`