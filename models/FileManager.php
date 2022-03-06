<?php
    
/*
 *  @desc Contain File Management imnplementations
 *  @class FileManager
 *  @author Philane Msibi
 *  @version 1.0
 */

namespace Msibi_PHP;

class FileManager {
    
    /*
     *  @desc Check if file exists
     *  @func is_file_exist()
     *  @param $filename - File name
     *  @param $log_folder - Folder of the log file
     *  @return true if exists and false if not exist
     *  @version 1.0
     */

    public static function is_file_exist(string $file = '') {
        return !empty($file) ? file_exists($file) : false;
    }

    /*
     *  @desc Check if directory exists
     *  @func is_directory_exist()
     *  @param $directory - Directory name 
     *  @param $log_folder - Folder of the log file
     *  @return true if exist and false otherwise
     *  @version 1.0
     */

    public static function is_directory_exist(string $directory = '') {
        return self::is_file_exist($directory);
    }

    /*
     *  @desc Append path to a path
     *  @func append_to_path()
     *  @param $path - existing path
     *  @param $append_path - path to append on another path
     *  @return string - Full appended path
     *  @version 1.0
     */

    public static function append_to_path(string $path = '', string $append_path = '') {
        return (self::is_directory_exist($path) ? ($path.DIRECTORY_SEPARATOR.$append_path) : ''); 
    }
    
    /*
     *  @desc Create a file on specified path
     *  @func create_file()
     *  @param $file - File name to be created
     *  @param $ - Folder of the log file
     *  @return true if file created and false otherwise
     *  @version 1.0
     */

    public static function create_file(string $file = '') {
        
        try {

            $file_handler = fopen($file, 'r');
            fclose($file_handler);
            return true;

        } catch (Exception $exception) {
            return false;
        }
    }
    
    /*
     *  @desc Open a file with specified mode
     *  @func open_file()
     *  @param $file - File name 
     *  @param $flag - mode to open the file with (a,r,w, etc)
     *  @return file handler or null
     *  @version 1.0
     */

    public static function open_file(string $file = '', $flag = FileModeType::APPEND) {
        
        try {
            return fopen($file, $flag);
        } catch (Exception $exception) {
            return null; 
        }
    }

    /*
     *  @desc Save a file's contents
     *  @func save_file()
     *  @param $file_handler - File handler or pointer to file stream
     *  @param $log_folder - Folder of the log file
     *  @return void
     *  @version 1.0
     */
    public static function save_file($file_handler = null) {

        if ($file_handler !== null) fclose($file_handler);
    
    }

    /*
     *  @desc Create a directory
     *  @func create_directory()
     *  @param $dir_name - Directory name
     *  @param $permissions - Permission to assign to a directory created
     *  @return true if created and false otherwise
     *  @version 1.0
     */

    public static function create_directory(string $dir_name = '', int $permissions = 0777) {
        return mkdir($dir_name, $permissions);
    }

    /*
     *  @desc Check if file or directory is accessible
     *  @func is_accessible()
     *  @param $path - Path to check accessibility
     *  @param $log_folder - Folder of the log file
     *  @return bool - true if accessible and false otherwise
     *  @version 1.0
     */
    public static function is_accessible(string $path) {
        return is_writable($path);
    }

}
