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
   * `move_uploaded_file(tmpFile,dir)` return bool
   * `basename()`
   * `unlink($path)`
* Magic constants
  * `__FILE__`
  * `__LINE__`
  * `__DIR__`
    
* Super Global `$_FILE`
  * `name`
  * `type`
  * `size`
  * `tmp_name`
  * `error`
  
* `foreach :` and `endforeach`