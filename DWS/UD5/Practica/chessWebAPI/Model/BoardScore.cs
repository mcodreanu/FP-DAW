public class BoardScore
{
    private int _materialValueWhite;
    private int _materialValueBlack;
    private string _distanceMsg;

    public BoardScore(int materialValueWhite, int materialValueBlack, string distanceMsg)
    {
        this._materialValueWhite = materialValueWhite;
        this._materialValueBlack = materialValueBlack;
        this._distanceMsg = distanceMsg;
    }

    public int MaterialValueWhite { get => _materialValueWhite; set => _materialValueWhite = value; }

    public int MaterialValueBlack { get => _materialValueBlack; set => _materialValueBlack = value; }

    public string DistanceMsg { get => _distanceMsg; set => _distanceMsg = value; }
}