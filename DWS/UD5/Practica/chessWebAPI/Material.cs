using ChessAPI.Model;

namespace ChessAPI
{
    public class Material
    {
        /*private int materialValueWhite = 0;
        private int materialValueBlack = 0;
        private string distanceMsg = "";

        public Material(int materialValueWhite, int materialValueBlack, string distanceMsg)
        {
            this.materialValueWhite = materialValueWhite;
            this.materialValueBlack = materialValueBlack;
            this.distanceMsg = distanceMsg;
        }

        public Material CalculateMaterial(string[,] board)
        {
            Dictionary<string, int> pieceValues = new Dictionary<string, int>()
            {
                {"P", 1},
                {"N", 3},
                {"B", 3},
                {"R", 5},
                {"Q", 9}
            };

            for (int row = 0; row < 8; row++)
            {
                for (int column = 0; column < 8; column++)
                {
                    Piece piece = board[row, column];

                    if (piece != null)
                    {
                        int pieceValue = piece.GetScore();

                        if (char.IsUpper(piece.GetCode()))
                        {
                            materialValueWhite += pieceValue;
                        }
                        else
                        {
                            materialValueBlack += pieceValue;
                        }
                    }
                }
            }

            int distance = Math.Abs(materialValueWhite - materialValueBlack);
            string message = GenerateMessage(materialValueWhite, materialValueBlack, distance);

            return new Material(materialValueWhite, materialValueBlack, message);
        }

        private static string GenerateMessage(int whiteValue, int blackValue, int distance)
        {
            if (distance > 0)
            {
                string plural = distance > 1 ? "puntos" : "punto";

                if (whiteValue > blackValue)
                {
                    return $"Van ganando las piezas BLANCAS por una distancia de {distance} {plural}.";
                }
                else if (whiteValue < blackValue)
                {
                    return $"Van ganando las piezas NEGRAS por una distancia de {distance} {plural}.";
                }
            }

            return string.Empty;
        }

        public int GetMaterialValueWhite => materialValueWhite;

        public int GetMaterialValueBlack => materialValueBlack;

        public string GetDistanceMsg => distanceMsg;*/
    }
}
