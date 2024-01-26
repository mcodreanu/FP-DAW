public class MoveData
{
    private bool _isValid;
    private string _board;
 
    public MoveData(bool isValid, string board)
    {
        this._isValid = isValid;
        this._board = board;
    }

    public bool IsValid { get => _isValid; set => _isValid = value; }

    public string Board { get => _board; set => _board = value; }
}