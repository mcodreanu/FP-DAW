namespace ChessAPI
{
    internal class Material
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

        public int GetMaterialValueWhite => materialValueWhite;

        public int GetMaterialValueBlack => materialValueBlack;

        public string GetDistanceMsg => distanceMsg;
    }
}
