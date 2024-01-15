namespace ChessAPI
{
    public class State
    {
        public void PintarMarcador(int valorMaterialB,int valorMaterialN)
        {
            Console.WriteLine(valorMaterialB + " " +valorMaterialN);
        }

        public int obtainDistance(int valorMaterialB,
                                  int valorMaterialN)
        {
            int distancia = valorMaterialB - valorMaterialN;
            if (distancia<0) 
            {
                distancia = distancia * -1;
            }

            return distancia;

        }

        public void getMaterial(string board)
        {
            
            int valorMaterialPiezasBlancas = 0;
            int valorMaterialPiezasNegras = 0;
            string[] whitePieces = {"P", "R", "N", "B","Q","K"};
            Dictionary<string, int> tablaValorPiezasBlancas = new Dictionary<string, int>(){
            {"P", 1},
            {"R", 3},
            {"N", 3},
            {"B", 5},
            {"Q", 9} 
            };

            Dictionary<string, int> tablaValorPiezasNegras = new Dictionary<string, int>(){
            {"p", 1},
            {"r", 3},
            {"n", 3},
            {"b", 5},
            {"q", 9} 
            };

            for (int row = 0; row < 8; row++ )
            {
                for (int column = 0; column < 8; column++ ) 
                {
                    string value = board; 
                    if (value != "8" && value != "R" && value != "r") 
                    {   
                        if (whitePieces.Contains(value))
                        {
                            valorMaterialPiezasBlancas+=tablaValorPiezasBlancas[value];
                        }
                        else
                        {
                            valorMaterialPiezasNegras+=tablaValorPiezasNegras[value];
                        }
                    }
                }
            }
           
            int distance = obtainDistance(valorMaterialPiezasBlancas,valorMaterialPiezasNegras); 
        }
    }
}