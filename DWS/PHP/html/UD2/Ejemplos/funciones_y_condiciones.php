
    <?php
        

        //+¿Qué opinas de esta función.
        function esVocal($char)
        {
            return in_array($char, array("a", "e", "i", "o","u"));
        }
        //-

        //+¿Podemos hacer más corta/legible esta función?
        function esVocalConCondiciones($caracter)
        {
            if ( ($caracter=='a') || ($caracter=='e') || ($caracter=='i') 
                || ($caracter=='o') || ($caracter=='u'))
            {
                return true;
            }
            else
            {
                return false;
            }
        }
        //-

        function esVocalConCondicionesElseIf($caracter)
        {
            if ($caracter=='a')
            {
                return true;
            } elseif ($caracter=='e')
            {
                return true;

            } elseif ($caracter=='i')
            {
                return true;

            } elseif($caracter =='o')
            {
                return true;
            } elseif ($caracter=='u')
            {
                return true;
            }
            else
            {
                return false;
            }
        }

        function esVocalConSwitch($caracter)
        {
            switch($caracter)
            {
                case "a":
                    return true;
                case "e":
                    return true;
                case "i":
                    return true;
                case "o":
                    return true;
                case "u":
                    return true;
                default:
                    return false;
            }
        }

