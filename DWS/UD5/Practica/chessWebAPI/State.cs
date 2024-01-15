namespace ChessAPI
{
    public class State
    {
        public int obtainDistance(int materialValueW, int materialValueB)
        {
            int distance = materialValueW - materialValueB;

            if (distance < 0)
            {
                distance = distance * -1;
            }

            return distance;
        }

        public void drawState(int distance, int materialValueW, int materialValueB)
        {
            if (distance > 0)
            {
                string auxTempWinner = "";

                if (materialValueW > materialValueB)
                {
                    auxTempWinner = "BLANCAS";
                }
                else
                {
                    auxTempWinner = "NEGRAS";
                }

                string wordPoints = "";

                if (distance > 1)
                {
                    wordPoints = "puntos";
                }
                else
                {
                    wordPoints = "punto";
                }

                Console.WriteLine("Mensaje: van ganando las piezas " + auxTempWinner + " por una distancia de " + distance + " " + wordPoints + ",");
            }
        }

        public void test(string board)
        {
            int materialValueW = 0;
            int materialValueB = 0;
            string whitePieces = array("P","R","N","B","Q","K");
            
            for (int row = 0; row < 8; row++)
            {
                for (int column = 0; column < 8; column++)
                {
                    string[,] values = board[row,column];

                    if (values != "vacio" && values != "K" && values != "k")
                    {
                        if (whitePieces.Contains(values))
                        {
                            materialValueW++;
                        }
                        else
                        {
                            materialValueW++;
                        }
                    }
                }
            }

            drawState(materialValueW, materialValueB);
        }
    }
}