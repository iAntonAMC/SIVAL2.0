# TODOs:
- Review the db, maybe add status or something like that that can "false-delete" elements
- Create an error handler that would work like template for all error args

# Error message:
    catch(Exception $e)
    {
        die ("--- ERROR! --- '" . __FILE__ . "' Dropped an exception:" . $e -> getMessage());
    }
    finally
    {
        $cnxn = null;
    }

# Baselines:
- Los controladores se nombran colocando primero la acción que realiza, guión bajo y la clase u objeto que sufre la acción: *"action_class"*
- Los modelos se nombran comenzando por la clase u objeto, guión bajo y la palabra model: *"class_model"*
- Las vistas se guardan en carpetas separadas, cada una por clase existente en el sistema.
- Las vistas se nombran comenzando por la clase de la que se trata, guión bajo y el propósito o función general de la vista: *"class_function"*
- Las rutas a directorios o archivos, usadas en el código, deben ser rutas absolutas en la mayoría de lo posible, todas comenzando con *"/SIVAL/"*.
- Procurar la integridad de las variables mantienendo el mismo nombre todo el tiempo que sea posible.
- Todo el texto que se va a ejecutar como consulta (Comado SQL) en la base de datos debe de ser almacenado en una variable de nombre *"$query"*; tener cuidado cuando se realiza más de una consulta.
- Todo comando "require" en el código debe mantener la estructura: *"require ('route/to/file.php');"*
- Las funciones de todo el sistema se nombran en camelCase: *"function myFunction(){}"*
- Las variables de todo el sistema se nombran en snake_case: *"super_variable"*