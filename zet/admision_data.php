<?php
    /**
     * /**************************************\ 
     * |*************** DATA CONFIG ADMISIÓN ***
     * *****************************************
     * date create file: 10-02-2021
     * date last changes: 10-02-2022 
     * 
     */


    /**
    * /**************************************\
    * |*************** FUNCTIONS DATA
    * ****************************************
    */

        /**
         * function to generate rand phonenumbers
         */
        function phoneRandAdmision($phones){
            shuffle($phones);
            $result = implode(", ", $phones);
            return $result;
        }
        

    /**
     * /**************************************\
     * |*************** VARIABLES GENERALES
     * ****************************************
     */

        // Assistents numbers of the admision ofice
        $phones = ["991828881","916331094","985951660"];
        $numeros_admision = phoneRandAdmision($phones);

