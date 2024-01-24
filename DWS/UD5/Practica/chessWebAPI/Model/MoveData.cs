public class MoveData
{
    private bool _status;
    private string _board;
 
    public MoveData(bool status, string board)
    {
        this._status = status;
        this._board = board;
    }

    public bool Status { get => _status; set => _status = value; }

    public string Board { get => _board; set => _board = value; }
}