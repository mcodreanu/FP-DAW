namespace ChessAPI
{
    public class Material
    {
        private int materialValueWhite = 0;
        private int materialValueBlack = 0;
        private string distanceMsg = "";

        public Material(int materialValueWhite, int materialValueBlack, string distanceMsg)
        {
            this.materialValueWhite = materialValueWhite;
            this.materialValueBlack = materialValueBlack;
            this.distanceMsg = distanceMsg;
        }

        public Material getMaterial(string[,] board)
        {
            string[] whitePieces = {"P", "R", "N", "B","Q","K"};
            Dictionary<string, int> valueWhiteTable = new Dictionary<string, int>(){
            {"P", 1},
            {"R", 3},
            {"N", 3},
            {"B", 5},
            {"Q", 9} 
            };

            Dictionary<string, int> valueBlackTable = new Dictionary<string, int>(){
            {"p", 1},
            {"r", 3},
            {"n", 3},
            {"b", 5},
            {"q", 9} 
            };

            for (int row = 0; row < 8; row++)
            {
                for (int column = 0; column < 8; column++ ) 
                {
                    string value = board[row,column]; 
                    if (value != "0" && value != "K" && value != "k") 
                    {   
                        if (whitePieces.Contains(value))
                        {
                            materialValueWhite += valueWhiteTable[value];
                        }
                        else
                        {
                            materialValueBlack += valueBlackTable[value];
                        }
                    }
                }
            }
           
            int distance = materialValueWhite - materialValueBlack;

            if (distance < 0) 
            {
                distance = distance * -1;
            } 


            if (distance > 0)
            {
                string palabraPuntos = "";

                if (distance>1)
                {
                    palabraPuntos = "puntos";
                }
                else
                {
                    palabraPuntos = "punto";
                }

                if (materialValueWhite > materialValueBlack)
                {
                    distanceMsg = "Van ganando las piezas BLANCAS por una distancia de " + distance + " " + palabraPuntos + ".";
                }
                else if (materialValueWhite < materialValueBlack)
                {
                    distanceMsg = "Van ganando las piezas NEGRAS por una distancia de " + distance + " " + palabraPuntos + ".";
                }
                else
                {
                    distanceMsg = "";
                }
            }

            Material state = new Material(materialValueWhite, materialValueBlack, distanceMsg);

            return state;
        }

        public int MaterialValueWhite
        {
            get => materialValueWhite;
        }

        public int MaterialValueBlack
        {
            get => materialValueBlack;
        }

        public string DistanceMsg
        {
            get => distanceMsg;
        }
    }
}