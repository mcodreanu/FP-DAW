public class MoveData
{
    private bool _isValid;
    private string _board;
    private string _operationResult;
 
    public MoveData(bool isValid, string board, string operationResult)
    {
        this._isValid = isValid;
        this._board = board;
        this._operationResult = operationResult;
    }

    public bool IsValid { get => _isValid; set => _isValid = value; }

    public string Board { get => _board; set => _board = value; }

    public string OperationResult { get => _operationResult; set => _operationResult = value; }
}