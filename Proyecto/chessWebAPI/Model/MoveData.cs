using ChessAPI.Model;

public class MoveData
{
    private bool _isValid;
    private string _board;
    private string _operationResult;
    private string _piece;
 
    public MoveData(bool isValid, string board, string operationResult, string piece)
    {
        this._isValid = isValid;
        this._board = board;
        this._operationResult = operationResult;
        this._piece = piece;
    }

    public bool IsValid { get => _isValid; set => _isValid = value; }

    public string Board { get => _board; set => _board = value; }

    public string OperationResult { get => _operationResult; set => _operationResult = value; }

    public string Piece { get => _piece; set => _piece = value; }
}